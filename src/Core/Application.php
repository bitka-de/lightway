<?php

namespace Lightway\Core;

use Lightway\Controllers\HomeController;

class Application
{
    public function __construct(){}

    public function run()
    {
        $router = new Router();
        $router->get('/', [HomeController::class, 'index']);
        $router->get('/about', [HomeController::class, 'about']);

        $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    }
}
