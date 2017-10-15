<?php

namespace WebCrawler\Models;

use Psr\Http\Message\ResponseInterface;
use WebCrawler\Exceptions\NewsException;
use WebCrawler\Traits\ResponseHandler;

class News
{
    use ResponseHandler;

    /**
     * News constructor.
     * @param \Psr\Http\Message\ResponseInterface $res
     * @throws NewsException
     */
    public function __construct(ResponseInterface $res)
    {
        $this->response = $res;

        if (!$this->isStatusCodeAccepted()) {
            throw new NewsException('Error: Request not complete');
        }
    }

    /**
     * @param int $total
     * @return array
     */
    public function getTop($total = 30)
    {
        return array_slice($this->contents = $this->getContents(), 0, $total);
    }
}