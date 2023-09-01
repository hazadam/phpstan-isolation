<?php

namespace Admilabs\PhpstanIsolation\Tests\feature;

use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function testRule(): void
    {
        $command =
            'php ${PROJECT_DIR}/vendor/bin/phpstan analyse' .
            ' -c ${PROJECT_DIR}/tests/fixtures/project1/phpstan.neon' .
            ' ${PROJECT_DIR}/tests/fixtures/project1/src';

        exec($command, $output);
        self::assertStringContainsString('OK', implode('\n', $output));
    }
}
