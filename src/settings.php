<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__.'/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__.'/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Configure a Facebook Api Graph Parameters.
        // Get your app_id and app_secret in: https://developers.facebook.com/apps.
        'facebook' => [
            'default_graph_version' => 'v2.8',
            'app_id' => 'X',
            'app_secret' => 'Y',
            'default_access_token' => 'X',
        ],
    ],
];
