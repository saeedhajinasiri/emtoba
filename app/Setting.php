<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
    public static $columns;


    /**
     * Get all of rows in settings table
     *
     * @return mixed
     */
    public static function getColumns()
    {
        self::$columns = Setting::all()->groupBy('key')->map(function ($column) {
            return current($column->toArray());
        });

        return self::$columns;
    }

    /**
     * Get the specific row from database and return this value
     *
     * @param $fieldName
     * @return null
     */
    public static function get($fieldName)
    {
        if (isset(self::$columns[$fieldName])) {
            return self::$columns[$fieldName]['value'];
        } else {
            $field = Setting::where('key', $fieldName)->first();

            if (isset($field)) {
                return $field->value;
            } else {
                return null;
            }
        }
    }
}
