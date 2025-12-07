<?php

class FileName
{
    public $path;
    public $extension;
    public $filename;
    public $directory;
    
    // Retrieve the file extension from the path
    public function getFileExtension()
    {
        $pathinfo = pathinfo($this->path);
        $this->extension = strtolower($pathinfo['extension']);
        return $this->extension ?: false; // Return the extension or false if not found
    }

    // Retrieve the filename from the path
    public function getFilename()
    {
        $pathinfo = pathinfo($this->path);
        $this->filename = $pathinfo['filename'];
        return $this->filename ?: false; // Return the filename or false if not found
    }

    // Retrieve the directory from the path
    public function getDirectory()
    {
        $pathinfo = pathinfo($this->path);
        $this->directory = $pathinfo['dirname'];
        return $this->directory ?: false; // Return the directory or false if not found
    }
}

?>
