<?php

use App\Handlers\ApiError;
use App\Services\FacebookService;

$container = $app->getContainer();

$container['facebook_service'] = function ($c) {
    $settings = $c->get('settings')['facebook'];
    $facebook = new Facebook\Facebook([
        'app_id' => $settings['app_id'],
        'app_secret' => $settings['app_secret'],
        'default_graph_version' => $settings['default_graph_version'],
    ]);

    return new FacebookService($facebook);
};

$container['errorHandler'] = function () {
    return new ApiError;
};
