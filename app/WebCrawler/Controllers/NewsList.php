<?php

namespace App\WebCrawler\Controllers;

use App\WebCrawler\Operation\Scraping;
use Framework\View;

class NewsList
{
    public function listing()
    {
        return new View('WebCrawler/View/List', [
            'news' => (new Scraping())->getNews(30)
        ]);
    }
}