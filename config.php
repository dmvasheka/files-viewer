<?php
/**
 * Project config
 */

$config = [
    'router' => [
        'siteUrl' => $_SERVER['HTTP_HOST'],
        'baseController' => 'Page',
        'baseAction' => 'Index',
        ],
    'db' => [
        'params' => 'mysql:host=localhost;dbname=mvc;charset=utf8',
        'user' => 'root',
        'pass' => ''
    ],
    'key' =>[],
    'assets' => '/app/assets'
];