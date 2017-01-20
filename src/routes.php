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

$app->get('/fanpage/[{name}]', function ($request, $response, $args) {
    $fb = facebook::getFanPage($request, $response, $args);

    return $fb->getBody();
});
