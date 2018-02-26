<?php
use App\Core\App;
/**
 * Require load file
 */
require_once __DIR__ . '/app/bootstrap.php';
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Require config file
 */
require_once __DIR__ . '/config.php';

//$app = require_once __DIR__ . '/app/core/App.php';
App::execute($config);
