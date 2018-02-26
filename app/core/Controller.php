<?php

namespace App\Core;

/**
 * Class Controller
 * @package app\core
 */
class Controller
{
    public $model;
    public $view;


    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     *
     */
    public function actionIndex()
    {
    }
}