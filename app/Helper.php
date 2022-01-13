<?php

namespace App;

class Helper
{
    const sex = ['Male', 'Female', 'Others'];
    public static function getGender()
    {
        return self::sex;
    }

    const Ft = ['Constant', 'Per Day', 'Periodic'];
    public static function getFt()
    {
        return self::Ft;
    }
}
