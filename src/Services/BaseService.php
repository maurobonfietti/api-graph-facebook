<?php

namespace App\Services;

class BaseService
{
    public function __construct($facebook)
    {
        $this->facebook = $facebook;
    }
}
