<?php
use App\FrontController;
use Services\Http\Router;
use Services\Http\Request;
use Services\Http\Response;

/**
 * Create app context
 */
$router = new Router(new Request(), new Response());

$appContext = FrontController::getContext($router);

// configure app
$appContext->setViewDirectory('../Views');

return $appContext;

