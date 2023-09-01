<?php

namespace Admilabs\PhpstanIsolation\Rule;

use PhpParser\Node;
use Phpstan\Rules\Rule;
use Phpstan\Analyser\Scope;

final class IsolationRule implements Rule
{
    public function getNodeType(): string
    {
        return Node::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [];
    }
}
