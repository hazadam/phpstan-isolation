<?php

namespace Admilabs\PhpstanIsolation\Rules;

use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\ShouldNotHappenException;

class DependencyInversionRule implements Rule
{
    public function getNodeType(): string
    {
        return \PhpParser\Node\Stmt\Use_::class;
    }

    /**
     * @throws ShouldNotHappenException
     */
    public function processNode(\PhpParser\Node $node, Scope $scope): array
    {
        if (false === $node instanceof \PhpParser\Node\Stmt\Use_) {
            throw new ShouldNotHappenException();
        }

        $errors = [];

        foreach ($node->uses as $use) {
            $nameInUse = (string) $use->name;

            if ($this->isHighLevelModule($scope->getFile()) && $this->isLowLevelModule($nameInUse)) {
                $errors[] = sprintf(
                    'High-level module %s should not depend on low-level module %s.',
                    $scope->getNamespace(),
                    $nameInUse
                );
            }
        }

        return $errors;
    }

    private function isHighLevelModule(string $file): bool
    {
        return str_contains($file, 'Model');
    }

    private function isLowLevelModule(string $importedName): bool
    {
        return str_contains($importedName, 'Api');
    }
}