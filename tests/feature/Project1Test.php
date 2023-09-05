<?php

namespace Admilabs\PhpstanIsolation\Tests\feature;

use PHPUnit\Framework\TestCase;

class Project1Test extends TestCase
{
    public function testRule(): void
    {
        $command =
            'xphp ${PROJECT_DIR}/vendor/bin/phpstan analyse' .
            ' --xdebug --debug -c ${PROJECT_DIR}/tests/fixtures/project1/phpstan.neon' .
            ' ${PROJECT_DIR}/tests/fixtures/project1/src';

        exec($command, $output);
        self::assertStringContainsString('OK', implode('\n', $output));
    }
}
