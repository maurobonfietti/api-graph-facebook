<?php

namespace App\Controllers;

class BaseController
{
    public function GetHelp($request, $response)
    {
        $msg = [
            'status' => 'OK',
            'title' => 'Welcome!',
            'message' => 'Try getting a Facebook profile, for example: users/1234',
        ];

        return $response->withJson($msg);
    }

    public function GetVersion($request, $response)
    {
        $msg = [
            'status' => 'OK',
            'api_version' => '18.01',
        ];

        return $response->withJson($msg);
    }
}
