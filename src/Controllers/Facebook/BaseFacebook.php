<?php

namespace App\Controllers\Facebook;

use Slim\Container;
use App\Services\FacebookService;

class BaseFacebook
{
    /**
     * @var FacebookService 
     */
    protected $facebook_service;

    public function __construct(Container $container)
    {
        $this->facebook_service = $container->get('facebook_service');
    }
}
