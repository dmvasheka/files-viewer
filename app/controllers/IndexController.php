<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Config;
use App\Core\Controller;
use App\Models\ModelPage;
use App\Services\FoldersServices;

class IndexController extends Controller
{
    /**
     * @var
     */
    public $model;
    public $result;
    public $data = array();
    public $folderService;
    /**
     * ControllerMain constructor.
     *
     * @param ModelPage $model
     */
    function __construct()
    {
        parent::__construct();
        $this->folderService = new FoldersServices();
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->view->render('page', ['data' => 'hello']);
    }


  
}