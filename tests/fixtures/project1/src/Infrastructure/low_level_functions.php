<?php

namespace Admilabs\PhpstanIsolation\Tests\fixtures\project1\src\Infrastructure;

use Admilabs\PhpstanIsolation\Tests\fixtures\project1\src\Infrastructure\ReturnedFromFunction1;

function low_level(): ReturnedFromFunction1
{
    return new ReturnedFromFunction1();
}

function accidental_complexity(): void
{

}
