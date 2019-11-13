<?php
declare(strict_types=1);

namespace GitFilter\Core;

use GitFilter\Http\Request;

interface FrontControllerInterface {

    /**
     *
     */
    public function run(): void;
}