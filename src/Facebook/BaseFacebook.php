<?php

namespace App\Facebook;

class BaseFacebook
{
    public function __construct($container)
    {
        $this->fb = $container->get('fb');
    }
}
