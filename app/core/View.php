<?php
namespace App\Core;

use App\Core\App;

class View
{
    public $layout = 'layout.php';

    public function __construct()
    {

        //$this->layout = 'layout.php';
    }

    public function render($content, $data = null, $layout = 'layout')
    {

        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        require  realpath(dirname(__FILE__).'/../../') . '/app/views/' . $layout. '.php';

    }

    public function renderClear($filename, $data = null)
    {
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        require realpath(dirname(__FILE__).'/../../') . '/app/views/' . $filename . '.php';
    }

    /**
     * Renders pure JSON to the browser, useful for API construction
     * @param $data
     */
    public function json($data)
    {
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}
