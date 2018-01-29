<?php

namespace App\Facebook;

class GetUser extends BaseFacebook
{
    public function __invoke($request, $response)
    {
        try {
            $name = $request->getAttribute('name');
            $url = sprintf('/%s?fields=id,first_name,last_name', $name);
            $fb = $this->fb->get($url, $this->fb->getApp()->getAccessToken());

            return $response->withJson(json_decode($fb->getBody()));
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        }
    }
}
