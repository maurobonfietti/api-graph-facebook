<?php

$app->get('/version', function () {
    $msg = ['info' => ['api_version' => '0.1.3']];

    return json_encode($msg, JSON_PRETTY_PRINT);
});

$app->get('/', function () {
    $msg = [
        'info' => [
            'code' => 'Welcome!',
            'message' => 'Try using a facebook profile like: users/1234',
        ],
    ];

    return json_encode($msg, JSON_PRETTY_PRINT);
});

$app->get('/users/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getUser($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});

$app->get('/users/fullinfo/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getUserFullInfo($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});

$app->get('/pages/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getPageFullInfo($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});
