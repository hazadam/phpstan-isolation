<?php

namespace Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure;

enum DatabaseDrivers: string
{
    case MYSQL = 'mysql';
    case POSTGRES = 'postgres';
}
