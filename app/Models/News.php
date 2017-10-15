<?php

namespace App\Models;

use Psr\Http\Message\ResponseInterface;
use App\Exceptions\NewsException;
use App\Traits\ResponseHandler;

/**
 * Class News
 * @package App\Models
 */
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