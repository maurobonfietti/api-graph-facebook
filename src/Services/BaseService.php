<?php

namespace App\Services;

use \Facebook\Facebook;

class BaseService
{
    /**
     * @var Facebook 
     */
    protected $facebook;

    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }
}
