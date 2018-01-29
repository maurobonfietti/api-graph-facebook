<?php

namespace App\Facebook;

class getPage
{
    public function __construct($container)
    {
        $this->fb = $container->get('fb');
    }

    public function __invoke($request, $response, $args)
    {
        try {
            $name = $request->getAttribute('name');
            $url = sprintf('/%s?fields=id,name,about,likes,link', $name);
            $fb = $this->fb->get($url, $this->fb->getApp()->getAccessToken());

            return $response->withJson(json_decode($fb->getBody()));
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        }
    }
}
