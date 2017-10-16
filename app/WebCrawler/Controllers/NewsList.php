<?php

namespace App\WebCrawler\Controllers;

use App\WebCrawler\Operation\Organize;
use App\WebCrawler\Operation\Scraping;
use Framework\View;

class NewsList
{
    const FILTER_TITLE_1 = 1;
    const FILTER_TITLE_2 = 2;

    /**
     * @param int $filter
     * @return View
     */
    public function listing($filter = 0)
    {

        $news = (new Scraping())->getNews(30);
        $Organize = new Organize($news);

        if ($filter == static::FILTER_TITLE_1) {
            $news = $Organize->byWords('title', '>', 5)
                ->orderByColumn('descendants')
                ->get();
        } elseif ($filter == static::FILTER_TITLE_2) {
            $news = $Organize->byWords('title', '<=', 5)
                ->orderByColumn('score')
                ->get();
        }

        return new View('WebCrawler/View/List', [
            'news' => $news,
            'filter' => $filter
        ]);
    }
}