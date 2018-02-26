<?php

namespace App\Core;

class Router
{
    /**
     * @var array
     */
    static $router = array();

    /**
     * @param array $config
     */
    static function execute($config)
    {

        $url = self::allUrl();
        $urlSep = self::urlSeparator($url);
        $path = self::pathSeparator($urlSep['path']);

        $controllerName = empty($path['controller']) ? Config::get('baseController') : $path['controller'];
        $actionName = empty($path['action']) ? Config::get('baseAction') : $path['action'];
        $params = empty($path['params']) ? null : $path['params'];

        $controllerName = ucfirst(strtolower($controllerName)) . 'Controller';
        $actionName = 'action' . ucfirst(strtolower($actionName));

        $controllerRun = "App\\Controllers\\{$controllerName}";

        if (method_exists($controllerRun, $actionName)) {
            (new $controllerRun)->$actionName($params);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Requested action was not found']);
        }
    }

    /**
     * @return array|string
     */
    private function urlSeparator(string $url)
    {
        return parse_url($url);
    }

    /**
     * @param $path
     * @return array
     */
    private function pathSeparator($path)
    {
        $result = [];
        $path = ltrim($path, '/');
        $pathSep = explode('/', $path);
        $result['controller'] = array_shift($pathSep);
        $result['action'] = array_shift($pathSep);
        $result['params'] = $pathSep;

        return $result;
    }


    /**
     * @return string
     */
    public function allUrl()
    {
        $allUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        return $allUrl;
    }

    /**
     * @return mixed
     */
    static public function  baseUrl()
    {
        $baseUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        return $baseUrl;
    }
}

