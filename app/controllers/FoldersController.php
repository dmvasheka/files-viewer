<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\FoldersServices;

class FoldersController extends Controller
{
    public $service;
    public function __construct()
    {
        parent::__construct();
        $this->service = new FoldersServices();
    }

    public function actionStructure()
    {
        $folders = $this->service->getFolders();
        $this->view->json($folders);
    }
}