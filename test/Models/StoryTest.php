<?php

namespace WebCrawler\Test\Models;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use WebCrawler\Models\News;
use WebCrawler\Models\Story;

/**
 * Class StoryTest
 * @package WebCrawler\Test\Models
 */
class StoryTest extends TestCase
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
     *
     */
    public function testStoryModelShouldReturnArray()
    {
        $firstStory = $this->NewsModel->getTop()[0];

        $res = (new Client())->request(
            'GET',
            "https://hacker-news.firebaseio.com/v0/item/{$firstStory}.json?print=pretty"
        );

        $Story = new Story($res);

        $this->assertEquals(is_integer($firstStory), true);
        $this->assertEquals(is_array($Story->getContents()), true);
    }
}