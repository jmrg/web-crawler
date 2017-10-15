<?php

namespace App\Test\Models;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use App\Models\News;

/**
 * Class NewsTest
 * @package App\Test\Models
 */
class NewsTest extends TestCase
{
    /**
     * @var News
     */
    private $NewsModel;

    protected function setUp()
    {
        $res = (new Client())->request(
            'GET',
            'https://hacker-news.firebaseio.com/v0/topstories.json?print=pretty'
        );

        $this->NewsModel = new News($res);
    }

    /**
     * The method getNews should return a array with the first
     * thirty entries after make http request.
     *
     * @covers News::getNews()
     */
    public function testNewsModelShouldReturnArrayWithTheFirstThirtyEntriesNews()
    {
        $news = $this->NewsModel->getTop();

        $this->assertEquals(is_array($news), true);
        $this->assertEquals(count($news), 30);
    }
}