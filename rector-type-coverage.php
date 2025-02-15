<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\Property\AddPropertyTypeDeclarationRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/src',
    ]);

    $rectorConfig->skip([
        __DIR__.'/tests',
        __DIR__.'/vendor',
        __DIR__.'/src/Services/AI',
    ]);

    $rectorConfig->rules([
        AddReturnTypeDeclarationRector::class,
        AddVoidReturnTypeWhereNoReturnRector::class,
        AddPropertyTypeDeclarationRector::class,
    ]);

    $rectorConfig->importNames();
    $rectorConfig->parallel();
};
