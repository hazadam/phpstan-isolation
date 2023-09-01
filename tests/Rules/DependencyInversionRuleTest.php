<?php

namespace Rules;

use PHPStan\Testing\RuleTestCase;
use Admilabs\PhpstanIsolation\Rules\DependencyInversionRule;

class DependencyInversionRuleTest extends RuleTestCase
{
    protected function getRule(): \PHPStan\Rules\Rule
    {
        return new DependencyInversionRule();
    }

    public function testDependencyInversionRule(): void
    {
        $this->analyse(
            [__DIR__ . '/../Data/Model.php'],
            [
                [
                    'High-level module /project/tests/Data/Model.php should not depend on low-level module App\Api\ApiCall.',
                    5
                ]
            ]
        );
    }

}