<?php

namespace App\Services;

class FacebookService extends BaseService
{
    public function getUser($url)
    {
        $token = $this->facebook->getApp()->getAccessToken();
        $facebook = $this->facebook->get($url, $token);
        $data = json_decode($facebook->getBody());

        return $data;
    }

    public function getPage($url)
    {
        $token = $this->facebook->getApp()->getAccessToken();
        $facebook = $this->facebook->get($url, $token);
        $data = json_decode($facebook->getBody());

        return $data;
    }
}
