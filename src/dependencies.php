<?php
// DIC configuration

$container = $app->getContainer();

// facebook api graph
$container['fb'] = function ($c) {
    $settings = $c->get('settings')['facebook'];

    $config = new Facebook\Facebook([
        'default_graph_version' => $settings['default_graph_version'],
        'app_id' => $settings['app_id'],
        'app_secret' => $settings['app_secret'],
    ]);

    return $config;
};
