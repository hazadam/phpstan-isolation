<?php

namespace Admilabs\PhpunitIsolation\Tests\fixtures\project2\src\UseCase;

require_once __DIR__ . '/../Infrastructure/low_level_functions.php';

use Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\DatabaseDrivers,
    Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\ParentClass;
use Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\InterfaceWithConstants;
use Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\Methods;
use Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\ReturnClass;
use Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\StaticFunctions;
use Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\StaticReference;
use Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\TraitWithStaticProperties;
use Admilabs\PhpunitIsolation\Tests\fixtures\project2\src\Infrastructure\ExternalApiClient;
use function Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\accidental_complexity;

class CreateOrder extends ParentClass implements \Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\ExternalInterface
{
    use \Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\ThirdPartyTrait;
    use \Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\FourthPartyTrait,
        \Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\FifthPartyTrait;

    public const IMPORTANT_CONST = StaticReference::ARBITRARY_CONST;

    public function __construct()
    {
        $constFromInterface = InterfaceWithConstants::CONST_FROM_INTERFACE;
        $prop = TraitWithStaticProperties::$property;
        $client = new ExternalApiClient();
        $repository = new \Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\DatabaseRepository();
        $drivers = DatabaseDrivers::cases();
        $test = StaticFunctions::test();
    }

    public function foo(ExternalApiClient $client, InterfaceWithConstants $interfaceWithConstants): ReturnClass
    {
        $methods = new Methods();
        $result = (new Methods())->foo();
        $result = $methods->foo();
        $result->method();
        $result->compound();
        $result = Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\low_level();

        return \Admilabs\PhpstanIsolation\Tests\fixtures\project2\src\Infrastructure\StaticReference::ARBITRARY_CONST;
    }
}
