<?php

namespace App\Test\WebCrawler\Operation;

use App\WebCrawler\Operation\Organize;
use PHPUnit\Framework\TestCase;

/**
 * Class FilterTest
 * @package App\Test\WebCrawler\Operation
 */
class FilterTest extends TestCase
{
    /**
     * @var array
     */
    private $news = [
        [
            "title" => "GNU UPC",
            "descendants" => 4,
            "score" => 15
        ],
        [
            "title" => "Why physicists still use Fortran",
            "descendants" => 162,
            "score" => 206
        ],
        [
            "title" => "Uber and Lyft have reduced mass transit use and added traffic in major cities",
            "descendants" => 251,
            "score" => 311
        ],
        [
            "title" => "Death of the Nile",
            "descendants" => 10,
            "score" => 60
        ],
        [
            "title" => "Arithmetic Gas",
            "descendants" => 0,
            "score" => 12
        ],
        [
            "title" => "What is Nix and why you should try it",
            "descendants" => 63,
            "score" => 173
        ]
    ];

    /**
     * Filter all previous entries with more than five words in
     * the title ordered by amount of comments first.
     *
     * @covers Organize::byWords()
     * @covers Organize::orderByColumn()
     */
    public function testFilterAllNewsWithMoreThanFiveWordsInTheTitleOrderedByAmountOfCommentsFirst()
    {
        $Filter = new Organize($this->news);
        $matcher = $Filter
            ->byWords('title', '>', 5)
            ->orderByColumn('descendants')
            ->get();

        $this->assertEquals($matcher, [
            [
                "title" => "What is Nix and why you should try it",
                "descendants" => 63,
                "score" => 173
            ],
            [
                "title" => "Uber and Lyft have reduced mass transit use and added traffic in major cities",
                "descendants" => 251,
                "score" => 311
            ]
        ]);
    }

    /**
     * Filter all previous entries with less than or equal to
     * five words in the title ordered by points.
     *
     * @covers Organize::byWords()
     * @covers Organize::orderByColumn()
     */
    public function testFilterAllNewsWithLessThanOrEqualToFiveWordsInTheTitleOrderedByPoints()
    {
        $Filter = new Organize($this->news);
        $matcher = $Filter
            ->byWords('title', '<=', 5)
            ->orderByColumn('score', SORT_DESC)
            ->get();

        $this->assertEquals($matcher, [
            [
                "title" => "Why physicists still use Fortran",
                "descendants" => 162,
                "score" => 206
            ],
            [
                "title" => "Death of the Nile",
                "descendants" => 10,
                "score" => 60
            ],
            [
                "title" => "GNU UPC",
                "descendants" => 4,
                "score" => 15
            ],
            [
                "title" => "Arithmetic Gas",
                "descendants" => 0,
                "score" => 12
            ]
        ]);
    }
}
