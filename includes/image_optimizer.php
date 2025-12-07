<?php
include_once('../utility/config.php');

// Enable error reporting and display
error_reporting(E_ALL);
ini_set('display_errors', 1);

$logFile = 'image_error.log';

if ( isset($_GET['imv']) ) {

    $imagePath = $_SERVER['REDIRECT_URL'];
    $imageFullPath = BASE_PATH . $imagePath;

    $imageFullPath = realpath($imageFullPath); // Get the real path of the file
    if ( file_exists($imageFullPath) ) {

		$size = getimagesize($imageFullPath);
		if(!$size) {
			error_log('Could not obtain image size' . "\n", 3, $logFile);
			return;
		}
			
		list($imageWidth, $imageHeight) = explode('x', $_GET['imv']);

		$imageName = basename($imagePath);
		$imageExt = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));

		switch($size[2]) {
			case IMAGETYPE_JPEG:
				$requestedImage = @imagecreatefromjpeg($imageFullPath);
				if(!$requestedImage){
					error_log('Failed to create an image from JPEG file' . "\n", 3, $logFile);
					return;
				}
				$imageType = 'jpeg';
				break;
			case IMAGETYPE_PNG:
				$requestedImage = @imagecreatefrompng($imageFullPath);
				if(!$requestedImage){
					error_log('Failed to create an image from PNG file' . "\n", 3, $logFile);
					return;
				}
				$imageType = 'png';
				break;
			default:
				error_log('Unsupported image format' . "\n", 3, $logFile);
				return;
		}

		if ($requestedImage === false) {
			error_log('requestedImage false' . "\n", 3, $logFile);
			return;
		}

		$currentWidth  = imagesx($requestedImage);
		$currentHeight = imagesy($requestedImage);

		$maxWidth  = 1200;
		$maxHeight = 900;

		if ( isset($_GET['ratio'])) {

			//calculate new image dimensions (preserve aspect)
			if ($imageWidth && !$imageHeight) {

				$newWidth  = $imageWidth;
				$newHeight = $newWidth * ($currentHeight/$currentWidth);

			} elseif ($imageHeight && !$imageWidth) {
					
				$newHeight = $imageHeight;
				$newWidth  = $newHeight * ($currentWidth/$currentHeight);
			
			} elseif(($currentWidth < $maxWidth) && ($currentHeight > $currentHeight)) {
				
				$newWidth  = $currentWidth;
				$newHeight = ceil($newWidth * ($currentHeight/$currentWidth));

			} elseif(($currentWidth < $maxWidth) || ($currentHeight < $currentHeight)) {
			
				$newHeight = $currentHeight;
				$newWidth  = $currentWidth;

			} else {

				$newWidth  = $imageWidth ? $imageWidth : 1200;
				$newHeight = $imageHeight ? $imageHeight : 900;

				$orgRatio = ($currentWidth/$currentHeight);
				$newRatio = ($newWidth/$newHeight);

				if ($orgRatio >  $newRatio) {
					
					$newHeight = ceil($newWidth * ($currentHeight/$currentWidth));

				} else {

					$newWidth = ceil($newHeight * ($currentWidth/$currentHeight));    

				}
			}

		} else {

				$newWidth = $imageWidth;
				$newHeight = $imageHeight;
		}

		$newImage = imagecreatetruecolor($newWidth, $newHeight);

		imagecopyresampled($newImage, $requestedImage, 0, 0, 0, 0, $newWidth, $newHeight, $currentWidth, $currentHeight);

		// Send resized image to browser
		$browserCache = 60*60*24*7;
		$quality = 95; // You can adjust this value

		header('Content-Type: image/'.$imageType);

		switch($imageType){
			case 'jpeg':
				if(!imagejpeg($newImage, NULL, $quality)){
					error_log('Failed to create a JPEG image' . "\n", 3, $logFile);
					return;
				}
				break;
			case 'png':
				imagesavealpha($newImage, true);
				if(!imagepng($newImage)){
					error_log('Failed to create a PNG image' . "\n", 3, $logFile);
					return;
				}
				break;
		}

		imagedestroy($newImage);
		exit();
	} else {
        file_put_contents($logFile, "Image file does not exist at the specified path: " . $imageFullPath . "\n", FILE_APPEND); // log the error message
    }
}
?>