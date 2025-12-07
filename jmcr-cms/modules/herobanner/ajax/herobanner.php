<?php 
## System config file
require_once (__DIR__ . '/../../../../utility/config.php');

if (!$cConnection->Connect()) {
  echo "Database connection failed";
  exit;
}

$Message   = "";
$c_Message = $cConnection->GetMessage();
$requestType = ($_POST === []) ? $_GET : $_POST;
$action = mysqli_real_escape_string($cConnection->Connect(), (string) $requestType['action']);
if (!defined('SLIDES_SESSION_KEY')) define('SLIDES_SESSION_KEY', 'hero_slides');

match ($action) {
    'get-slides' => getSlides($requestType['id']),
    'get-slide-data' => getSlideData($requestType['index']),
    'add-slide' => addSlide($requestType['index']),
    'save-slide-details' => saveSlideData(),
    'remove-slide' => removeSlide($requestType['index']),
    'add-new-slide' => addNewSlide(),
    'remove-temp-data' => removeTempSlides(),
    default => die('invalid request'),
};



function getSlides($id = null) {

  $slides = [];
  
  if (!empty($_SESSION[SLIDES_SESSION_KEY])) {

    foreach ($_SESSION[SLIDES_SESSION_KEY] as $slide) {
      if (empty($slide['temp'])) {
        $slides[] = $slide;
      }
    }
  }

  $id = filter_var($id, FILTER_VALIDATE_INT);

  if (!empty($id) && empty($_SESSION[SLIDES_SESSION_KEY])) {

    $sql = "SELECT `photo_path`, 
      `title`, 
      `sub_title`, 
      `alt_text`, 
      `button_text`,
      `button_url`, 
      `video_id`, 
      `rank`
      FROM `hero_banner_item` 
      WHERE `type` = '".HERO_BANNER_TYPE_SLIDER."'
      AND `hero_banner_id` = {$id}
      ORDER BY `rank`";

    $slides = DB::fetchAll($sql);
  }

  $totalSlides = is_countable($slides) ? count($slides) : 0;

  $maxPlaceholderSlides = 6;

  if ($totalSlides < 6) {
    for ($i = ($totalSlides); $i <= $maxPlaceholderSlides-1; $i++) {
      $slides[$i] = [
        'photo_path' => null,
        'title' => null,
        'sub_title' => null,
        'alt_text' => null,
        'button_text' => null,
        'button_url' => null,
        'video_id' => null,
        'rank' => ($i+1)
      ];
    }
  }

  $_SESSION[SLIDES_SESSION_KEY] = $slides;
  
  die(json_encode($slides, JSON_THROW_ON_ERROR));
}


function getSlideData($index) {
  $index = filter_var($index, FILTER_VALIDATE_INT);
  $data = null;

  if (!empty($index) || $index === 0) {
    $data = $_SESSION[SLIDES_SESSION_KEY][$index];
    $data['index'] = $index;
  }

  die(json_encode($data, JSON_THROW_ON_ERROR));
}

function addSlide($index) {
  $data = [];
  $isValid = false;
  $index = filter_var($index, FILTER_VALIDATE_INT);
  $imagePath   = filter_input(INPUT_POST, 'img-src');

  if (!empty($index) || $index === 0) {
    $_SESSION[SLIDES_SESSION_KEY][$index]['photo_path'] = $imagePath;

    $isValid = (isset($_SESSION[SLIDES_SESSION_KEY][$index]));
  }

  $data['isValid'] = $isValid;

  die(json_encode($data, JSON_THROW_ON_ERROR));
}

