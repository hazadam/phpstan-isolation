<?php

namespace Admilabs\PhpunitIsolation\Tests\fixtures\project1\src\UseCase;

use Admilabs\PhpunitIsolation\Tests\fixtures\project1\src\Infrastructure\ExternalApiClient;

class CreateOrder
{
    public function __construct()
    {
        $client = new ExternalApiClient();
        $repository = new \Admilabs\PhpstanIsolation\Tests\fixtures\project1\src\Infrastructure\DatabaseRepository();
    }

    public function foo(): string
    {
        return 'BAR';
    }
}
