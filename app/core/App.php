<?php

namespace App\Core;
/**
 * Class app
 */
class App
{
    public static $config;

    public static function execute($config) : void
    {
        session_start();
        self::$config = Config::get('router');

        Router::execute(self::$config);
    }

    public static function baseUrl()
    {
        return Router::baseUrl();
    }

    public static function assets()
    {
        return Router::baseUrl().Config::get('assets');
    }
}
