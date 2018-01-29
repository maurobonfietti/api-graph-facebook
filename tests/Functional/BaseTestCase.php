<?php

namespace Tests\Functional;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    public function runApp($requestMethod, $requestUri, $requestData = null)
    {
        $environment = Environment::mock([
            'REQUEST_METHOD' => $requestMethod,
            'REQUEST_URI' => $requestUri
        ]);
        $request = Request::createFromEnvironment($environment);
        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }
        $response = new Response();
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../../');
        $dotenv->load();
        $settings = require __DIR__ . '/../../src/App/settings.php';
        $app = new App($settings);
        require __DIR__ . '/../../src/App/dependencies.php';
        require __DIR__ . '/../../src/App/routes.php';

        return $app->process($request, $response);
    }
}
