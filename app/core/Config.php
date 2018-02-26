<?php
/**
 * Created by PhpStorm.
 * User: dmvas
 * Date: 17.02.2018
 * Time: 18:20
 */

namespace App\Core;


class Config
{
// this is public to allow better Unit Testing
    public static $config;
    public static function get($key)
    {
        if (!self::$config) {
            $config_file = 'app/config.php';
            if (!file_exists($config_file)) {
                return false;
            }
            self::$config = require $config_file;
        }
        return self::$config[$key];
    }
}