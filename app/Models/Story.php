<?php

namespace WebCrawler\Models;

use Psr\Http\Message\ResponseInterface;
use WebCrawler\Exceptions\StoryException;
use WebCrawler\Traits\ResponseHandler;

/**
 * Class Story
 * @package WebCrawler\Models
 */
class Story
{
    use ResponseHandler;

    /**
     * Story constructor.
     * @param \Psr\Http\Message\ResponseInterface $res
     * @throws StoryException
     */
    public function __construct(ResponseInterface $res)
    {
        $this->response = $res;

        if (!$this->isStatusCodeAccepted()) {
            throw new StoryException('Error: Request not complete');
        }
    }
}