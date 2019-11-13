<?php
declare(strict_types=1);

namespace GitFilter\Core;

interface FrontControllerInterface {

    public function dispatch($request);

}