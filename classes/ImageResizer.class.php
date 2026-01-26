<?php

class ImageResizer extends FileName
{
        
    public $quality;
    /**
     * @var bool
     */
    public $overwrite;
    public $extension;
    /**
     * @var mixed[]|bool
     */
    public $imageinfo;
    public $width;
    public $height;
    public $filename;
    public $maxwidth;
    public $maxheight;
    public $path;
    public $image;
    public $savetype;
    public $errorArr;
    public $orientation_relative;
    public $orientation;
    public $newheight;
    public $newwidth;
    public $suffix;
    public $savedirectory;
    public $newimage;
    public $newImageNewName;

        
    function __construct()
    {
    }

    function setMaxWidth($maxwidth)
    {
        return $this->maxwidth = $maxwidth;
    }
    
    function setMaxHeight($maxheight)
    {
        return $this->maxheight = $maxheight;
    }
    
    function setSaveType($savetype)
    {
        return $this->savetype = $savetype;
    }
    
    function setSuffix($suffix)
    {
        return $this->suffix = $suffix;
    }
    
    function setSaveDirectory($savedirectory)
    {
        return $this->savedirectory = $savedirectory;
    }
    
    function setQuality($quality)
    {
        return $this->quality = $quality;
    }
    
    function allowOverwrite($value)
    {
        return $this->overwrite = (bool) $value;
    }
    
    function initiate()
    {
        $this->errorArr = [];

        // Check if GD extension is loaded
        if (!extension_loaded('gd') || !function_exists('imagecreatefrompng')) {
            $this->errorArr[] = 'PHP GD extension is not enabled. Please enable the GD extension in your php.ini file.';
            return;
        }

        if(!$this->maxwidth && !$this->maxheight) { 

            $this->errorArr[] = 'Please specify a maximum width and/or height.';

        } 

        if (!$this->path) {
            $this->errorArr[] = 'Please specify an image path.';
        } elseif (!fopen($this->path,'r')) {
            $this->errorArr[] = 'Sorry, but the file specified does not exist.';
        } else { 

            $this->getFileExtension();
            $this->getFilename();
            $this->getDirectory();

            // error_log("Image Path: " . $this->path . "\n", 3, "error.log");
            // error_log("Image Extension: " . $this->extension . "\n", 3, "error.log");

            switch(strtolower((string) $this->extension)) {

                case('jpg'): case('jpeg'):
                    $this->image = imagecreatefromjpeg($this->path);
                    break;

                case('gif'):
                    $this->image = imagecreatefromgif($this->path);
                    break;

                case('png'):
                    $this->image = imagecreatefrompng($this->path);
                    break;

                case('wbmp'): case('bmp'):
                    $this->image = imagecreatefromwbmp($this->path);
                    break;

                case('webp'):
                    $this->image = imagecreatefromwebp($this->path);
                    break;

            }


            if (!$this->image) { 

                $this->errorArr[] = 'Sorry, but the image specified is not supported.';

            } else {

                $this->imageinfo = getimagesize($this->path);
                $this->width = $this->imageinfo[0];
                $this->height = $this->imageinfo[1];

            }
        }

        if (!$this->savedirectory) { 

            $this->errorArr[] = 'Please specify a directory to save the image to.';

        } else { 

            if (!file_exists($this->savedirectory)) { 

                $this->errorArr[] = 'The save directory specified does not exist.';

            }

            if (!is_writable($this->savedirectory)) { 

                $this->errorArr[] = 'The save directory specified does not have writing permission.';

            }
        }


        $this->quality = $this->quality ? str_replace('%','',(string) $this->quality) : 80;
    }
    
    function saveImage($crop=false)
    {
        if ($crop) {

            $this->newimage = imagecreatetruecolor($this->maxwidth, $this->maxheight);

            $newx = ($this->maxwidth - $this->newwidth) / 2;
            $newy = ($this->maxheight - $this->newheight) / 2;


            imagecopyresampled($this->newimage, $this->image, $newx, $newy, 0, 0, $this->newwidth, $this->newheight, $this->width, $this->height);

        } else {

            $this->newimage = imagecreatetruecolor($this->newwidth, $this->newheight);
            imagecopyresampled($this->newimage, $this->image, 0, 0, 0, 0, $this->newwidth, $this->newheight, $this->width, $this->height);

        }
        
        if (!$this->savetype){ 

            $this->savetype = $this->extension;

        }

        $filePath = $this->savedirectory.'/'.((is_null($this->newImageNewName)) ? $this->filename : $this->newImageNewName).$this->suffix.'.'.$this->savetype;

        switch (strtolower((string) $this->savetype)) { 

            case('jpg'): case('jpeg'):
                imagejpeg($this->newimage,$this->savedirectory.'/'.((is_null($this->newImageNewName)) ? $this->filename : $this->newImageNewName).$this->suffix.'.'.$this->savetype,$this->quality);
                break;

            case('gif'):
                imagegif($this->newimage,$this->savedirectory.'/'.((is_null($this->newImageNewName)) ? $this->filename : $this->newImageNewName).$this->suffix.'.'.$this->savetype);
                break;

            case('png'):
                imagepng($this->newimage,$this->savedirectory.'/'.((is_null($this->newImageNewName)) ? $this->filename : $this->newImageNewName).$this->suffix.'.'.$this->savetype,$this->quality);
                break;

            case('webp'):
                imagewebp($this->newimage,$this->savedirectory.'/'.((is_null($this->newImageNewName)) ? $this->filename : $this->newImageNewName).$this->suffix.'.'.$this->savetype,$this->quality);
                break;

            default:
                $this->errorArr[] = 'The savetype specified is not supported';
                return $this->displayErrors();
        }

        if (!$result) {
            error_log("Failed to write image to $filePath\n", 3, "error.log");
        } else {
            error_log("Successfully wrote image to $filePath\n", 3, "error.log");
        }
        
        return true;
    }
    
