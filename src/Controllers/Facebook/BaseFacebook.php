<?php

namespace App\Controllers\Facebook;

class BaseFacebook
{
    public function __construct($container)
    {
        $this->facebook_service = $container->get('facebook_service');
    }
}
