<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 23:24
 */
class Routing
{
    const ROUTING_FILE_PATH = '/../config/routes.php';

    private $routes;

    protected $controller;

    protected $action;

    public function __construct()
    {
        $this->routes = require(__DIR__.self::ROUTING_FILE_PATH);
    }

    public function findRoute()
    {
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route) {
            if ($route['pattern'] == $uri) {
                $matches[] = $route[0];
            }
        }
        if (empty($matches)) {
            throw new Exception('No route pattern matches requested URL!');
        } elseif (count($matches) > 1) {
            throw new Exception('Requested URL matches several route patterns! Please check your /config/routes.php');
        } else {
            $match = explode('/', $matches[0]);
            $controllerFile = ucfirst($match[0]).'Controller.php';
            if (!file_exists(__DIR__.'/../controllers/'.$controllerFile)) {
                throw new Exception('No such controller as '.$controllerFile.'! Please check directory consistency or your /config/routes.php');
            } else {
                $controllerClass = ucfirst($match[0]).'Controller';
                $controller = new $controllerClass();
                $action = 'action'.ucfirst($match[1]);
                if (!method_exists($controller, $action)) {
                    throw new Exception('No such action like '.$action.' in class '.$controllerClass.'!');
                } else {
                    $controller->$action();
                }
            }
        }
    }

    public function createUrl($path)
    {
        foreach($this->routes as $route) {
            if($route[0] == $path) {
                $matches[] = $route['pattern'];
            }
        }
        if (empty($matches)) {
            throw new Exception('No route pattern matches requested URL!');
        } elseif (count($matches) > 1) {
            throw new Exception('Requested URL matches several route patterns! Please check your /config/routes.php');
        } else {
            return 'http://'.$_SERVER['HTTP_HOST'].$matches[0];
        }
    }
} 