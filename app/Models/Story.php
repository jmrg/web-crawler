<?php

namespace App\Models;

use Psr\Http\Message\ResponseInterface;
use App\Exceptions\StoryException;
use App\Traits\ResponseHandler;

/**
 * Class Story
 * @package App\Models
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