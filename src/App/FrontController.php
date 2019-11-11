<?php

namespace App;

use Services\Http\Request;
use Services\Http\Response;
use Services\Http\Router;

class FrontController
{
    /**
     * ToDO: Write description
     */
    public function run()
    {
        $response = '';

        $request = new Request();
        $response = new Response();
        $router = new Router($request, $response);
    }
}
