<?php

namespace App\Controllers\Facebook;

class GetUser extends BaseFacebook
{
    public function __invoke($request, $response)
    {
        try {
            $name = $request->getAttribute('name');
            $url = sprintf('/%s?fields=id,first_name,last_name', $name);

            $service = new \App\Services\FacebookService($this->facebook);
            $data = $service->GetPage($url);

            return $response->withJson($data);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            return $response->withJson($e->getResponseData(), $e->getHttpStatusCode());
        }
    }
}
