<?php

namespace Lightway\Controllers;

use Lightway\View\View;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}