    function resizeToFill($crop=false){
        $dontenlarge = null;
        $this->initiate();

        if($this->height>$this->maxheight || $this->width>$this->maxwidth || !$dontenlarge){
            if($this->maxheight && $this->maxwidth &&  $this->height != null){
                if($this->getOrientation_relative() == "portrait") {
                    $image_resize                   = $this->maxwidth / $this->width;
                    $this->newwidth                 = round(($this->maxwidth),0);
                    $this->newheight                = round(($this->height * $image_resize),0);
                } else {
                    $image_resize                   = $this->maxheight / $this->height;
                    $this->newheight                = round(($this->maxheight),0);
                    $this->newwidth                 = round(($this->width * $image_resize),0);
                }
            } else {
                $this->errorArr[] = 'In order to use the resizeToFill method, you must specify both the max height and max width';
            }
        } else {
            $this->newwidth = $this->width;
            $this->newheight = $this->height;
        }
        return (is_countable($this->errorArr) ? count($this->errorArr) : 0) > 0 ? $this->displayErrors() : $this->saveImage($crop);
    }
    
    function resizeToFillCropped(){
        $this->resizeToFill(true);
    }
    
    function resizeToFit($dontenlarge=false){
        $this->initiate();
        if($this->height>$this->maxheight || $this->width>$this->maxwidth || !$dontenlarge){
            if($this->getOrientation_relative() == "portrait" || !$this->maxwidth) {
                if($this->maxheight){
                    $image_resize                   = $this->height / $this->maxheight;
                    $this->newheight                = round(($this->maxheight),0);
                    $this->newwidth                 = round(($this->width / $image_resize),0);
                } else {
                    $this->errorArr[] = 'In order to use the resizeToFit with this relatively-portrait image, you must specify a max height';
                }
            }elseif($this->getOrientation_relative() == "landscape" || !$this->maxheight){
                if($this->maxwidth){
                    $image_resize                   = $this->maxwidth / $this->width;
                    $this->newwidth                 = round(($this->maxwidth),0);
                    $this->newheight                = round(($this->height * $image_resize),0);
                } else {
                    $this->errorArr[] = 'In order to use the resizeToFit with this relatively-landscape image, you must specify a max width';
                }
            }
        } else {
            $this->newheight = $this->height;
            $this->newwidth = $this->width;

        }
        
        return (is_countable($this->errorArr) ? count($this->errorArr) : 0) > 0 ? $this->displayErrors() : $this->saveImage();
    }
    
    function resizeStretch(){
        $this->initiate();
        $this->newheight = $this->maxheight;
        $this->newwidth = $this->maxwidth;
        return (is_countable($this->errorArr) ? count($this->errorArr) : 0) > 0 ? $this->displayErrors() : $this->saveImage();
    }

    function displayErrors(){
        if((is_countable($this->errorArr) ? count($this->errorArr) : 0) !== 0){
            $str = 'The image could not be resized for the following reason'.((is_countable($this->errorArr) ? count($this->errorArr) : 0)>1?'s':'').'... <br/><ul>';
            foreach($this->errorArr as $value){
                $str .= '<li>'.$value.'</li>';
            }
            return $str . '</ul>';
        } else {
            return false;
        }
        
    }

    function getOrientation_relative(){
        if($this->width != 0 && $this->height != 0 && $this->maxheight != 0 && $this->maxwidth != 0){
            $container_ratio                    = $this->maxwidth / $this->maxheight;
            $image_ratio                        = $this->width / $this->height;
            return $this->orientation_relative  = ($container_ratio > $image_ratio) ? "portrait" : "landscape";
        } else {return false;}
    }
    
    function getOrientation(){
        if($this->width != 0 && $this->height != 0){
            $image_ratio                        = $this->width / $this->height;
            return $this->orientation           = ($image_ratio >= 1) ? "landscape" : "portrait";
        } else {return false;}
    }
    
    
    function resizer($saveDir, $path, $maxWidth, $maxHeight, $new_name = null, $saveType='jpg', $scaleType='fill', $qlty=80){
        $this->setSaveDirectory($saveDir);
        $this->path = $path;
        $this->setMaxWidth($maxWidth);
        $this->setMaxHeight($maxHeight);
        $this->newImageNewName = $new_name;

        if($saveType === 'jpg' || $saveType === 'jpeg' || $saveType === 'webp') $this->setQuality($qlty);
        $this->setSaveType($saveType);
        
        if( $scaleType == 'fill' ){
            $this->resizeToFillCropped();  
        } else {
            $this->resizeToFitCropped();
        }
    }

    function scaleImage($path,$containerHeight,$containerWdith,$scaleType='fill'){
        $this->setContainerHeight($containerHeight);
        $this->setContainerWidth($containerWdith);
        $this->setScaling($scaleType);
        
        $dimentions = @getimagesize($path);
        
        if($dimentions && is_array($dimentions) && count($dimentions)>3){
            
            $this->setWidth($dimentions[0]);
            $this->setHeight($dimentions[1]);
            $image_styles = $this->initiateScaling();
            
            if($image_styles){
                return $image_styles;
            }
        }
    }
}
?>