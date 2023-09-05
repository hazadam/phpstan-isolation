<?php

namespace Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure;

class Methods
{
    public function foo(): ReturnFromMethod
    {
        return new ReturnFromMethod();
    }
}
