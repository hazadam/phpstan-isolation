<?php

namespace Admilabs\PhpstanIsolation\Tests\fixtures\project1\src\Infrastructure;

class Methods
{
    public function foo(): ReturnFromMethod
    {
        return new ReturnFromMethod();
    }
}
