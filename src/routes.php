<?php

$app->get('/', function () {
    $msg = ['info' => [
            'code' => 'Welcome!',
            'message' => 'Try getting a Facebook profile, for example: users/1234',
    ]];

    return $this->response->withJson($msg);
});

$app->get('/version', function () {
    $msg = ['info' => ['api_version' => '18.01']];

    return $this->response->withJson($msg);
});

$app->get('/users/[{name}]', function ($request) {
    try {
        $fb = App\facebook::getUser($request, $this->fb);

        return $this->response->withJson(json_decode($fb->getBody()));
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        return $this->response->withJson($e->getResponseData(), $e->getHttpStatusCode());
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        return $this->response->withJson($e->getResponseData(), $e->getHttpStatusCode());
    }
});

$app->get('/pages/[{name}]', function ($request) {
    try {
        $fb = App\facebook::getPageFullInfo($request, $this->fb);

        return $this->response->withJson(json_decode($fb->getBody()));
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        return $this->response->withJson($e->getResponseData(), $e->getHttpStatusCode());
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        return $this->response->withJson($e->getResponseData(), $e->getHttpStatusCode());
    }
});
