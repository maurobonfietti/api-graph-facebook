<?php

namespace App\Services;

class FacebookService extends BaseService
{
    public function getUser($url)
    {
        $token = $this->facebook->getApp()->getAccessToken();
        $response = $this->facebook->get($url, $token);

        return json_decode($response->getBody());
    }

    public function getPage($url)
    {
        $token = $this->facebook->getApp()->getAccessToken();
        $response = $this->facebook->get($url, $token);

        return json_decode($response->getBody());
    }
}
