<?php 
## System config file
require_once (__DIR__ . '/../../../../utility/config.php');

if (!$cConnection->Connect()) {
  echo "Database connection failed";
  exit;
}

$Message      = "";
$c_Message    = $cConnection->GetMessage();

$requestType  = ($_POST === []) ? $_GET : $_POST;
$action       = mysqli_real_escape_string($cConnection->Connect(), (string) $requestType['action']);

match ($action) {
    'import-data' => importData($requestType['file']),
    default => die('invalid request'),
};

function importData($filePath) {
  
  $data         = [];
	$isValid      = false;
	$state        = '';
  $message      = '';
  
  $filePath = filter_var($filePath);
  
  $isValidFile = Helper::isFile($filePath);

  if (!empty($isValidFile)) {
    
    $fileFullPath = BASE_PATH.$filePath;
    $isFileExists = file_exists($fileFullPath); 
    $isCsvFile    = isCSV($fileFullPath);

    /** ERROR : No file selected */
    if (!empty($isFileExists) && !empty($isCsvFile)) {
      
      if(is_readable($fileFullPath)) {
        
        $arrCsvData = csvToArray($fileFullPath);
        
        $arrItems      = $arrCsvData['items'];
        $validCsvItems = $arrCsvData['isValidItems'];

        if (!empty($validCsvItems)) {
          /** CSV file has valid items */
          if (!empty($arrItems)) {
            
            $arrInvalidUrls   = [];
            $arrAvailableUrls = [];
            $addedUrls        = [];
            $insQuery         = '';

            foreach ($arrItems as $item) {
              //prePrintR($item);
              $oldURL = $item[0];
              $newURL = $item[1];

              /** GET PATH FROM URL */
              $oldURLPath = rtrim((string) Helper::getUrlPath($oldURL), '/');
              $newURLPath = rtrim((string) Helper::getUrlPath($newURL), '/');
              
              $newURLPath = (empty($newURLPath)) ? '/' : $newURLPath;

              if (!empty($oldURLPath) && !empty($newURLPath)) {

                if ($oldURLPath !== $newURLPath) {
                  $redirectId = DB::fetchValue("SELECT `id` 
                    FROM `redirect`
                    WHERE `old_url` = '".$oldURLPath."'
                      AND  `status` = '".FLAG_ACTIVE."'
                    LIMIT 1");

                  if (empty($redirectId)) {
                    if (!in_array($oldURLPath, $addedUrls)) {
                      $insQuery .= ',("'.$oldURLPath.'","'.$newURLPath.'")';
                      $addedUrls[] = $oldURLPath;
                    }
                  } else {
                    /** WARNING : Old URL is already Exists */
                    $arrTemp = [];
                    $arrTemp['old'] = $oldURL;
                    $arrTemp['new'] = $newURL;

                    $arrAvailableUrls[] = $arrTemp;  

                  }
                } else {
                  /** WARNING : Same Old and New URLs */
                  $arrTemp = [];
                  $arrTemp['old'] = $oldURL;
                  $arrTemp['new'] = $newURL;
                  
                  $arrInvalidUrls[] = $arrTemp;  
                }
              } else {
                /** WARNING : Old or New URL is Empty  */

                $arrTemp = [];
                $arrTemp['old'] = $oldURL;
                $arrTemp['new'] = $newURL;
                
                $arrInvalidUrls[] = $arrTemp;  
              }
            }

            $insQuery = ltrim($insQuery, ',');

            if ($insQuery !== '' && $insQuery !== '0') {

              $sql = "INSERT INTO `redirect`(`old_url`, `new_url`)
                VALUES {$insQuery}";

              DB::runQuery($sql);

            }

            /** SET Data for response */
            $data['invalid']     = $arrInvalidUrls;
            $data['invalidNote'] = 'The following redirects could not be imported
             because the URLs are not using a valid format.';

            $data['available']     = $arrAvailableUrls;
            $data['availableNote'] = 'The following redirects could not be imported
             because the old URLs already exist.';

            $isWarning = $arrInvalidUrls !== [] || $arrAvailableUrls !== [];

            $isValid   = true;
            
            if(($arrInvalidUrls !== [] || $arrAvailableUrls !== [])) {
            
              
              if(!empty($insQuery)) {

                $state   = 'info';
                $message = 'Not all redirects have been imported. These are listed in the table below.';
              } else {

                $state   = 'warning';
                $message = 'Could not import redirects. These are listed in the table below.';
              }
              
              
            } else {
              $state   = 'success';
              $message = 'Redirects have been imported successfully.';
            }

          } else {
            /** ERROR : File is empty */
            $state        = 'danger';
            $message      = 'No redirects found in csv file.';
          }

        } else {
          /** ERROR : Invalid CSV items */
          $state        = 'danger';
          $message      = 'Invalid redirect content in csv file.';
        }

      } else {
        /** ERROR : File is not readable */
        $state        = 'danger';
        $message      = 'Cannot read csv file. Please select a valid csv file.';
      }
    
    } else {      
      /** ERROR : Invalid csv File */
      $state        = 'danger';
      $message      = 'Invalid file format. Please select a valid csv file.';
    }

  } else {
    /** ERROR : No file selected */
    $state        = 'danger';
    $message      = 'Please select a redirect csv file.';
  }
  
  $data['isValid'] = $isValid;
	$data['state']   = $state;
	$data['message'] = $message;

  die(json_encode($data, JSON_THROW_ON_ERROR));
}

function csvToArray($file='')
{ 
  $isValid = true;
  $data    = [];
  $items   = [];
  $header  = null;
  
  if (($handle = fopen($file, 'r')) !== false)
  {
    $delimiter = detectDelimiter($handle);
    
    $delimiter = (empty($delimiter)) ? ',' : $delimiter;

    while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
    {
      if (!$header) {

        $header = [0, 1];

      } else {
        
        if(count($row) != 2) {
          $isValid = false;
          $items   = [];
          break;
        }
        
        $items[] = array_combine($header, $row);
      }        
    }
    fclose($handle);
  }
  
  $data['items']        = $items;
  $data['isValidItems'] = $isValid;

  return $data;
}

function detectDelimiter($fh)
{
  $dataCurrent  = null; 
  $dataPrevious = null;
      
  $delimiters   = ["\t", "|", ",", ";"];

  $delimiter    = $delimiters[0];
  
  foreach($delimiters as $d) {
    $dataCurrent = fgetcsv($fh, 1000, $d);
    if((is_countable($dataCurrent) ? count($dataCurrent) : 0) > ($dataPrevious === null ? 0 : count($dataPrevious))) {
      $delimiter = $d;
      $dataPrevious = $dataCurrent;
    }
    rewind($fh);
  }
  return $delimiter;
}

function isCSV( $file = '')
{
    $csvMimeTypes = ['text/csv', 'text/plain', 'application/csv', 'text/comma-separated-values', 'application/excel', 'application/vnd.ms-excel', 'application/vnd.msexcel', 'text/anytext', 'application/octet-stream', 'application/txt'];
    
    $finfo = new finfo(FILEINFO_MIME_TYPE); 

    $fileMimeType = $finfo->file($file);

    if(in_array( $fileMimeType, $csvMimeTypes)) {
      return true;
    } else {
      return false;
    }
}

?>