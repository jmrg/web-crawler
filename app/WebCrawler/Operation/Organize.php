<?php

namespace App\WebCrawler\Operation;

/**
 * Class Organize
 * @package App\WebCrawler\Operation
 */
class Organize
{
    /**
     * Capture the element list to filter.
     * @var array
     */
    private $list;

    /**
     * Capture the result after applied a process.
     *
     * @var array
     */
    private $filter = [];

    /**
     * Organize constructor.
     * @param array $list
     */
    public function __construct(array $list = [])
    {
        $this->list = $list;
    }

    /**
     * It does filter by words by one specific column, one operator
     * and one value specific.
     *
     * @param string $column
     * @param null $operator
     * @param null $value
     * @return Organize
     */
    public function byWords($column = '', $operator = null, $value = null)
    {
        $filter = [];

        for ($i = 0; $i < count($this->list); $i++) {
            $words = str_word_count($this->list[$i][$column], 0);
            eval("\$status = $words $operator $value;");

            $status && $filter[] = $this->list[$i];
        }

        $this->list = $filter;

        return $this;
    }

    /**
     * Ordered by specific column in the direction solicited.
     *
     * @param string $column
     * @param int $direction < SORT_ASC | SORT_DESC >
     * @return Organize
     */
    public function orderByColumn($column = '', $direction = SORT_ASC)
    {
        $order = [];

        for ($i = 0; $i < count($this->list); $i++) {
            $order[$this->list[$i][$column]] = $this->list[$i];
        }

        $direction == SORT_ASC && ksort($order, SORT_NUMERIC);
        $direction == SORT_DESC && krsort($order, SORT_NUMERIC);

        $this->list = array_values($order);

        return $this;
    }

    /**
     * Return the result after applied filters.
     *
     * @return array
     */
    public function get()
    {
        return $this->list;
    }
}