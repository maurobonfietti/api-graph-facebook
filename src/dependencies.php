<?php

$container = $app->getContainer();

// Facebook API Graph
$container['fb'] = function ($c) {
    $settings = $c->get('settings')['facebook'];

    $config = new Facebook\Facebook([
        'app_id' => $settings['app_id'],
        'app_secret' => $settings['app_secret'],
        'default_graph_version' => $settings['default_graph_version'],
    ]);

    return $config;
};
