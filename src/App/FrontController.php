<?php

namespace App;

use Services\Http\Request;
use Services\Http\Response;

class FrontController
{
    /**
     * ToDO: Write description
     */
    public function run()
    {
        $response = '';

        $request = new Request();

        if ($request->getUri() == '/') {
            $response = Response::create("", 200, ["Content-type" => "text/html; charset=UTF-8"]);
            $response->setBody("");
            $response->setHeader();
        }

        if ($request->getUri() == 'apply' && $request-> getMethod() == 'POST') {

            $response = Response::create();
        }

        echo $response-> getBody();
    }
}
