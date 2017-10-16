<?php

namespace App\WebCrawler\Operation;

use App\Models\News;
use App\Models\Story;
use GuzzleHttp\Client;

class Scraping
{
    /**
     * Return array with news top and contents each one.
     *
     * @param int $total
     * @return array
     */
    public function getNews($total = 30)
    {
        $client = new Client();
        $res = $client->request(
            'GET',
            'https://hacker-news.firebaseio.com/v0/topstories.json?print=pretty'
        );

        $news = (new News($res))->getTop($total);

        for ($i = 0; $i < count($news); $i++) {
            $Story = new Story($client->request(
                'GET',
                "https://hacker-news.firebaseio.com/v0/item/{$news[$i]}.json?print=pretty"
            ));

            $news[$i] = $Story->getContents();
        }

        return $news;
    }
}