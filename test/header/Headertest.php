<?php

namespace Gregorio\header;

use PHPUnit\Framework\TestCase;

class Headertest extends TestCase
{

    public function testSomethingThatSendsHeaders()
    {
        header('Location: http://localhost:8080/');

        $this->assertContains(
            'Location: http://localhost:8080/', get_headers()
        );
    }



}