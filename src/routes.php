<?php

$app->get('/[{name}]', function ($request, $response, $args) {
    $name = $request->getAttribute('name');

    if (!$name) {
        $msg = 'Welcome! Try using a facebook profile as parameter, like 1234.';

        return $msg;
    }

    $fb = facebook::getUser($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});

$app->get('/users/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getUserFullInfo($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});

$app->get('/pages/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getPageFullInfo($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});
