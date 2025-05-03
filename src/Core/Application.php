<?php

namespace Lightway\Core;

class Application
{
    public function __construct(){}

    public function run()
    {
        $router = new Router();
        $router->get('/', function() {
            echo  "Hello, World!";
        });
        $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    }
}
