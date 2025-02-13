<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\Property\AddPropertyTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([__DIR__ . '/src']);

    $rectorConfig->rules([
        AddReturnTypeDeclarationRector::class,
        AddVoidReturnTypeWhereNoReturnRector::class,
        AddPropertyTypeDeclarationRector::class,
        ParamTypeFromStrictTypedPropertyRector::class,
    ]);

    $rectorConfig->skip([
        // Add any paths or patterns to skip
        __DIR__ . '/src/Legacy/*',
    ]);
};