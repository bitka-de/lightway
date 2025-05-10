<?php

namespace Lightway\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        $this->view->render('home', [
            'title' => 'Webagentur aus Karlsruhe',
        ]);
    }

    public function about()
    {
        $this->view->render('home', [
            'title' => 'About Us',
        ]);
    }
}
