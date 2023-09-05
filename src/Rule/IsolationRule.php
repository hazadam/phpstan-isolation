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
        $dependencies = null;

        if ($node instanceof Node\Stmt\Class_) {
            $implements = array_map(
                static fn (Node\Name\FullyQualified $fqn): string => (string) $fqn,
                $node->implements,
            );
            $dependencies = array_filter([(string) $node->extends, ...$implements]);
        }

        if ($node instanceof Node\Expr\ClassConstFetch) {
            $dependencies = [$node->class];
        }

        if ($node instanceof Node\Stmt\Use_) {
            $dependencies = array_map(
                static fn (Node\Stmt\UseUse $use): string => (string) $use->name,
                $node->uses,
            );
        }

        if ($node instanceof Node\Stmt\TraitUse) {
            $dependencies = array_map(
                static fn (Node\Name\FullyQualified $fqn): string => (string) $fqn,
                $node->traits,
            );
        }

        if ($node instanceof Node\Expr\New_) {
            $dependencies = [$node->class];
        }

        if ($node instanceof Node\Expr\StaticPropertyFetch) {
            $dependencies = [$node->class];
        }

        if ($node instanceof Node\Expr\StaticCall) {
            $dependencies = [$node->class];
        }

        if ($node instanceof Node\Name\FullyQualified) {
            $dependencies = [$node->type];
        }

        if ($node instanceof Node\Expr\FuncCall) {
            $dependencies = [(string) $node->name];
        }

        if ($node instanceof Node\Expr\MethodCall || $node instanceof Node\Expr\NullsafeMethodCall) {
            $dependencies = [(string) $node->name];
            $returnType = (new \ReflectionMethod($node->var->class . '::' . $node->name))->getReturnType()->getName();
        }

        return [];
    }
}
