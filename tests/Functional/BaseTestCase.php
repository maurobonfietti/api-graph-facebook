<?php

namespace Tests\Functional;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Process the application given a request method and URI
     *
     * @param string $requestMethod the request method (e.g. GET, POST, etc.)
     * @param string $requestUri the request URI
     * @param array|object|null $requestData the request data
     * @return \Slim\Http\Response
     */
    public function runApp($requestMethod, $requestUri, $requestData = null)
    {
        $environment = Environment::mock(
            [
                'REQUEST_METHOD' => $requestMethod,
                'REQUEST_URI' => $requestUri
            ]
        );

        $request = Request::createFromEnvironment($environment);

        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }

        $response = new Response();

        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../../');
        $dotenv->load();

        $settings = require __DIR__ . '/../../src/settings.php';

        $app = new App($settings);

        require __DIR__ . '/../../src/dependencies.php';

        require __DIR__ . '/../../src/routes.php';

        $response = $app->process($request, $response);

        return $response;
    }
}
