<?php

namespace Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure;

class ReturnFromMethod
{
    public function method(): void
    {

    }

    /**
     * @return array{Methods, array{int, string}}
     */
    public function compound(): array
    {
        return [];
    }
}
