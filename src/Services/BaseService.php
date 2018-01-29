<?php

namespace App\Services;

use \Facebook\Facebook;

class BaseService
{
    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }
}
