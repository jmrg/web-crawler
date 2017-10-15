<?php

namespace WebCrawler\Controllers;

use Framework\View;

class HomeController
{
    public function home()
    {
        return new View('Views/Home', [
            'greet' => 'Welcome!!'
        ]);
    }
}