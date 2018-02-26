<?php
/**
 * Project config
 */

return [
    'router' => [
        'siteUrl' => $_SERVER['HTTP_HOST'],
        ],
    'db' => [
        'params' => 'mysql:host=localhost;dbname=mvc;charset=utf8',
        'user' => 'root',
        'pass' => ''
    ],
    'key' =>[],
    'assets' => '/app/assets/',
    'baseController' => 'Index',
    'baseAction' => 'Index',
    'siteUrl' => $_SERVER['HTTP_HOST'],
    'db_connect' => 'mysql:host=localhost;dbname=mvc;charset=utf8',
    'db_user' => 'root',
    'db_pass' => '',
    'default_storage' => $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'user'
];