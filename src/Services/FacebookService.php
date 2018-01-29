<?php

namespace App\Services;

class FacebookService extends BaseService
{
    public function getUser($url)
    {
        $token = $this->facebook->getApp()->getAccessToken();
        $facebook = $this->facebook->get($url, $token);

        return json_decode($facebook->getBody());
    }

    public function getPage($url)
    {
        $token = $this->facebook->getApp()->getAccessToken();
        $facebook = $this->facebook->get($url, $token);

        return json_decode($facebook->getBody());
    }
}
