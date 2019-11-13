<?php


namespace GitFilter\Core;


use GitFilter\Http\Response;

class View
{
    public function render(Response $response)
    {
        return "<span style=\"color: red\">" . $response->getBody() . "</span>";
    }
}