<?php

namespace WPEloquent\Model;

use WPEloquent\Core\Helpers;

class Option extends BaseModel
{
    protected $table      = 'options';
    protected $primaryKey = 'option_id';

    public static function getValue($key = '')
    {
        $value = '';

        if ($key) {
            $value = self::where('option_name', '=', $key)->value('option_value');
        }

        if (Helpers::isSerialized($value)) {
            $value = unserialize($value);
        }

        return $value;
    }
}
