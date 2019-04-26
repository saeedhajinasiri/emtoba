<?php

namespace App\Traits;

use Carbon\Carbon;
use Morilog\Jalali\jDate;
use Morilog\Jalali\jDateTime;

trait ImageTrait
{
    /**
     * image path
     *
     * @return string
     */
    public static function imagePath()
    {
        return DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . strtolower(class_basename(self::class)) . DIRECTORY_SEPARATOR;
    }
}