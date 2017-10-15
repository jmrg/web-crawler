<?php

namespace Framework;

use Framework\exceptions\ViewException;

/**
 * Class View
 * @package Framework
 */
class View
{
    /**
     * Capture the path with source where from
     * load the View.
     *
     * @var string
     */
    private $path = __DIR__ . '/../app/';

    /**
     * @var array
     */
    private $data = [];

    /**
     * Return the path to View.
     *
     * @return string
     */
    private function getPath()
    {
        return $this->path;
    }

    /**
     * Set the path to View.
     *
     * @param $path
     * @return $this
     */
    private function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Set the data that will use for the View.
     *
     * @param array $data
     * @return $this
     */
    private function setData(array $data = [])
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Return the data that will use for the View.
     *
     * @return array
     */
    private function getData()
    {
        return $this->data;
    }

    /**
     * View constructor.
     *
     * Check that the path is valid file and existing.
     *
     * @param string $path
     * @param array $data
     * @throws ViewException
     */
    public function __construct($path = '', array $data = [])
    {
        if ($this->checkPath($path = $this->getPath() . $path . '.php')) {
            throw new ViewException('View path does not found');
        }

        $this->setPath($path)
            ->setData($data);
    }

    /**
     *
     * @param string $path
     * @return bool
     */
    private function checkPath($path = '')
    {
        return empty($path) || !file_exists($path);
    }

    /**
     * Draw View and wind up script.
     */
    public function render()
    {
        ob_flush();

        extract($this->getData());

        include $this->getPath();

        exit();
    }
}
