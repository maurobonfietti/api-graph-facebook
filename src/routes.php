<?php

$app->get('/version', function () {
    $msg = ['info' => ['api_version' => '17.4']];

    return $this->response->withJson($msg);
});

$app->get('/', function () {
    $msg = ['info' => [
            'code' => 'Welcome!',
            'message' => 'Try using a facebook profile, for example: users/1234',
    ]];

    return $this->response->withJson($msg);
});

$app->get('/users/[{name}]', function ($request) {
    $fb = App\facebook::getUser($request, $this->fb);

    if ($fb instanceof Facebook\Exceptions\FacebookResponseException) {
        return json_encode($fb->getResponseData(), JSON_PRETTY_PRINT);
    }
    if ($fb instanceof Facebook\Exceptions\FacebookSDKException) {
        return json_encode($fb->getResponseData(), JSON_PRETTY_PRINT);
    }

    return $this->response->withJson(json_decode($fb->getBody()));
});

$app->get('/pages/[{name}]', function ($request) {
    $fb = App\facebook::getPageFullInfo($request, $this->fb);

    if ($fb instanceof Facebook\Exceptions\FacebookResponseException) {
        return json_encode($fb->getResponseData(), JSON_PRETTY_PRINT);
    }
    if ($fb instanceof Facebook\Exceptions\FacebookSDKException) {
        return json_encode($fb->getResponseData(), JSON_PRETTY_PRINT);
    }

    return $this->response->withJson(json_decode($fb->getBody()));
});
