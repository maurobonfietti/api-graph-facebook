<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];

    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
};

// facebook api graph
$container['fb'] = function ($c) {
    $settings = $c->get('settings')['facebook'];

    $config = new Facebook\Facebook([
        'default_graph_version' => $settings['default_graph_version'],
        'app_id' => $settings['app_id'],
        'app_secret' => $settings['app_secret'],
        'default_access_token' => $settings['default_access_token'],
    ]);

    return $config;
};
