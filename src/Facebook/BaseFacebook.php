<?php

namespace App\Facebook;

class BaseFacebook
{
    public function __construct($container)
    {
        $this->facebook = $container->get('facebook');
    }
}
