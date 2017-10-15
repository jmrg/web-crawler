<?php

namespace WebCrawler\Test\Controllers;

use Framework\View;
use PHPUnit\Framework\TestCase;
use WebCrawler\Controllers\HomeController;

/**
 * Class HomeController
 * @package WebCrawler\Test\Controllers
 */
class HomeControllerTest extends TestCase
{
    /**
     * @var \WebCrawler\Controllers\HomeController
     */
    private $HomeController;

    protected function setUp()
    {
        $this->HomeController = new HomeController();
    }

    public function testTheMethodHomeOfTheHomeControllerClassReturnInstanceView()
    {
        $this->assertInstanceOf(View::class, $this->HomeController->home());
    }
}