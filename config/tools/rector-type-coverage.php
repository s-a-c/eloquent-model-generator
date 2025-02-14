<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\Configuration\Option;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ArrayShapeFromConstantArrayReturnRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromReturnNewRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedCallRector;
use Rector\TypeDeclaration\Rector\Closure\AddClosureReturnTypeRector;
use Rector\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictGetterMethodReturnTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/../../src',
    ]);

    $rectorConfig->skip([
        __DIR__ . '/../../tests',
        __DIR__ . '/../../vendor',
    ]);

    // Configure output format
    $rectorConfig->parameters()->set(Option::OUTPUT_FORMAT, 'json');
    $rectorConfig->parameters()->set(Option::CACHE_DIR, __DIR__ . '/../../build/rector');

    // Type coverage rules
    $rectorConfig->rules([
        AddReturnTypeDeclarationRector::class,
        AddVoidReturnTypeWhereNoReturnRector::class,
        ArrayShapeFromConstantArrayReturnRector::class,
        ReturnTypeFromReturnNewRector::class,
        ReturnTypeFromStrictTypedCallRector::class,
        AddClosureReturnTypeRector::class,
        ParamTypeDeclarationRector::class,
        TypedPropertyFromAssignsRector::class,
        TypedPropertyFromStrictConstructorRector::class,
        TypedPropertyFromStrictGetterMethodReturnTypeRector::class,
    ]);

    // Import type declaration sets
    $rectorConfig->sets([
        __DIR__ . '/../../vendor/rector/rector/config/set/type-declaration.php',
        __DIR__ . '/../../vendor/rector/rector/config/set/type-declaration-strict.php',
    ]);
};
