<?php

namespace App\Test\WebCrawler\Operation;

use App\WebCrawler\Operation\Scraping;
use PHPUnit\Framework\TestCase;

/**
 * Class ScrapingTest
 * @package App\Test\WebCrawler\Operation
 */
class ScrapingTest extends TestCase
{
    /**
     * @covers Scraping::getNews()
     */
    public function testGetFirstThirtyNewsWithContentsAsArray()
    {
        $Scraping = new Scraping();

        $this->assertEquals(is_array($Scraping->getNews()), true);
        $this->assertEquals(count($Scraping->getNews()), 30);
    }
}
