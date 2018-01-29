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

$app->get('/users/[{name}]', '\App\Facebook\GetUser');

$app->get('/pages/[{name}]', '\App\Facebook\GetPage');
