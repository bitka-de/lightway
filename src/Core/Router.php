<?php

namespace Lightway\Core;

/**
 * TODOS
 * - Middleware
 * - Route groups
 * - Route parameters
 * - Route name
 * - Dynamic Routes
 * - Route caching
 */

class Router
{
    private array $routes = [];
    private array $methods = ['POST', 'GET', 'PUT', 'DELETE', 'PATCH', 'OPTIONS'];
    # private array $middleware = [];

    public function __construct() {}

    # Erstelle eine methode mit der ich alle metoden aus dem array $methods verwenden kann um diese zu registrieren
    public function __call($name, $arguments)
    {
        if (in_array(strtoupper($name), $this->methods)) {
            $this->routes[strtoupper($name)][] = $arguments;
        } else {
            throw new \Exception("Method {$name} not allowed.");
        }
    }

    # Erstelle mir eine methode die mir alle routes zurück gibt
    public function getRoutes(): array
    {
        return $this->routes;
    }

    # Erstelle mir eine Methode welche den controller und die action aufruft
    # und mir die response zurück gibt
    public function dispatch(string $method, string $uri)
    {

        if (!isset($this->routes[$method])) {
            throw new \Exception("Method {$method} not allowed.");
        }

        foreach ($this->routes[$method] as $route) {
            if ($route[0] === $uri) {
                $request = $_REQUEST; // Define the request variable
                if (is_callable($route[1])) {
                    return call_user_func($route[1], $request);
                } elseif (is_array($route[1]) && class_exists($route[1][0]) && method_exists($route[1][0], $route[1][1])) {
                    $controller = new $route[1][0](); // Instantiate the controller
                    return call_user_func_array([$controller, $route[1][1]], [$request]);
                } else {
                    throw new \Exception("Invalid route handler for {$uri}.");
                }
            }
        }

        throw new \Exception("Route {$uri} not found.");
    }
}