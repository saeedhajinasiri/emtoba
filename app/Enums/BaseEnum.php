<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

class BaseEnum extends Enum
{
    /**
     * get Translated keys
     * @return array
     */
    public static function transKeys()
    {
        $keys = array_keys(self::toArray());
        $transKeys = [];
        foreach ($keys as $key) {
            $transKeys[] = trans('enums.' . $key);
        }

        return $transKeys;
    }

    /**
     * Get full translated array.
     *
     * @param null $prefix
     * @param null $value
     * @return array
     */
    public static function trans($prefix = null, $value = null)
    {
        if(!$prefix)
            $prefix = 'enums.';
        if($value != null){
            $flipArray = static::flipArray();
            return trans($prefix.$flipArray[$value]);
        }
        $props = self::toArray();
        $trans = [];
        foreach ($props as $key => $value) {
            $trans[$key] = trans($prefix . $value);
        }

        return $trans;
    }

    public static function flipArray()
    {
        return array_flip(static::toArray());
    }

    /**
     * Get full translated array.
     *
     * @param null $prefix
     * @return array
     */
    public static function transFlip($prefix = null)
    {
        if($prefix === null)
            $prefix = '';
        $props = self::toArray();
        $trans = [];
        foreach ($props as $key => $value) {
            $trans[$value] = trans($prefix . $key);
        }

        return $trans;
    }

    public static function optionize($trans = false, $prefix = '', $default=null)
    {
        $ret = [];
        foreach(self::toArray() as $key => $value){
            if($trans){
                $text = trans($prefix . $value);
            } else {
                $text = $value;
            }
            $ret[] = '<option value="' . $key . '" ' . (($key == $default) ? 'selected' : '') . '>' . $text . '</option>';
        }

        return implode('', $ret);
    }

    public static function flipOptionize($trans = false, $prefix = '', $default=null)
    {
        $ret = [];
        foreach(self::toArray() as $value => $key){
            if($trans){
                $text = trans($prefix . $value);
            } else {
                $text = $value;
            }
            $ret[] = '<option value="' . $key . '" ' . (($key == $default) ? 'selected' : '') . '>' . $text . '</option>';
        }

        return implode('', $ret);
    }
}