<?php

namespace App\Services\Media;


class Uploader
{
    protected $path;

    protected $name;

    protected $driver;

    protected $disk;

    public function __construct()
    {
        $this->disk = 'local';

        $this->driver = app('filesystem')->disk($this->disk);
    }

    public function upload(MediaFile $file)
    {
        $fullPath = $file->getFullPath();

        $processor = new ImageProcessor($file);
        $image = $processor->processImage();

        return $this->driver->put($fullPath, $image);
    }

    public function uploadThumbnail(MediaFile $file)
    {
        $fullPath = $file->getFullThumbnailPath();

        $processor = new ImageProcessor($file);

        return $this->driver->put($fullPath, $processor->processThumbnail());
    }

    public function setDisk($disk)
    {
        $this->disk = $disk;

        $this->driver = app('filesystem')->disk($this->disk);

        return $this;
    }

    public function getDisk()
    {
        return $this->disk;
    }
}