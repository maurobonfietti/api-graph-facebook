<?php

$app->get('/[{name}]', function ($request, $response, $args) {
    $name = $request->getAttribute('name');

    if (!$name) {
        $msg = 'Welcome! Try using a facebook profile as parameter, like 1234.';

        return $msg;
    }

    $fb = facebook::getUser($request, $response, $args);

    return $fb->getBody();
});

$app->get('/getuserfullinfo/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getUserFullInfo($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});

$app->get('/getfanpageinfo/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getFanPageInfo($request, $response, $args);

    return json_encode(json_decode($fb->getBody()), JSON_PRETTY_PRINT);
});