function removeSlide($index) {
  $index = filter_var($index, FILTER_VALIDATE_INT);

  $data = [];

  $removeView = false;
  $isValid    = false;
  
  if (!empty($index) || $index === 0) {
    $isValid = true;
    $_SESSION[SLIDES_SESSION_KEY][$index]['photo_path'] = null;

    if ($index > 5) {
      $removeView = true;
      unset($_SESSION[SLIDES_SESSION_KEY][$index]);
      $_SESSION[SLIDES_SESSION_KEY] = array_values($_SESSION[SLIDES_SESSION_KEY]);
    }
  }

  $data['isValid']    = $isValid;
  $data['removeView'] = $removeView;

  die(json_encode($data, JSON_THROW_ON_ERROR));
}

function addNewSlide(): never {
  $data = [];
  $isValid = true;
  $totalSlides = is_countable($_SESSION[SLIDES_SESSION_KEY]) ? count($_SESSION[SLIDES_SESSION_KEY]) : 0;
  
  $_SESSION[SLIDES_SESSION_KEY][$totalSlides]['photo_path'] = null;
  $_SESSION[SLIDES_SESSION_KEY][$totalSlides]['title'] = null;
  $_SESSION[SLIDES_SESSION_KEY][$totalSlides]['sub_title'] = null;
  $_SESSION[SLIDES_SESSION_KEY][$totalSlides]['alt_text'] = null;
  $_SESSION[SLIDES_SESSION_KEY][$totalSlides]['button_text'] = null;
  $_SESSION[SLIDES_SESSION_KEY][$totalSlides]['button_url'] = null;
  $_SESSION[SLIDES_SESSION_KEY][$totalSlides]['temp'] = true;

  $data['isValid']   = $isValid;
  $data['index']     = $totalSlides;
  $data['slideData'] = $_SESSION[SLIDES_SESSION_KEY][$totalSlides];

  die(json_encode($data, JSON_THROW_ON_ERROR));
}

function saveSlideData() {
  global $requestType;

  $data = [];

  $isValid = false;

  $index       = filter_input(INPUT_POST, 'slide-index', FILTER_VALIDATE_INT);
  $imagePath   = filter_input(INPUT_POST, 'slide-image');
  $title       = filter_input(INPUT_POST, 'slide-title');
  $sub_title   = filter_input(INPUT_POST, 'slide-subtitle');
  $alt_text    = filter_input(INPUT_POST, 'slide-alt-text');
  $button_text = filter_input(INPUT_POST, 'slide-button-text');
  $button_url  = filter_input(INPUT_POST, 'slide-button-url');

  if (!empty($index) || $index === 0) {
    $_SESSION[SLIDES_SESSION_KEY][$index]['photo_path'] = $imagePath;
    $_SESSION[SLIDES_SESSION_KEY][$index]['title'] = $title;
    $_SESSION[SLIDES_SESSION_KEY][$index]['sub_title'] = $sub_title;
    $_SESSION[SLIDES_SESSION_KEY][$index]['alt_text'] = $alt_text;
    $_SESSION[SLIDES_SESSION_KEY][$index]['button_text'] = $button_text;
    $_SESSION[SLIDES_SESSION_KEY][$index]['button_url'] = $button_url;
     
    unset($_SESSION[SLIDES_SESSION_KEY][$index]['temp']);

    $isValid = true;
    $data['data'] = $_SESSION[SLIDES_SESSION_KEY][$index];
  }

  $data['isValid'] = $isValid;

  die(json_encode($data, JSON_THROW_ON_ERROR));

}

function removeTempSlides() {
  $itemsCount = is_countable($_SESSION[SLIDES_SESSION_KEY]) ? count($_SESSION[SLIDES_SESSION_KEY]) : 0;
  for ($i = 0; $i < (is_countable($_SESSION[SLIDES_SESSION_KEY]) ? $itemsCount : 0); $i++) {
    if (!empty($_SESSION[SLIDES_SESSION_KEY][$i]['temp'])) {
      unset($_SESSION[SLIDES_SESSION_KEY][$i]);
    }
  }

  $_SESSION[SLIDES_SESSION_KEY] = array_values($_SESSION[SLIDES_SESSION_KEY]);
}

?>