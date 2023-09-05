<?php

namespace Admilabs\PhpstanIsolation\Tests\feature;

use PHPUnit\Framework\TestCase;

class Project2Test extends TestCase
{
    public function testRule(): void
    {
        $command =
            'export PSALM_ALLOW_XDEBUG=1 && xphp ${PROJECT_DIR}/vendor/bin/psalm' .
            ' -c ${PROJECT_DIR}/tests/fixtures/project2/psalm.xml' .
            ' ${PROJECT_DIR}/tests/fixtures/project2/src';

        exec($command, $output);
        self::assertStringContainsString('OK', implode('\n', $output));
    }
}