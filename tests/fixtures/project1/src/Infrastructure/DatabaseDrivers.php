<?php

namespace Admilabs\PhpstanIsolation\Tests\fixtures\project1\src\Infrastructure;

enum DatabaseDrivers: string
{
    case MYSQL = 'mysql';
    case POSTGRES = 'postgres';
}
