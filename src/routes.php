<?php

$app->get('/version', function () {
    $msg = ['info' => ['api_version' => '0.1.4']];

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
    $fb = facebook::getUser($request);

    return $this->response->withJson(json_decode($fb->getBody()));
});

$app->get('/users/fullinfo/[{name}]', function ($request) {
    $fb = facebook::getUserFullInfo($request);

    return $this->response->withJson(json_decode($fb->getBody()));
});

$app->get('/pages/[{name}]', function ($request) {
    $fb = facebook::getPageFullInfo($request);

    return $this->response->withJson(json_decode($fb->getBody()));
});
