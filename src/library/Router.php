<?php


namespace LPWithLatte\library;

use Exception;

class Router
{

    public function __construct(private $routes)
    {
        $this->routes = $routes;
    }

    private function getUrl(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    private function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function start()
    {

        $method = $this->getMethod();
        $url = $this->getUrl();

        if (!isset($this->routes[$method][$url])) {
            throw new Exception("Rota não encontrada");
        }

        $route = $this->routes[$method][$url];
        [$controllerName, $action] = explode('::', $route);

        if (!class_exists($controllerName)) {
            throw new Exception("O controller $controllerName não existe");
        }

        $controllerInstance = new $controllerName();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("Método $action não encontrado no controller $controllerName");
        }

        return $controllerInstance->$action();
    }
}