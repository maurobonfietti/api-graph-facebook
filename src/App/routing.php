<?php

$app->get('/', '\App\Controllers\BaseController:GetHelp');

$app->get('/version', '\App\Controllers\BaseController:GetVersion');

$app->get('/users/[{name}]', '\App\Controllers\Facebook\GetUser');

$app->get('/pages/[{name}]', '\App\Controllers\Facebook\GetPage');
