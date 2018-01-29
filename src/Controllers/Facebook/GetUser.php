<?php

namespace App\Controllers\Facebook;

class GetUser extends BaseFacebook
{
    public function __invoke($request, $response)
    {
        try {
            $name = $request->getAttribute('name');
            $url = sprintf('/%s?fields=id,first_name,last_name', $name);
            $token = $this->facebook->getApp()->getAccessToken();
            $facebook = $this->facebook->get($url, $token);
            $data = json_decode($facebook->getBody());

            return $response->withJson($data);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        }
    }
}
