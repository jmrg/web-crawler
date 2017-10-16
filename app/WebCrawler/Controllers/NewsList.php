<?php

namespace App\WebCrawler\Controllers;

use Framework\View;

class NewsList
{
    public function listing()
    {

        return new View('WebCrawler/View/List', []);
    }
}