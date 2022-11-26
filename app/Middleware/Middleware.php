<?php

namespace Gregorio\Middleware;

interface Middleware
{
    function before(): void;

}