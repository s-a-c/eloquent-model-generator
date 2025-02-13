<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1739445718,
	'meta' => array (
  'cacheVersion' => 'v12-linesToIgnore',
  'phpstanVersion' => '1.12.17',
  'phpVersion' => 80403,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional, Illuminate\\Http\\Request, Illuminate\\Support\\Optional, SAC\\EloquentModelGenerator\\ValueObjects\\Column, SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition], earlyTerminatingFunctionCalls: [abort, dd, abort, dd, dump, exit, die], excludePaths: {analyseAndScan: [*.blade.php, /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/tests/tmp/*, /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/tests/*, /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/build/*, /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/*, *.blade.php], analyse: []}, mixinExcludeClasses: [Eloquent, Eloquent, Illuminate\\Database\\Eloquent\\Model], bootstrapFiles: [/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/larastan/larastan/bootstrap.php], checkOctaneCompatibility: true, noEnvCallsOutsideOfConfig: true, noModelMake: false, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [all, get, toArray], noUnnecessaryCollectionCallExcept: [], squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: true, disableSchemaScan: true, viewDirectories: [], checkModelProperties: true, checkPhpDocMissingReturn: true, checkUnusedViews: false, checkModelAppends: true, level: 8, paths: [/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src], treatPhpDocTypesAsCertain: true, checkMissingIterableValueType: true, checkGenericClassInNonGenericObjectType: true, checkMissingCallableSignature: true, tmpDir: /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/build/phpstan, checkUnionTypes: true, checkImplicitMixed: true, checkBenevolentUnionTypes: true, rememberPossiblyImpureFunctionValues: false, checkPhpDocMethodSignatures: true, checkExplicitMixed: true, inferPrivatePropertyTypeFromConstructor: true, reportMaybesInMethodSignatures: true, reportStaticMethodSignatures: true}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: [{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\Extension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Types\\RelationDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelRelationsDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFindExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\BuilderModelFindExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterRejectDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Types\\RelationParserHelper, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @currentPhpVersionSimpleDirectParser, reflectionProvider: @reflectionProvider}}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\PhpMyAdminDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}]}',
  'analysedPaths' => 
  array (
    0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/composer.lock' => '510b37617a765062de6ef6e0580f1b29915f1394',
  ),
  'composerInstalled' => 
  array (
    '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'brianium/paratest' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => 'cf16fcbb9b8107a7df6b97e497fc91e819774d8b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../brianium/paratest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'brick/math' => 
        array (
          'pretty_version' => '0.12.1',
          'version' => '0.12.1.0',
          'reference' => 'f510c0a40911935b77b86859eb5223d58d660df1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '99f76ffa36cce3b70a4a6abce41dba15ca2e84cb',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'clue/ndjson-react' => 
        array (
          'pretty_version' => 'v1.3.0',
          'version' => '1.3.0.0',
          'reference' => '392dc165fce93b5bb5c637b67e59619223c931b0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../clue/ndjson-react',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'colinodell/json5' => 
        array (
          'pretty_version' => 'v2.3.0',
          'version' => '2.3.0.0',
          'reference' => '15b063f8cb5e6deb15f0cd39123264ec0d19c710',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../colinodell/json5',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/pcre' => 
        array (
          'pretty_version' => '3.3.2',
          'version' => '3.3.2.0',
          'reference' => 'b2bed4734f0cc156ee1fe9c0da2550420d99a21e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/./pcre',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/semver' => 
        array (
          'pretty_version' => '3.4.3',
          'version' => '3.4.3.0',
          'reference' => '4313d26ada5e0c4edfbd1dc481a92ff7bff91f12',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/./semver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/xdebug-handler' => 
        array (
          'pretty_version' => '3.0.5',
          'version' => '3.0.5.0',
          'reference' => '6c1925561632e83d60a44492e0b344cf48ab85ef',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/./xdebug-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/deprecations' => 
        array (
          'pretty_version' => '1.1.4',
          'version' => '1.1.4.0',
          'reference' => '31610dbb31faa98e6b5447b62340826f54fbc4e9',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../doctrine/deprecations',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.0.10',
          'version' => '2.0.10.0',
          'reference' => '5817d0659c5b50c9b950feb9af7b9668e2c436bc',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.4.0',
          'version' => '3.4.0.0',
          'reference' => '8c784d071debd117328803d86b2097615b457500',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.3',
          'version' => '4.0.3.0',
          'reference' => 'b115554301161fa21467629f1e1391c1936de517',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'evenement/evenement' => 
        array (
          'pretty_version' => 'v3.0.2',
          'version' => '3.0.2.0',
          'reference' => '0a16b0d71ab13284339abb99d9d2bd813640efbc',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../evenement/evenement',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fakerphp/faker' => 
        array (
          'pretty_version' => 'v1.24.1',
          'version' => '1.24.1.0',
          'reference' => 'e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../fakerphp/faker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fidry/cpu-core-counter' => 
        array (
          'pretty_version' => '1.2.0',
          'version' => '1.2.0.0',
          'reference' => '8520451a140d3f46ac33042715115e290cf5785f',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../fidry/cpu-core-counter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.17.0',
          'version' => '2.17.0.0',
          'reference' => '075bc0c26631110584175de6523ab3f1652eb28e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'friendsofphp/php-cs-fixer' => 
        array (
          'pretty_version' => 'v3.68.5',
          'version' => '3.68.5.0',
          'reference' => '7bedb718b633355272428c60736dc97fb96daf27',
          'type' => 'application',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../friendsofphp/php-cs-fixer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.3.0',
          'version' => '1.3.0.0',
          'reference' => '3d158f36e7875e2f040f37bc0573956240a5a38b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.3',
          'version' => '1.1.3.0',
          'reference' => '3ba905c11371512af9d9bdd27d99b782216b6945',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.4',
          'version' => '1.0.4.0',
          'reference' => '30e286560c137526eccd4ce21b2de477ab0676d2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.0.1',
          'version' => '2.0.1.0',
          'reference' => '8c3d0a3f6af734494ad8f6fbbee0ba92422859f3',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v10.48.28',
          ),
        ),
        'infection/abstract-testframework-adapter' => 
        array (
          'pretty_version' => '0.5.0',
          'version' => '0.5.0.0',
          'reference' => '18925e20d15d1a5995bb85c9dc09e8751e1e069b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../infection/abstract-testframework-adapter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'infection/extension-installer' => 
        array (
          'pretty_version' => '0.1.2',
          'version' => '0.1.2.0',
          'reference' => '9b351d2910b9a23ab4815542e93d541e0ca0cdcf',
          'type' => 'composer-plugin',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../infection/extension-installer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'infection/include-interceptor' => 
        array (
          'pretty_version' => '0.2.5',
          'version' => '0.2.5.0',
          'reference' => '0cc76d95a79d9832d74e74492b0a30139904bdf7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../infection/include-interceptor',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'infection/infection' => 
        array (
          'pretty_version' => '0.27.11',
          'version' => '0.27.11.0',
          'reference' => '6d55979c457eef2a5d0d80446c67ca533f201961',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../infection/infection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'jean85/pretty-package-versions' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '3c4e5f62ba8d7de1734312e4fff32f67a8daaf10',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../jean85/pretty-package-versions',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'justinrainbow/json-schema' => 
        array (
          'pretty_version' => '5.3.0',
          'version' => '5.3.0.0',
          'reference' => 'feb2ca6dd1cebdaf1ed60a4c8de2e53ce11c4fd8',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../justinrainbow/json-schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'larastan/larastan' => 
        array (
          'pretty_version' => 'v2.9.14',
          'version' => '2.9.14.0',
          'reference' => '78f7f8da613e54edb2ab4afa5bede045228fb843',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v10.48.28',
          'version' => '10.48.28.0',
          'reference' => 'e714e7e0c1ae51bf747e3df5b10fa60c54e3e0e1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.1.25',
          'version' => '0.1.25.0',
          'reference' => '7b4029a84c37cb2725fc7f011586e2997040bc95',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v1.3.7',
          'version' => '1.3.7.0',
          'reference' => '4f48ade902b94323ca3be7646db16209ec76be3d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.10.1',
          'version' => '2.10.1.0',
          'reference' => '22177cc71807d38f2810c6204d8f7183d88a57d3',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.6.1',
          'version' => '2.6.1.0',
          'reference' => 'd990688c91cedfb69753ffc2512727ec646df2ad',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.29.1',
          'version' => '3.29.1.0',
          'reference' => 'edc1bb7c86fab0776c3287dbd19b5fa278347319',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.29.0',
          'version' => '3.29.0.0',
          'reference' => 'e0e8d52ce4b2ed154148453d321e97c8e931bd27',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.16.0',
          'version' => '1.16.0.0',
          'reference' => '2d6702ff215bf922936ccc1ad31007edc76451b9',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.8.1',
          'version' => '3.8.1.0',
          'reference' => 'aef6ee73a77a66e404dd6540934a9ef1b3c855b4',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.13.0',
          'version' => '1.13.0.0',
          'reference' => '024473a478be9df5fdaca2c793f2232fe788e414',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '2.73.0',
          'version' => '2.73.0.0',
          'reference' => '9228ce90e1035ff2f0db84b40ec2e023ed802075',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.2',
          'version' => '1.3.2.0',
          'reference' => 'da801d52f0354f70a638673c4a0f04e16529431d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.0.5',
          'version' => '4.0.5.0',
          'reference' => '736c567e257dbe0fcf6ce81b4d6dbe05c6899f96',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v4.19.4',
          'version' => '4.19.4.0',
          'reference' => '715f4d25e225bc47b293a8b997fe6ce99bf987d2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v7.11.0',
          'version' => '7.11.0.0',
          'reference' => '994ea93df5d4132f69d3f1bd74730509df6e8a05',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v1.17.0',
          'version' => '1.17.0.0',
          'reference' => '5369ef84d8142c1d87e4ec278711d4ece3cbf301',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ondram/ci-detector' => 
        array (
          'pretty_version' => '4.2.0',
          'version' => '4.2.0.0',
          'reference' => '8b0223b5ed235fd377c75fdd1bfcad05c0f168b8',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../ondram/ci-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/canvas' => 
        array (
          'pretty_version' => 'v8.12.0',
          'version' => '8.12.0.0',
          'reference' => '76385dfcf96efae5f8533a4d522d14c3c946ac5a',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/canvas',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/canvas-core' => 
        array (
          'pretty_version' => 'v8.10.2',
          'version' => '8.10.2.0',
          'reference' => '3af8fb6b1ebd85903ba5d0e6df1c81aedacfedfc',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/canvas-core',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/testbench' => 
        array (
          'pretty_version' => 'v8.31.0',
          'version' => '8.31.0.0',
          'reference' => 'a8d3491e47b88c3a0dc9f97e33986a88684fed87',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/testbench',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/testbench-core' => 
        array (
          'pretty_version' => 'v8.32.3',
          'version' => '8.32.3.0',
          'reference' => '8d7a3e360213ab3d41b874f94b107036223ce429',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/testbench-core',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/workbench' => 
        array (
          'pretty_version' => 'v8.17.1',
          'version' => '8.17.1.0',
          'reference' => '436ff6c904d1b9d324c382b94f477edf1ab0f222',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/workbench',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pdepend/pdepend' => 
        array (
          'pretty_version' => '2.16.2',
          'version' => '2.16.2.0',
          'reference' => 'f942b208dc2a0868454d01b29f0c75bbcfc6ed58',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pdepend/pdepend',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest' => 
        array (
          'pretty_version' => 'v2.36.0',
          'version' => '2.36.0.0',
          'reference' => 'f8c88bd14dc1772bfaf02169afb601ecdf2724cd',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'e05d2859e08c2567ee38ce8b005d044e72648c0b',
          'type' => 'composer-plugin',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest-plugin',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-arch' => 
        array (
          'pretty_version' => 'v2.7.0',
          'version' => '2.7.0.0',
          'reference' => 'd23b2d7498475354522c3818c42ef355dca3fcda',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest-plugin-arch',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-laravel' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => '53df51169a7f9595e06839cce638c73e59ace5e8',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest-plugin-laravel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpat/phpat' => 
        array (
          'pretty_version' => '0.10.20',
          'version' => '0.10.20.0',
          'reference' => '55154db9c36d56aaae5de4bcddb7f5a1202f1910',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpat/phpat',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-common' => 
        array (
          'pretty_version' => '2.2.0',
          'version' => '2.2.0.0',
          'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpdocumentor/reflection-common',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-docblock' => 
        array (
          'pretty_version' => '5.6.1',
          'version' => '5.6.1.0',
          'reference' => 'e5e784149a09bd69d9a5e3b01c5cbd2e2bd653d8',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpdocumentor/reflection-docblock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/type-resolver' => 
        array (
          'pretty_version' => '1.10.0',
          'version' => '1.10.0.0',
          'reference' => '679e3ce485b99e84c775d28e2e96fade9a7fb50a',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpdocumentor/type-resolver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phploc/phploc' => 
        array (
          'pretty_version' => 'dev-main',
          'version' => 'dev-main',
          'reference' => 'f67d57cced9656b80c3f836e962333d91c76b951',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phploc/phploc',
          'aliases' => 
          array (
            0 => '8.0.x-dev',
          ),
          'dev_requirement' => true,
        ),
        'phpmd/phpmd' => 
        array (
          'pretty_version' => '2.15.0',
          'version' => '2.15.0.0',
          'reference' => '74a1f56e33afad4128b886e334093e98e1b5e7c0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpmd/phpmd',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpmyadmin/sql-parser' => 
        array (
          'pretty_version' => '5.10.3',
          'version' => '5.10.3.0',
          'reference' => '5346664973d10cf1abff20837fb1183f3c11a055',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpmyadmin/sql-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.3',
          'version' => '1.9.3.0',
          'reference' => 'e3fac8b24f56113f7cb96af14958c0dd16330f54',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpdoc-parser' => 
        array (
          'pretty_version' => '2.0.0',
          'version' => '2.0.0.0',
          'reference' => 'c00d78fb6b29658347f9d37ebe104bffadf36299',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpstan/phpdoc-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '1.12.17',
          'version' => '1.12.17.0',
          'reference' => '7027b3b0270bf392de0cfba12825979768d728bf',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '10.1.16',
          'version' => '10.1.16.0',
          'reference' => '7e308268858ed6baedc8704a304727d20bc07c77',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '4.1.0',
          'version' => '4.1.0.0',
          'reference' => 'a95037b6d9e608ba092da1b23931e537cadc3c3c',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '4.0.0',
          'version' => '4.0.0.0',
          'reference' => 'f5e568ba02fa5ba0ddd0f618391d5a9ea50b06d7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '0c7b06ff49e3d5072f057eb1fa59258bf287a748',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '6.0.0',
          'version' => '6.0.0.0',
          'reference' => 'e2a2d67966e740530f4a3343fe2e030ffdc1161d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '10.5.36',
          'version' => '10.5.36.0',
          'reference' => 'aa0a8ce701ea7ee314b0dfaa8970dc94f3f8c870',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.1|2.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'f16e1d5863e37f8d8c2a01719f5b34baa2b714d3',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.7',
          'version' => '0.12.7.0',
          'reference' => 'd73fa3c74918ef4522bb8a3bf9cab39161c4b57c',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.0.0',
          'version' => '2.0.0.0',
          'reference' => 'a4b48764bfbb8f3a6a4d1aeb1a35bb5e9ecac4a5',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.7.6',
          'version' => '4.7.6.0',
          'reference' => '91039bc1faa45ba123c4328958e620d382ec7088',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'react/cache' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => 'd47c472b64aa5608225f47965a484b75c7817d5b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../react/cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/child-process' => 
        array (
          'pretty_version' => 'v0.6.6',
          'version' => '0.6.6.0',
          'reference' => '1721e2b93d89b745664353b9cfc8f155ba8a6159',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../react/child-process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/dns' => 
        array (
          'pretty_version' => 'v1.13.0',
          'version' => '1.13.0.0',
          'reference' => 'eb8ae001b5a455665c89c1df97f6fb682f8fb0f5',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../react/dns',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/event-loop' => 
        array (
          'pretty_version' => 'v1.5.0',
          'version' => '1.5.0.0',
          'reference' => 'bbe0bd8c51ffc05ee43f1729087ed3bdf7d53354',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../react/event-loop',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/promise' => 
        array (
          'pretty_version' => 'v3.2.0',
          'version' => '3.2.0.0',
          'reference' => '8a164643313c71354582dc850b42b33fa12a4b63',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../react/promise',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/socket' => 
        array (
          'pretty_version' => 'v1.16.0',
          'version' => '1.16.0.0',
          'reference' => '23e4ff33ea3e160d2d1f59a0e6050e4b0fb0eac1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../react/socket',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/stream' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '1e5b0acb8fe55143b5b426817155190eb6f5b18d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../react/stream',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '4.7.6',
          ),
        ),
        'sanmai/later' => 
        array (
          'pretty_version' => '0.1.4',
          'version' => '0.1.4.0',
          'reference' => 'e24c4304a4b1349c2a83151a692cec0c10579f60',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sanmai/later',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sanmai/pipeline' => 
        array (
          'pretty_version' => '6.12',
          'version' => '6.12.0.0',
          'reference' => 'ad7dbc3f773eeafb90d5459522fbd8f188532e25',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sanmai/pipeline',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '2.0.1',
          'version' => '2.0.1.0',
          'reference' => 'c34583b87e7b7a8055bf6c450c2c77ce32a24084',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '2.0.0',
          'version' => '2.0.0.0',
          'reference' => 'a81fee9eef0b7a76af11d121767abc44c104e503',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '5e3a687f7d8ae33fb362c5c0743794bbb2420a1d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '5.0.3',
          'version' => '5.0.3.0',
          'reference' => 'a18251eb0b7a2dcd2f7aa3d6078b18545ef0558e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '68ff824baeae169ec9f2137158ee529584553799',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '5.1.1',
          'version' => '5.1.1.0',
          'reference' => 'c41e007b4b62af48218231d6c2275e4c9b975b2e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '6.1.0',
          'version' => '6.1.0.0',
          'reference' => '8074dbcd93529b357029f5cc5058fd3e43666984',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '5.1.2',
          'version' => '5.1.2.0',
          'reference' => '955288482d97c19a372d3f31006ab3f37da47adf',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => '987bafff24ecc4c9ac418cab1145b96dd6e9cbd9',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => '856e7f6a75a84e339195d48c556f23be2ebf75d0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '5.0.0',
          'version' => '5.0.0.0',
          'reference' => '202d0e344a580d7f7d04b3fafce6933e59dae906',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '24ed13d98130f0e7122df55d06c5c4942a577957',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '5.0.0',
          'version' => '5.0.0.0',
          'reference' => '05909fb5bc7df4c52992396d0116aed689f93712',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '4.0.0',
          'version' => '4.0.0.0',
          'reference' => '462699a16464c3944eefc02ebdd77882bd3925bf',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'c51fa83a5d8f43f1402e3f32a005e6262244ef17',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/config' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => '7716594aaae91d9141be080240172a92ecca4d44',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v6.4.17',
          'version' => '6.4.17.0',
          'reference' => '799445db3f15768ecc382ac5699e6da0520a0a04',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => '601a5ce9aaad7bf10797e3663faefce9e26c24e2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/dependency-injection' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => '1d321c4bc3fe926fd4c38999a4c9af4f5d61ddfc',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/dependency-injection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.5.1',
          'version' => '3.5.1.0',
          'reference' => '74c71c939a79f7d5bf3c1ce9f5ea37ba0114c6f6',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => 'e8d3b5b1975e67812a54388b1ba8e9ec28eb770e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => '910c5db85a5356d0fea57680defec4e99eb9c8c1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.5.1',
          'version' => '3.5.1.0',
          'reference' => '7642f5e970b672283b7823222ae8ef8bbc160b9f',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/filesystem' => 
        array (
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => 'b8dce482de9d7c9fe2891155035a7248ab5c7fdb',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/filesystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v6.4.17',
          'version' => '6.4.17.0',
          'reference' => '1d0e8266248c5d9ab6a87e3789e6dc482af3c9c7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => 'd0492d6217e5ab48f51fca76f64cf8e78919d0db',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => 'fca7197bfe9e99dfae7fb1ad3f7f5bd9ef80e1b7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => 'e93a6ae2767d7f7578c2b7961d9d8e27580b2b11',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => '917d77981eb1ea963608d5cda4d9c0cf72eaa68e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/options-resolver' => 
        array (
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => '7da8fbac9dcfef75ffc212235d76b2754ce0cf50',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/options-resolver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => 'a3cc8b044a6ea513310cbd48ef7333b384945638',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => 'b9123926e3b7bc2f98c02ad54f6a4b02b91a8abe',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => 'c36586dcf89a12315939e00ec9b4474adcb1d773',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => '3833d7255cc303546435cb650316bff708a1c75c',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => '85181ba99b2345b0ef10ce42ecac37612d9fd341',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => '60328e362d4c2c802a54fcbf04f9d3fb892b4cf8',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php81' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => '4a4cfc2d253c21a5ad0e53071df248ed48c6ce5c',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-php81',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => '2fb86d65e2d424369ad2905e83b236a8805ba491',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => '21533be36c24be3f4b1669c4725c7d1d2bab4ae2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v6.4.15',
          'version' => '6.4.15.0',
          'reference' => '3cb242f059c14ae08591c5c4087d1fe443564392',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => 'e9bfc94953019089acdfb9be51c1b9142c4afa68',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.5.1',
          'version' => '3.5.1.0',
          'reference' => 'e53260aabf78fb3d63f8d79d69ece59f80d5eda0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.1|2.0|3.0',
          ),
        ),
        'symfony/stopwatch' => 
        array (
          'pretty_version' => 'v7.2.2',
          'version' => '7.2.2.0',
          'reference' => 'e46690d5b9d7164a6d061cab1e8d46141b9f49df',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/stopwatch',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => '446e0d146f991dde3e73f45f2c97a9faad773c82',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v6.4.13',
          'version' => '6.4.13.0',
          'reference' => 'bee9bfabfa8b4045a66bf82520e492cddbaffa66',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.5.1',
          'version' => '3.5.1.0',
          'reference' => '4667ff3bd513750603a09c8dedbea942487fb07c',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v6.4.13',
          'version' => '6.4.13.0',
          'reference' => '18eb207f0436a993fffbdd811b5b8fa35fa5e007',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => '4ad10cf8b020e77ba665305bb7804389884b4837',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-exporter' => 
        array (
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => '1a6a89f95a46af0f142874c9d650a6358d13070d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/var-exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v6.4.18',
          'version' => '6.4.18.0',
          'reference' => 'bf598c9d9bb4a22f495a4e26e4c4fce2f8ecefc5',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'ta-tikoma/phpunit-architecture-test' => 
        array (
          'pretty_version' => '0.8.4',
          'version' => '0.8.4.0',
          'reference' => '89f0dea1cb0f0d5744d3ec1764a286af5e006636',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../ta-tikoma/phpunit-architecture-test',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'thecodingmachine/safe' => 
        array (
          'pretty_version' => 'v2.5.0',
          'version' => '2.5.0.0',
          'reference' => '3115ecd6b4391662b4931daac4eba6b07a2ac1f0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../thecodingmachine/safe',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.2.3',
          'version' => '1.2.3.0',
          'reference' => '737eda637ed5e28c3413cb1ebe8bb52cbf1ca7a2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.3.0',
          'version' => '2.3.0.0',
          'reference' => '0d72ac1c00084279c1816675284073c5a337c20d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.1',
          'version' => '5.6.1.0',
          'reference' => 'a59a13791077fe3d44f90e7133eb68e7d22eaff2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.0.3',
          'version' => '2.0.3.0',
          'reference' => 'b1d923f88091c6bf09699efcd7c8a1b1bfd7351d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'webmozart/assert' => 
        array (
          'pretty_version' => '1.11.0',
          'version' => '1.11.0.0',
          'reference' => '11cb2199493b2f8a3b53e7f19068fc6aac760991',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../webmozart/assert',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/larastan/larastan/bootstrap.php' => '28392079817075879815f110287690e80398fe5e',
    'phar:///Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute.php' => 'eaf9127f074e9c7ebc65043ec4050f9fed60c2bb',
    'phar:///Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionAttribute.php' => '0b4b78277eb6545955d2ce5e09bff28f1f8052c8',
    'phar:///Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionIntersectionType.php' => 'a3e6299b87ee5d407dae7651758edfa11a74cb11',
    'phar:///Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php' => '1b349aa997a834faeafe05fa21bc31cae22bf2e2',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'FFI',
    2 => 'PDO',
    3 => 'Phar',
    4 => 'Reflection',
    5 => 'SPL',
    6 => 'SimpleXML',
    7 => 'Zend OPcache',
    8 => 'bcmath',
    9 => 'bz2',
    10 => 'calendar',
    11 => 'ctype',
    12 => 'curl',
    13 => 'date',
    14 => 'dba',
    15 => 'dom',
    16 => 'exif',
    17 => 'fileinfo',
    18 => 'filter',
    19 => 'ftp',
    20 => 'gd',
    21 => 'gettext',
    22 => 'gmp',
    23 => 'hash',
    24 => 'herd',
    25 => 'iconv',
    26 => 'igbinary',
    27 => 'imagick',
    28 => 'imap',
    29 => 'intl',
    30 => 'json',
    31 => 'ldap',
    32 => 'libxml',
    33 => 'mbstring',
    34 => 'mongodb',
    35 => 'mysqli',
    36 => 'mysqlnd',
    37 => 'openssl',
    38 => 'pcntl',
    39 => 'pcre',
    40 => 'pdo_mysql',
    41 => 'pdo_pgsql',
    42 => 'pdo_sqlite',
    43 => 'pgsql',
    44 => 'posix',
    45 => 'random',
    46 => 'readline',
    47 => 'redis',
    48 => 'session',
    49 => 'shmop',
    50 => 'soap',
    51 => 'sockets',
    52 => 'sodium',
    53 => 'sqlite3',
    54 => 'standard',
    55 => 'sysvmsg',
    56 => 'sysvsem',
    57 => 'sysvshm',
    58 => 'tokenizer',
    59 => 'xml',
    60 => 'xmlreader',
    61 => 'xmlwriter',
    62 => 'xsl',
    63 => 'zip',
    64 => 'zlib',
    65 => 'zstd',
  ),
  'stubFiles' => 
  array (
  ),
  'level' => '8',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'type\' on array{type: \'belongsTo\'|\'belongsToMany\'|\'hasMany\'|\'hasOne\'|\'morphMany\'|\'morphOne\'|\'morphTo\', model: string, foreignKey?: string, localKey?: string, table?: string, morphType?: string} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'line' => 164,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 164,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'model\' on array{type: \'belongsTo\'|\'belongsToMany\'|\'hasMany\'|\'hasOne\'|\'morphMany\'|\'morphOne\'|\'morphTo\', model: string, foreignKey?: string, localKey?: string, table?: string, morphType?: string} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'line' => 173,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 173,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $options of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService::generateModel() expects array{class_name?: string, namespace?: string, base_class?: class-string|null, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}, array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'line' => 108,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'traitFilePath' => NULL,
       'tip' => 'Offset \'base_class\' (class-string|null) does not accept type string.',
       'nodeLine' => 108,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $options of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService::generateModel() expects array{class_name?: string, namespace?: string, base_class?: class-string|null, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}, array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
       'line' => 37,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
       'traitFilePath' => NULL,
       'tip' => 'Offset \'base_class\' (class-string|null) does not accept type string.',
       'nodeLine' => 37,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $options of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService::generateModel() expects array{class_name?: string, namespace?: string, base_class?: class-string|null, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}, array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php',
       'traitFilePath' => NULL,
       'tip' => 'Offset \'base_class\' (class-string|null) does not accept type string.',
       'nodeLine' => 39,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Match arm is unreachable because previous comparison is always true.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php',
       'line' => 68,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\MatchExpressionNode',
       'identifier' => 'match.unreachable',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $schema of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService::generate() expects array{columns: array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, relations?: array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool}, array<string, mixed> given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #3 $subject of function preg_replace expects array|string, string|null given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'line' => 117,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 114,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\ModelGenerator::injectValidationTraits() should return string but returns string|null.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'line' => 120,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 120,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\ModelGenerator::injectValidationRules() has parameter $rules with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'line' => 130,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 130,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\ModelGenerator::injectValidationRules() should return string but returns string|null.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'line' => 149,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 149,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\ModelGenerator::injectValidationMessages() should return string but returns string|null.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'line' => 174,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 174,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Models\\BaseModel::$table (string) overriding property Illuminate\\Database\\Eloquent\\Model::$table should not have a native type.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'line' => 21,
       'canBeIgnored' => false,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 21,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'property.extraNativeType',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $hidden (array<int, string>) of method SAC\\EloquentModelGenerator\\Models\\BaseModel::setHidden() should be contravariant with parameter $hidden (array<string>) of method Illuminate\\Database\\Eloquent\\Model::setHidden()',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'line' => 172,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 172,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childParameterType',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Models\\GeneratedModel::$validationRules type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 153,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 153,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Models\\GeneratedModel::$relationships type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 174,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 174,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateArrays() is unused.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 210,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 7,
       'nodeType' => 'PHPStan\\Node\\ClassMethodsNode',
       'identifier' => 'method.unused',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Result of || is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 267,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 267,
       'nodeType' => 'PHPStan\\Node\\BooleanOrNode',
       'identifier' => 'booleanOr.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $rule of method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateSingleRule() expects array|string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 327,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 327,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateSingleRule() has parameter $rule with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 339,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 339,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Else branch is unreachable because previous condition is always true.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 350,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 347,
       'nodeType' => 'PhpParser\\Node\\Stmt\\If_',
       'identifier' => 'else.unreachable',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $definition[\'foreignKey\'] (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 457,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 457,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $definition[\'localKey\'] (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 462,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 462,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::getValidationRules() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 633,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 633,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::setValidationRules() has parameter $rules with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 712,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 712,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method make() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
       'line' => 22,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 22,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method make() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class SAC\\EloquentModelGenerator\\Models\\CachedModelTemplate not found.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 19,
       'nodeType' => 'PhpParser\\Node\\Expr\\ClassConstFetch',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class SAC\\EloquentModelGenerator\\Models\\ModelTemplate not found.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 19,
       'nodeType' => 'PhpParser\\Node\\Expr\\ClassConstFetch',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset \'db\' on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method connection() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getDriverName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $connection of class SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer constructor expects Illuminate\\Database\\ConnectionInterface, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 28,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 28,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $connection of class SAC\\EloquentModelGenerator\\Services\\Schema\\PostgreSQLSchemaAnalyzer constructor expects Illuminate\\Database\\ConnectionInterface, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $connection of class SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer constructor expects Illuminate\\Database\\ConnectionInterface, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $driver (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/SchemaParser.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\SchemaParser::parseColumns() should return array<string, array{type: string, cast?: string}> but returns array<string, array{type: string, cast: string|null}>.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/SchemaParser.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/SchemaParser.php',
       'traitFilePath' => NULL,
       'tip' => 'Offset \'cast\' (string) does not accept type string|null.',
       'nodeLine' => 39,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmark.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Benchmark::measure() has parameter $operation with no signature specified for callable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmark.php',
       'line' => 8,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmark.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 8,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.callable',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator::$configService is never read, only written.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/developing-extensions/always-read-written-properties',
       'nodeLine' => 12,
       'nodeType' => 'PHPStan\\Node\\ClassPropertiesNode',
       'identifier' => 'property.onlyWritten',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $className of class SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition constructor expects non-empty-string, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $namespace of class SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition constructor expects non-empty-string, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $baseClass of class SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition constructor expects class-string|null, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $table of class SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition constructor expects non-empty-string|null, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #4 $baseClass of method SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator::generateModelContent() expects string, class-string|null given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'line' => 53,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $baseClass of class SAC\\EloquentModelGenerator\\Models\\GeneratedModel constructor expects string, class-string|null given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'line' => 61,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 57,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $options (array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}) of method SAC\\EloquentModelGenerator\\Services\\ModelGenerator::generateModel() should be contravariant with parameter $options (array{class_name?: string, namespace?: string, base_class?: class-string|null, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}) of method SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService::generateModel()',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childParameterType',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'columns\' on array{columns: array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'line' => 27,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 27,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $columns of method SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory::createModelDefinition() expects array<string, array{type: string, nullable?: bool, unsigned?: bool, length?: int|null, total?: int|null, places?: int|null, allowed?: array<string>|null, autoIncrement?: bool, ...}>, non-empty-array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}> given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'line' => 33,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'Offset \'default\' (string|null) does not accept type mixed.',
       'nodeLine' => 31,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'relations\' on array{columns: non-empty-array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} on left side of ?? does not exist.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'line' => 34,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 34,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullCoalesce.offset',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $config (array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}) of method SAC\\EloquentModelGenerator\\Services\\ModelGenerator::generateBatch() should be contravariant with parameter $config (array{class_name?: string, namespace?: string, base_class?: class-string|null, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}) of method SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService::generateBatch()',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 46,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childParameterType',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'columns\' on array{columns: array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, relations?: array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 109,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 109,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'type\' on array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 116,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 116,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'nullable\' on array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...} on left side of ?? always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 125,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 125,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullCoalesce.offset',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $default of class SAC\\EloquentModelGenerator\\ValueObjects\\Column constructor expects string|null, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 127,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 120,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'type\' on array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 136,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 136,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $className of class SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition constructor expects non-empty-string, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 156,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 155,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $namespace of class SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition constructor expects non-empty-string, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 157,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 155,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $table of class SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition constructor expects non-empty-string|null, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 164,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 155,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Strict comparison using === between array<string> and null will always evaluate to false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 207,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 207,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Identical',
       'identifier' => 'identical.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'columns\' on array{columns: array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, relations?: array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 234,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 234,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $schema of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine::render() expects array{columns: array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>, relations?: array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool}, array{columns: array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, relations?: array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 266,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => '• Offset \'relations\' (array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>) does not accept type array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>: Offset \'type\' (non-empty-string) does not accept type string.
• Offset \'relations\' (array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>) does not accept type array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>: Array might not have offset \'model\'.
• Offset \'relations\' (array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>) does not accept type array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>: Offset \'model\' (class-string) does not accept type string.
• Offset \'relations\' (array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>) does not accept type array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>: Offset \'foreignKey\' (non-empty-string) does not accept type string.
• Offset \'relations\' (array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>) does not accept type array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>: Offset \'localKey\' (non-empty-string) does not accept type string.
• Offset \'relations\' (array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>) does not accept type array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>: Offset \'morphType\' (non-empty-string) does not accept type string.',
       'nodeLine' => 266,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $baseClass of class SAC\\EloquentModelGenerator\\Models\\GeneratedModel constructor expects string, class-string|null given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 275,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 271,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Negated boolean expression is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 297,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 297,
       'nodeType' => 'PhpParser\\Node\\Expr\\BooleanNot',
       'identifier' => 'booleanNot.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'columns\' on array{columns: array<string, array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}>, indexes?: array<string, array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, relations?: array<string, array{type: string, model?: string, foreignKey?: string, localKey?: string, morphType?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 297,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 297,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Result of || is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 297,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 297,
       'nodeType' => 'PHPStan\\Node\\BooleanOrNode',
       'identifier' => 'booleanOr.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Result of || is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 297,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 297,
       'nodeType' => 'PHPStan\\Node\\BooleanOrNode',
       'identifier' => 'booleanOr.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Negated boolean expression is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 302,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 302,
       'nodeType' => 'PhpParser\\Node\\Expr\\BooleanNot',
       'identifier' => 'booleanNot.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    17 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset \'type\' on array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...} in isset() always exists and is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 302,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 302,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.offset',
       'metadata' => 
      array (
      ),
    )),
    18 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Result of || is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 302,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 302,
       'nodeType' => 'PHPStan\\Node\\BooleanOrNode',
       'identifier' => 'booleanOr.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    19 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Result of || is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 302,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 302,
       'nodeType' => 'PHPStan\\Node\\BooleanOrNode',
       'identifier' => 'booleanOr.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
    20 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getNotnull() on an unknown class Doctrine\\DBAL\\Schema\\Column.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 375,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 375,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    21 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getDefault() on an unknown class Doctrine\\DBAL\\Schema\\Column.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 376,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 376,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    22 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getLength() on an unknown class Doctrine\\DBAL\\Schema\\Column.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 377,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 377,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    23 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getUnsigned() on an unknown class Doctrine\\DBAL\\Schema\\Column.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 378,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 378,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    24 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getAutoincrement() on an unknown class Doctrine\\DBAL\\Schema\\Column.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 379,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 379,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    25 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getComment() on an unknown class Doctrine\\DBAL\\Schema\\Column.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 380,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 380,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    26 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc tag @var above assignment does not specify variable name.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 383,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 383,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Expression',
       'identifier' => 'varTag.noVariable',
       'metadata' => 
      array (
      ),
    )),
    27 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService::analyzeColumn() should return array{type: non-empty-string, nullable: bool, default?: mixed, length?: int<1, max>|null, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...} but returns array{type: non-empty-string, nullable: bool, default?: mixed, length?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool, ...}|non-empty-string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 390,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Offset \'length\' (int<1, max>|null) does not accept type mixed.',
       'nodeLine' => 390,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine::$placeholders is never read, only written.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 119,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/developing-extensions/always-read-written-properties',
       'nodeLine' => 110,
       'nodeType' => 'PHPStan\\Node\\ClassPropertiesNode',
       'identifier' => 'property.onlyWritten',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $replacements of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine::replacePlaceholders() expects array<string, string>, array<string, string|null> given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 148,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 148,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine::getCasts() should return array<non-empty-string, non-empty-string> but returns array<mixed, mixed>.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 285,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 285,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 ...$arrays of function array_merge expects array, string given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 285,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 285,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine::addModelIndexes() has parameter $indexes with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 390,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 390,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc tag @param has invalid value (array<string, array{type: \'primary\'|\'unique\'|\'index\'|\'fulltext\'|\'spatial\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>} $indexes): Unexpected token "$indexes", expected \'>\' at offset 264',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 390,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 390,
       'nodeType' => 'PhpParser\\Node\\Stmt\\ClassMethod',
       'identifier' => 'phpDoc.parseError',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $name of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine::generateIndexMethod() expects string, (int|string) given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 394,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 394,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $index of method SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine::generateIndexMethod() expects array{type: \'fulltext\'|\'index\'|\'primary\'|\'spatial\'|\'unique\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 394,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 394,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ParallelModelGenerator::generateModels() has parameter $options with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 32,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 32,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ParallelModelGenerator::generateModels() has parameter $tables with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 32,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 32,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $table of method SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory::createModelDefinition() expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset mixed on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 42,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $columns of method SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory::createModelDefinition() expects array<string, array{type: string, nullable?: bool, unsigned?: bool, length?: int|null, total?: int|null, places?: int|null, allowed?: array<string>|null, autoIncrement?: bool, ...}>, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset mixed on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 43,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 43,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #3 $relations of method SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory::createModelDefinition() expects array<string, array{type: string, model?: string|null, foreignKey?: string|null, localKey?: string|null, morphType?: string|null}>, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 43,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method value() on parallel\\Future|null.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 50,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 50,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ParallelModelGenerator::generateModels() should return array<SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition> but returns array<int<0, max>, mixed>.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'line' => 53,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 53,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $config of class SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob constructor expects array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}, array<string, mixed> given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property Illuminate\\Bus\\Batch::$jobs.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 56,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ParallelModelGeneratorService::generateModels() should return array<SAC\\EloquentModelGenerator\\Models\\GeneratedModel> but returns array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 56,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $items of static method Illuminate\\Support\\Collection<(int|string),mixed>::make() expects Illuminate\\Contracts\\Support\\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 56,
       'nodeType' => 'PhpParser\\Node\\Expr\\StaticCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Unable to resolve the template type TMakeKey in call to method static method Illuminate\\Support\\Collection<(int|string),mixed>::make()',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type',
       'nodeLine' => 56,
       'nodeType' => 'PhpParser\\Node\\Expr\\StaticCall',
       'identifier' => 'argument.templateType',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Unable to resolve the template type TMakeValue in call to method static method Illuminate\\Support\\Collection<(int|string),mixed>::make()',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type',
       'nodeLine' => 56,
       'nodeType' => 'PhpParser\\Node\\Expr\\StaticCall',
       'identifier' => 'argument.templateType',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access property $result on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 57,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 57,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.nonObject',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Instantiated class SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition not found.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 79,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 79,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $definition of method SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator::generate() expects SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition, SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'line' => 91,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 91,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::$schemaManager has unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager as its type.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::$schemaManager has unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager as its type.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getSchemaBuilder().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 41,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::$schemaBuilder (Illuminate\\Database\\Schema\\Builder|null) does not accept mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 41,
       'nodeType' => 'PHPStan\\Node\\PropertyAssignNode',
       'identifier' => 'assign.propertyType',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getSchemaBuilder() should return Illuminate\\Database\\Schema\\Builder but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 44,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getSchemaManager() has invalid return type Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 52,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 52,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getSchemaManager() has invalid return type Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 52,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 52,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getDoctrineSchemaManager().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::$schemaManager (Doctrine\\DBAL\\Schema\\AbstractSchemaManager|null) does not accept mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PHPStan\\Node\\PropertyAssignNode',
       'identifier' => 'assign.propertyType',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getSchemaManager() should return Doctrine\\DBAL\\Schema\\AbstractSchemaManager but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 57,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 57,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getTablePrefix().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getTablePrefix() should return string but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method listTableNames() on an unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 81,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 81,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getTables() should return array<string> but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 81,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 81,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getForeignKeyDefinition() should return array{table: string, column: string} but returns array{table: mixed, column: mixed}.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 118,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => '• Offset \'table\' (string) does not accept type mixed.
• Offset \'column\' (string) does not accept type mixed.',
       'nodeLine' => 118,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::getRelationshipDefinition() should return array{type: string, foreignTable: string, foreignKey: string, localKey: string} but returns array{type: string, foreignTable: mixed, foreignKey: mixed, localKey: mixed}.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 142,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => '• Offset \'foreignTable\' (string) does not accept type mixed.
• Offset \'foreignKey\' (string) does not accept type mixed.
• Offset \'localKey\' (string) does not accept type mixed.',
       'nodeLine' => 142,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getDoctrineSchemaManager().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method listTableNames() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::getTables() should return array<string> but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getDoctrineSchemaManager().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method tablesExist() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::hasTable() should return bool but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getDoctrineSchemaManager().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method listTableDetails() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 61,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 61,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 63,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 63,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 63,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 63,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 65,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 65,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $name of class SAC\\EloquentModelGenerator\\ValueObjects\\Column constructor expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 65,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getType() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $type of class SAC\\EloquentModelGenerator\\ValueObjects\\Column constructor expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    17 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getPrimaryKey() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    18 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method hasPrimaryKey() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    19 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $haystack of function in_array expects array, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    20 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getAutoincrement() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 68,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 68,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    21 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $isAutoIncrement of class SAC\\EloquentModelGenerator\\ValueObjects\\Column constructor expects bool, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 68,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    22 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getNotnull() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 69,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 69,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    23 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 70,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 70,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    24 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $table of method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::isColumnUnique() expects Doctrine\\DBAL\\Schema\\Table, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 70,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 70,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    25 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $columnName of method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::isColumnUnique() expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 70,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 70,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    26 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getDefault() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 71,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 71,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    27 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $default of class SAC\\EloquentModelGenerator\\ValueObjects\\Column constructor expects string|null, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 71,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    28 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getLength() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 72,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 72,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    29 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $length of class SAC\\EloquentModelGenerator\\ValueObjects\\Column constructor expects int|null, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 72,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    30 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset \'enum_values\' on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    31 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    32 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getPlatformOptions() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    33 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getType() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    34 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $enumValues of class SAC\\EloquentModelGenerator\\ValueObjects\\Column constructor expects array<string>|null, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PhpParser\\Node\\Expr\\New_',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    35 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $table of method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::isColumnUnique() has invalid type Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 87,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 87,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    36 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $table of method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::isColumnUnique() has invalid type Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 87,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 87,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    37 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 88,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 88,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    38 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getIndexes() on an unknown class Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 88,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 88,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    39 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset 0 on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    40 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    41 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    42 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method isUnique() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    43 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $value of function count expects array|Countable, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    44 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::getTypeMap() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 99,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 99,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    45 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::getCastType() should return string but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 143,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 143,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    46 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer::getCastType() calls parent::getCastType() but SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer does not extend any class.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'line' => 147,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 147,
       'nodeType' => 'PhpParser\\Node\\Expr\\StaticCall',
       'identifier' => 'class.noParent',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method listTableDetails() on an unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 44,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 46,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 46,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 47,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 47,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 48,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 48,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getType() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 48,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 48,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $databaseType of method SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer::mapColumnType() expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 48,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 48,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getNotnull() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getDefault() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 50,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 50,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getPrimaryKey() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getPrimaryKey() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $haystack of function in_array expects array, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 55,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getIndexes() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    17 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    18 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    19 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method isUnique() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    20 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $haystack of function in_array expects array, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    21 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 61,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 61,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    22 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    23 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getType() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    24 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $haystack of function str_ends_with expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    25 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    26 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\PostgreSQLSchemaAnalyzer::analyzeColumns() should return array<string, array{type: string, nullable: bool, primary?: bool, unique?: bool, index?: bool, foreign?: array{table: string, column: string}, default?: mixed}> but returns array<array{default: mixed, nullable: bool, primary?: true, type: string, unique?: true}>.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 71,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 71,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    27 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method listTableForeignKeys() on an unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 83,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 83,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    28 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 85,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 85,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    29 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getForeignTableName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 87,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 87,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    30 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset 0 on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 88,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 88,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    31 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getForeignColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 88,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 88,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    32 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset 0 on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    33 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getLocalColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    34 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method listTableForeignKeys() on an unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 154,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 154,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    35 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $value of function count expects array|Countable, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'line' => 157,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 157,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getDoctrineSchemaManager().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 26,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method listTableNames() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 26,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::getTables() should return array<string> but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 26,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyze() should be covariant with return type (array{columns: array<string, array{type: string, nullable: bool, primary?: bool, unique?: bool, index?: bool, foreign?: array{table: string, column: string}, default?: mixed}>, relationships: array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}>}) of method SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer::analyze()',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyze() should be covariant with return type (array{columns: array<string, array{type: string, nullable: bool, primary?: bool, unique?: bool, index?: bool, foreign?: array{table: string, column: string}, default?: mixed}>, relationships: array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}>}) of method SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer::analyze()',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method listTableDetails() on an unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 46,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method listTableForeignKeys() on an unknown class Doctrine\\DBAL\\Schema\\AbstractSchemaManager.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 47,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 47,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $table of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyzeColumns() expects Doctrine\\DBAL\\Schema\\Table, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $foreignKeys of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyzeRelationships() expects array<Doctrine\\DBAL\\Schema\\ForeignKeyConstraint>, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 50,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 50,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getDoctrineSchemaManager().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method tablesExist() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::hasTable() should return bool but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $table of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyzeColumns() has invalid type Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 133,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 133,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $table of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyzeColumns() has invalid type Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 133,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 133,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getPrimaryKey() on an unknown class Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 135,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 135,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getIndexes() on an unknown class Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 136,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 136,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 138,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 138,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    17 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getColumns() on an unknown class Doctrine\\DBAL\\Schema\\Table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 138,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 138,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    18 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 139,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 139,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    19 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getName() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 141,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 141,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    20 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getType() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 141,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 141,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    21 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $type of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::mapColumnType() expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 141,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 141,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    22 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getNotnull() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 142,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 142,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    23 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getDefault() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 143,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 143,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    24 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 144,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 144,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    25 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $haystack of function in_array expects array, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 144,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 144,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    26 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getAutoincrement() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 146,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 146,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    27 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 150,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 150,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    28 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset 0 on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 151,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 151,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    29 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 151,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 151,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    30 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method getColumns() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 151,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 151,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    31 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot call method isUnique() on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 151,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 151,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.nonObject',
       'metadata' => 
      array (
      ),
    )),
    32 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $value of function count expects array|Countable, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 151,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 151,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    33 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyzeColumns() should return array<string, array<string, mixed>> but returns array<array<string, mixed>>.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 158,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 158,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    34 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter $foreignKeys of method SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer::analyzeRelationships() has invalid type Doctrine\\DBAL\\Schema\\ForeignKeyConstraint.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 166,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 166,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    35 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getForeignTableName() on an unknown class Doctrine\\DBAL\\Schema\\ForeignKeyConstraint.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 172,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 172,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    36 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getForeignColumns() on an unknown class Doctrine\\DBAL\\Schema\\ForeignKeyConstraint.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 173,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 173,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
    37 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to method getLocalColumns() on an unknown class Doctrine\\DBAL\\Schema\\ForeignKeyConstraint.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'line' => 174,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 174,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateRules() has parameter $schema with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 15,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 15,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateRules() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 15,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 15,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $column of method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateColumnRules() expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $definition of method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateColumnRules() expects array, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #3 $tableName of method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateColumnRules() expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateRules() should return array<string, array|string> but returns array<array|string>.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateColumnRules() has parameter $definition with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 41,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateColumnRules() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 41,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $definition[\'length\'] (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 56,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $string of function explode expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 68,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 68,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::getTypeRules() has parameter $definition with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 81,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 81,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::getTypeRules() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 81,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 81,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $definition[\'scale\'] (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 102,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 102,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $array of function implode expects array<string>, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 122,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 122,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $array of function implode expects array|null, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 122,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 122,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateMessages() has parameter $schema with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 149,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 149,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    17 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 152,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 152,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    18 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset \'messages\' on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 158,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 158,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    19 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Argument of an invalid type mixed supplied for foreach, only iterables are supported.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 159,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 159,
       'nodeType' => 'PHPStan\\Node\\InForeachNode',
       'identifier' => 'foreach.nonIterable',
       'metadata' => 
      array (
      ),
    )),
    20 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset non-falsy-string on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 160,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 160,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    21 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $column (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 160,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 160,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    22 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $rule (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 160,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 160,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    23 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $value of static method Illuminate\\Support\\Str::title() expects string, (array<int, string>|string) given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 166,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 166,
       'nodeType' => 'PhpParser\\Node\\Expr\\StaticCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    24 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #3 $subject of function str_replace expects array|string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 166,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 166,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    25 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset \'nullable\' on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 168,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 168,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    26 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset non-falsy-string on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 169,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 169,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    27 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $column (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 169,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 169,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    28 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset \'unique\' on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 172,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 172,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    29 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot access offset non-falsy-string on mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 173,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 173,
       'nodeType' => 'PhpParser\\Node\\Expr\\ArrayDimFetch',
       'identifier' => 'offsetAccess.nonOffsetAccessible',
       'metadata' => 
      array (
      ),
    )),
    30 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $column (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 173,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 173,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    31 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $column of method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::addTypeSpecificMessages() expects string, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 177,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 177,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    32 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #4 $definition of method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::addTypeSpecificMessages() expects array, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 177,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 177,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    33 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::generateMessages() should return array<string, string> but returns mixed.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 180,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 180,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    34 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::addTypeSpecificMessages() has parameter $definition with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 191,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 191,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    35 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator::addTypeSpecificMessages() has parameter $messages with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 191,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 191,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    36 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $definition[\'scale\'] (mixed) of encapsed string cannot be cast to string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 205,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 205,
       'nodeType' => 'PhpParser\\Node\\Scalar\\Encapsed',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
    )),
    37 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $array of function implode expects array<string>, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 231,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 231,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    38 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $array of function implode expects array|null, mixed given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'line' => 231,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 231,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Support\\Builders\\ModelBuilder::$configService is never read, only written.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/developing-extensions/always-read-written-properties',
       'nodeLine' => 8,
       'nodeType' => 'PHPStan\\Node\\ClassPropertiesNode',
       'identifier' => 'property.onlyWritten',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Support\\Builders\\ModelBuilder::build() has parameter $schema with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc tag @var above assignment does not specify variable name.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'line' => 158,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 158,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Expression',
       'identifier' => 'varTag.noVariable',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to private property SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition::$table.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
       'line' => 85,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 85,
       'nodeType' => 'PHPStan\\Node\\PropertyAssignNode',
       'identifier' => 'property.private',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition::$table (non-empty-string) does not accept string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
       'line' => 85,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 85,
       'nodeType' => 'PHPStan\\Node\\PropertyAssignNode',
       'identifier' => 'assign.propertyType',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Ternary operator condition is always false.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 55,
       'nodeType' => 'PhpParser\\Node\\Expr\\Ternary',
       'identifier' => 'ternary.alwaysFalse',
       'metadata' => 
      array (
      ),
    )),
  ),
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
); },
	'linesToIgnore' => array (
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
); },
	'dependencies' => array (
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Collections/ModelCollection.php' => 
  array (
    'fileHash' => '5daf8f61faa467dce934ad6268cbce8504c2552e',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php' => 
  array (
    'fileHash' => '9258f4ee339bcc39ddff89ee9609ad923232f8d2',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/eloquent-model-generator.php' => 
  array (
    'fileHash' => '0a5cb9a2a50544bed58290a6186cecaa42e44ffd',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php' => 
  array (
    'fileHash' => '0c3d1249832d10bf4477df6a38b9a469e339666b',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php' => 
  array (
    'fileHash' => 'b41886890d7b766ad5d6895979f9dd41a5ba8393',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGenerator.php' => 
  array (
    'fileHash' => '1ec88e68843fda7b7e715de50105b75e58c501c4',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGeneratorService.php' => 
  array (
    'fileHash' => '932d2632fb122f43708bc92e6f9b65ffa3d45aa8',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/EloquentModelGeneratorServiceProvider.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php',
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
      6 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
      7 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
      8 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ParallelModelGeneratorService.php' => 
  array (
    'fileHash' => '8e181dc2efaa78c19509be188c5bddb7ac0eb69e',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/EloquentModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/SchemaAnalyzer.php' => 
  array (
    'fileHash' => 'e84ff4d821f1d39a517ca4e5f971ac0bcf00aa1e',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Database/migrations/2024_01_01_000000_create_model_generator_tables.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/EloquentModelGeneratorServiceProvider.php' => 
  array (
    'fileHash' => '65646b0a70069e6dc8d7e2337cade178863e237c',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Events/ModelGenerated.php' => 
  array (
    'fileHash' => '8d9770e1e3550562023510490ff3c6a2f63349df',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/InvalidConfigurationException.php' => 
  array (
    'fileHash' => '3c0e340f33c1c566041ea24daa8fb3bb7b602188',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/ModelGeneratorException.php' => 
  array (
    'fileHash' => '7cecbcc580d8368bb66542fb06b42f1989296ce7',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGenerator.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGeneratorService.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/ModelGeneratorSchemaAnalyzerException.php' => 
  array (
    'fileHash' => '909d25ac385351751295ed7556a8257fbf9325ed',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/SchemaAnalyzer.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/ModelGeneratorTemplateException.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/MongoDBSchemaAnalyzerException.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Http/Controllers/ModelGeneratorController.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Http/Requests/GenerateModelRequest.php' => 
  array (
    'fileHash' => 'b9a74bef3a49327a6c41953bc21ce14a1498d245',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php' => 
  array (
    'fileHash' => '914f2ccdd749ca717fff89437fef5de4b162316f',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php' => 
  array (
    'fileHash' => '322b6a28b3434cbe6e918b2547d56d26f3677bcd',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Attributes.php' => 
  array (
    'fileHash' => '59a20d3901e14bb4da57b40acc873c6bedd3c285',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/ModelName.php' => 
  array (
    'fileHash' => '7969d55d322ec7cb5f1be09957b92242a05279ad',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php' => 
  array (
    'fileHash' => 'efbedf814d529d012eee6d99df3937e9260f2a30',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php' => 
  array (
    'fileHash' => 'b41e9a460dd49e7a8bfee76c4502aff28294fd67',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseGeneratedModel.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php' => 
  array (
    'fileHash' => '9271c45e7f707a70584652f1e2e150c310dd301b',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php' => 
  array (
    'fileHash' => '96b0eb1af19f7cedda3ca70e7c7677673e5d8444',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Collections/ModelCollection.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGenerator.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Events/ModelGenerated.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorInterface.php',
      6 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
      7 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorServiceInterface.php',
      8 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
      9 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php',
      10 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
      11 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/ModelTemplate.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php' => 
  array (
    'fileHash' => 'adcd4fa3e266b64b7adcddf9a1a6105a81ad8f76',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelInterface.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php' => 
  array (
    'fileHash' => '0d4a504ad86eaf7736ac9f409ae495e4099691f1',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php' => 
  array (
    'fileHash' => '5ee1c509751aa6af4cebdac64403be476a3b8e53',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php' => 
  array (
    'fileHash' => 'ce24758a515819648cf91b6f0e980b9ce23386ce',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/SchemaParser.php' => 
  array (
    'fileHash' => 'c65fcf066fa4e8993dc5485b5e6754cf13b65732',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/BatchModelGeneratorService.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmark.php' => 
  array (
    'fileHash' => '19c530410f6ff1127173b7c725c70f3fb644266e',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmarking/PerformanceBenchmark.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmarking/PerformanceBenchmark.php' => 
  array (
    'fileHash' => '55fa8ad6b888871eef95b3aa353794c880433a39',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php' => 
  array (
    'fileHash' => '05bc55ee5c7a338a82a9e63db1c78a8df3ceada3',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php' => 
  array (
    'fileHash' => 'ee8addaead433c9fb5e561c32a90fcbb652cc10d',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php' => 
  array (
    'fileHash' => '0a5d69d5d79aed157e59193598642c0e9993875f',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorInterface.php' => 
  array (
    'fileHash' => '26d32ae93399d745ee7fa49ea5673ad12a004259',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorSchemaAnalyzer.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php' => 
  array (
    'fileHash' => 'f0d6adb9e8ceafd1942ebd97feca8897a7c89a9a',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorServiceInterface.php' => 
  array (
    'fileHash' => '20abf40b6fcc4539646cef3f3953bc8be519a707',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTableSchema.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php' => 
  array (
    'fileHash' => '4e4f05cb8da865aac8c74dba3db72818873a7628',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php' => 
  array (
    'fileHash' => 'a9170e420aae64e8ac514b7236f0d061e8d1f0e1',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php' => 
  array (
    'fileHash' => 'caa4c520ae6086cc0010e6f173690ad7742063c9',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php' => 
  array (
    'fileHash' => '9beb76f5ddb5dbbe2ca9ed0f0eca357137f773fc',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/CachedSchemaAnalyzer.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MongoDBSchemaAnalyzer.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php' => 
  array (
    'fileHash' => 'd27f43d64a911e3dc3c53efc19c2ff8ac914e87d',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php' => 
  array (
    'fileHash' => 'ceb306bdfe0af5bc69bfc887b5bb136a9234b02d',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php' => 
  array (
    'fileHash' => '603fcb5af352b3b65be7c23ab94c332d685a3f14',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SchemaAnalyzerInterface.php' => 
  array (
    'fileHash' => '824ce1b28f27b2f0a495e75c685cfc371b95220d',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php' => 
  array (
    'fileHash' => '5bb8b4670979e820cf2db10089997570a6eacf26',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php' => 
  array (
    'fileHash' => '2d07212c8b0ebf0b593c7c3f3bee82ed3c3392fd',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php' => 
  array (
    'fileHash' => '7b26a3f9f966c0fd623b49d089d21ba9212825fa',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGenerator.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGeneratorService.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ParallelModelGeneratorService.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php',
      6 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php',
      7 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
      8 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
      9 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
      10 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
      11 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
      12 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/RelationDefinition.php' => 
  array (
    'fileHash' => '4891a29b5a661322d9c236743b15a553711007ca',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php' => 
  array (
    'fileHash' => 'bd57d306d2d6b6cd4b069a0013d2e0378f80cde4',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php' => 
  array (
    'fileHash' => '5090a5be5f14ee6257ff6b01fde6be05e9e6149b',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Providers/ModelGeneratorServiceProvider.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php' => 
  array (
    'fileHash' => '306cde037dff530605c689956097d6a2ab9d7bd6',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Templates/CachedModelTemplate.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Templates/ModelTemplate.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasAttributes.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasModelValidation.php' => 
  array (
    'fileHash' => '75c2ca6258b63884aae3442a404f062ef0feb5d0',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasRelationships.php' => 
  array (
    'fileHash' => 'bb95b384257353f9c9d928976734895fda38b4cd',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasValidation.php' => 
  array (
    'fileHash' => '1ccc7d9864bf343d082c6d0afa640f1e5168d628',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Validation/ModelValidator.php' => 
  array (
    'fileHash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php' => 
  array (
    'fileHash' => 'b4b4f9090e6648dfd4f565e34933c2e1f3c37be7',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/ModelTemplate.php' => 
  array (
    'fileHash' => 'cdd3a5d4c1666eb016f796e6f5f6cf3d1143f064',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/BenchmarkResult.php' => 
  array (
    'fileHash' => '51d94fdb127f68f7305a782909b9d57bea592785',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmark.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php' => 
  array (
    'fileHash' => '7f5bf2d370d81b5bebcf0bbcf53f4d99958fb68a',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php' => 
  array (
    'fileHash' => 'e9e8a1a43dd5eb44e9752708f429d55d751a6b4c',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php' => 
  array (
    'fileHash' => 'da0025160ad80e35d710587af729ec9443d77841',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorInterface.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SchemaAnalyzerInterface.php',
    ),
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Collections/ModelCollection.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Collections\\ModelCollection',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @template TKey of array-key
 * @template TValue of GeneratedModel
 * @extends Collection<TKey, TValue>
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Collections',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Support\\Collection',
          'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\Collection',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model collection.
     *
     * @param array<TKey, TValue> $items
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Collections',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'items',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a model by its name
     *
     * @param string $name The name of the model to find
     * @return GeneratedModel|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Collections',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'addModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Add a model to the collection
     *
     * @param TValue $model The model to add
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Collections',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'removeModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Remove a model from the collection
     *
     * @param string $name The name of the model to remove
     * @return static<TKey, TValue>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Collections',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getModels',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all models in the collection.
     *
     * @return array<TKey, TValue>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Collections',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type RelationConfig array{
 *     type: \'belongsTo\'|\'belongsToMany\'|\'hasMany\'|\'hasOne\'|\'morphMany\'|\'morphOne\'|\'morphTo\',
 *     model: string,
 *     foreignKey?: string,
 *     localKey?: string,
 *     table?: string,
 *     morphType?: string
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Config',
         'uses' => 
        array (
          'datetime' => 'DateTime',
          'invalidargumentexception' => 'InvalidArgumentException',
          'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new generator configuration instance
     *
     * @param array{
     *     namespace?: string,
     *     path?: string,
     *     relations?: array<string, RelationConfig>,
     *     with_validation?: bool,
     *     with_relationships?: bool,
     *     base_class?: string,
     *     date_format?: string,
     *     connection?: string
     * } $config
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNamespace',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the namespace for generated models
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNamespace',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the namespace for generated models
     *
     * @param string $namespace
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'namespace',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPath',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the path for generated models
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setPath',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the path for generated models
     *
     * @param string $path
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'path',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRelations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the relations configuration
     *
     * @return array<string, RelationConfig>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setRelations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the relations configuration
     *
     * @param array<string, RelationConfig> $relations
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'relations',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withValidation',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if validation should be included
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setWithValidation',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set whether validation should be included
     *
     * @param bool $withValidation
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'withValidation',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withRelationships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if relationships should be included
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setWithRelationships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set whether relationships should be included
     *
     * @param bool $withRelationships
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'withRelationships',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getBaseClass',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the base class for generated models
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setBaseClass',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the base class for generated models
     *
     * @param string|null $baseClass
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'baseClass',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDateFormat',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the date format for generated models
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setDateFormat',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the date format for generated models
     *
     * @param string|null $dateFormat
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'dateFormat',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getConnection',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the database connection for generated models
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setConnection',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the database connection for generated models
     *
     * @param string|null $connection
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'connection',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert the configuration to an array
     *
     * @return array{
     *     namespace: string,
     *     path: string,
     *     relations: array<string, RelationConfig>,
     *     with_validation: bool,
     *     with_relationships: bool,
     *     base_class: string|null,
     *     date_format: string|null,
     *     connection: string|null
     * }
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new instance from an array
     *
     * @param array{
     *     namespace?: string,
     *     path?: string,
     *     relations?: array<string, RelationConfig>,
     *     with_validation?: bool,
     *     with_relationships?: bool,
     *     base_class?: string,
     *     date_format?: string,
     *     connection?: string
     * } $config
     * @return self
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Config',
             'uses' => 
            array (
              'datetime' => 'DateTime',
              'invalidargumentexception' => 'InvalidArgumentException',
              'invalidconfigurationexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\GenerateModelCommand',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Console\\Command',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'signature',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name and signature of the console command.
     *
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'generatorconfig' => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'outputinterface' => 'Symfony\\Component\\Console\\Output\\OutputInterface',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'description',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The console command description.
     *
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'generatorconfig' => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'outputinterface' => 'Symfony\\Component\\Console\\Output\\OutputInterface',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new command instance.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'generatorconfig' => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'outputinterface' => 'Symfony\\Component\\Console\\Output\\OutputInterface',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'modelGeneratorService',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'templateEngine',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Execute the console command.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'generatorconfig' => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'outputinterface' => 'Symfony\\Component\\Console\\Output\\OutputInterface',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\ListTablesCommand',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Console\\Command',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'signature',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name and signature of the console command.
     *
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'description',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The console command description.
     *
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new command instance.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'modelGeneratorService',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Execute the console command.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console\\Commands',
             'uses' => 
            array (
              'command' => 'Illuminate\\Console\\Command',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model from the given schema.
     *
     * @param ModelDefinition $definition
     * @param array<string, mixed> $schema
     * @return GeneratedModel
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateBatch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate multiple models in batch.
     *
     * @param array<ModelDefinition> $definitions
     * @param array<string, array<string, mixed>> $schemas
     * @return array<GeneratedModel>
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definitions',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schemas',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'modelExists',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a model already exists.
     *
     * @param string $className
     * @param string $namespace
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'className',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'namespace',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ModelGeneratorService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type ColumnDefinition array{
 *     type: non-empty-string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: positive-int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null,
 *     allowed?: array<string>|null
 * }
 *
 * @phpstan-type SchemaDefinition array{
 *     columns: array<string, ColumnDefinition>,
 *     indexes?: array<string, array{
 *         type: \'primary\'|\'unique\'|\'index\'|\'fulltext\'|\'spatial\',
 *         columns: array<string>,
 *         name?: string,
 *         algorithm?: string,
 *         options?: array<string, mixed>
 *     }>,
 *     foreignKeys?: array<string, array{
 *         table: string,
 *         columns: array<string, string>,
 *         onDelete?: string,
 *         onUpdate?: string
 *     }>,
 *     relations?: array<string, array{
 *         type: string,
 *         model?: string,
 *         foreignKey?: string,
 *         localKey?: string,
 *         morphType?: string
 *     }>,
 *     timestamps?: bool,
 *     softDeletes?: bool,
 *     primaryKey?: string,
 *     incrementing?: bool
 * }
 *
 * @phpstan-type ModelOptions array{
 *     class_name?: string,
 *     namespace?: string,
 *     base_class?: class-string|null,
 *     with_soft_deletes?: bool,
 *     with_validation?: bool,
 *     with_relationships?: bool
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
         'uses' => 
        array (
          'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
          'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
        ),
         'constUses' => 
        array (
        ),
      )),
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model from a table name.
     *
     * @param string $table
     * @param ModelOptions $options
     * @return ModelDefinition
     * @throws ModelGeneratorException If table does not exist or schema analysis fails
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'options',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateBatch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate models for multiple tables
     *
     * @param array<string> $tables
     * @param ModelOptions $config
     * @return array<ModelDefinition>
     * @throws ModelGeneratorException If any model generation fails
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables
     *
     * @return array<string>
     * @throws ModelGeneratorException If table list cannot be retrieved
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTableSchema',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the schema for a table
     *
     * @param string $table
     * @return SchemaDefinition
     * @throws ModelGeneratorException If schema analysis fails
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/ParallelModelGeneratorService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Contracts\\ParallelModelGeneratorService',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModels',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate models in parallel.
     *
     * @param array<string> $tables
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $options
     * @return array<ModelDefinition>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'options',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/SchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyze',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Analyze the database table schema.
     *
     * @param string $table
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         index?: bool,
     *         foreign?: array{table: string, column: string},
     *         default?: mixed
     *     }>,
     *     relationships: array<array{
     *         type: string,
     *         foreignTable: string,
     *         foreignKey: string,
     *         localKey: string
     *     }>
     * }
     * @throws ModelGeneratorSchemaAnalyzerException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the list of tables in the database.
     *
     * @return array<string>
     * @throws ModelGeneratorSchemaAnalyzerException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'tableExists',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Contracts',
             'uses' => 
            array (
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/EloquentModelGeneratorServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\EloquentModelGeneratorServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register any application services.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'parallelmodelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ParallelModelGeneratorService',
              'modelgenerator' => 'SAC\\EloquentModelGenerator\\Services\\ModelGenerator',
              'parallelmodelgenerator' => 'SAC\\EloquentModelGenerator\\Services\\ParallelModelGenerator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Bootstrap any application services.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'parallelmodelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ParallelModelGeneratorService',
              'modelgenerator' => 'SAC\\EloquentModelGenerator\\Services\\ModelGenerator',
              'parallelmodelgenerator' => 'SAC\\EloquentModelGenerator\\Services\\ParallelModelGenerator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Events/ModelGenerated.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Events\\ModelGenerated',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model generated event instance.
     *
     * @param GeneratedModel $model
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Events',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the generated model.
     *
     * @return GeneratedModel
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Events',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/InvalidConfigurationException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Exceptions\\InvalidConfigurationException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'InvalidArgumentException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/ModelGeneratorException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Exception',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model generator exception instance.
     *
     * @param string $message
     * @param int $code
     * @param \\Throwable|null $previous
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Exceptions',
             'uses' => 
            array (
              'exception' => 'Exception',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'code',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'previous',
               'type' => '?Throwable',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/ModelGeneratorSchemaAnalyzerException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Exception',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new schema analyzer exception.
     *
     * @param string $message
     * @param int $code
     * @param \\Throwable|null $previous
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Exceptions',
             'uses' => 
            array (
              'exception' => 'Exception',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'code',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'previous',
               'type' => '?Throwable',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Http/Requests/GenerateModelRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Http\\Requests\\GenerateModelRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Determine if the user is authorized to make this request.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Http\\Requests',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Http\\Requests',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Foundation\\Bus\\Dispatchable',
        1 => 'Illuminate\\Queue\\InteractsWithQueue',
        2 => 'Illuminate\\Bus\\Queueable',
        3 => 'Illuminate\\Queue\\SerializesModels',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new job instance.
     *
     * @param string $table
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $config
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Jobs',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'shouldqueue' => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
              'dispatchable' => 'Illuminate\\Foundation\\Bus\\Dispatchable',
              'interactswithqueue' => 'Illuminate\\Queue\\InteractsWithQueue',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Execute the job.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Jobs',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'shouldqueue' => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
              'dispatchable' => 'Illuminate\\Foundation\\Bus\\Dispatchable',
              'interactswithqueue' => 'Illuminate\\Queue\\InteractsWithQueue',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getResult',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the generated model.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Jobs',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'shouldqueue' => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
              'dispatchable' => 'Illuminate\\Foundation\\Bus\\Dispatchable',
              'interactswithqueue' => 'Illuminate\\Queue\\InteractsWithQueue',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Jobs\\ProcessModelChunkJob',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Foundation\\Bus\\Dispatchable',
        1 => 'Illuminate\\Queue\\InteractsWithQueue',
        2 => 'Illuminate\\Bus\\Queueable',
        3 => 'Illuminate\\Queue\\SerializesModels',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new job instance.
     *
     * @param array<string> $tables
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $config
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Jobs',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'shouldqueue' => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
              'dispatchable' => 'Illuminate\\Foundation\\Bus\\Dispatchable',
              'interactswithqueue' => 'Illuminate\\Queue\\InteractsWithQueue',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Execute the job.
     *
     * @return array<ModelDefinition>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Jobs',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'shouldqueue' => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
              'dispatchable' => 'Illuminate\\Foundation\\Bus\\Dispatchable',
              'interactswithqueue' => 'Illuminate\\Queue\\InteractsWithQueue',
              'serializesmodels' => 'Illuminate\\Queue\\SerializesModels',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Attributes.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Model\\Attributes',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new attributes instance.
     *
     * @param array<string> $fillable
     * @param array<string, string> $casts
     * @param array<string> $dates
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fillable',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'casts',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'dates',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toFillable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert fillable attributes to string.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toCasts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert cast attributes to string.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toDates',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert date attributes to string.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/ModelName.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Model\\ModelName',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model name instance.
     *
     * @param string $name
     * @throws InvalidArgumentException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a model name from a table name.
     *
     * @param string $table
     * @return self
     * @throws InvalidArgumentException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toString',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert the model name to a string.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Model\\Relations',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type RelationType \'hasOne\'|\'hasMany\'|\'belongsTo\'|\'belongsToMany\'|\'morphTo\'|\'morphOne\'|\'morphMany\'|\'morphToMany\'
 * @phpstan-type RelationDefinition array{
 *     type: RelationType,
 *     model: class-string,
 *     name: string,
 *     foreignKey?: string,
 *     localKey?: string,
 *     table?: string,
 *     morphType?: string,
 *     morphClass?: class-string
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Model',
         'uses' => 
        array (
          'str' => 'Illuminate\\Support\\Str',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'addRelation',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Add a relation definition.
     *
     * @param string $name
     * @param RelationDefinition $definition
     * @return void
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRelations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all relations.
     *
     * @return array<string, RelationDefinition>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRelationMethods',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the relation method definition.
     *
     * @param array<string, RelationDefinition> $relations
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Model',
             'uses' => 
            array (
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'relations',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\ModelGenerator',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'validationGenerator',
          ),
           'phpDoc' => NULL,
           'type' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model generator instance.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'modelgeneratorcontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'validationrulegenerator' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'validationGenerator',
               'type' => '?SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model from the given schema.
     *
     * @param ModelDefinition $definition
     * @param array<string, mixed> $schema
     * @return GeneratedModel
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'modelgeneratorcontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'validationrulegenerator' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateBatch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate multiple models in batch.
     *
     * @param array<ModelDefinition> $definitions
     * @param array<string, array<string, mixed>> $schemas
     * @return array<GeneratedModel>
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'modelgeneratorcontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'validationrulegenerator' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definitions',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schemas',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'modelExists',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a model already exists.
     *
     * @param string $className
     * @param string $namespace
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'modelgeneratorcontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'validationrulegenerator' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'className',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'namespace',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'injectValidationTraits',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Inject validation traits into the model content.
     *
     * @param string $content
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'modelgeneratorcontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'validationrulegenerator' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'content',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'injectValidationRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Inject validation rules into the model content.
     *
     * @param string $content
     * @param array<string, string|array> $rules
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'modelgeneratorcontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'validationrulegenerator' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'content',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'rules',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'injectValidationMessages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Inject validation messages into the model content.
     *
     * @param string $content
     * @param array<string, string> $messages
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
              'modelgeneratorcontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'validationrulegenerator' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'content',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'messages',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Models\\BaseModel',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
        1 => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'primaryKey',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The primary key for the model.
     *
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'timestamps',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'hidden',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'rules',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The validation rules that apply to the model.
     *
     * @var array<string, array<string>|string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'messages',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The validation error messages.
     *
     * @var array<string, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'touches',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The relationships that should be touched on save.
     *
     * @var array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'with',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The relationships that should be eager loaded.
     *
     * @var array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model instance.
     *
     * @param array<string, mixed> $attributes
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table associated with the model.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the table associated with the model.
     *
     * @param string $table
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getKeyName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the primary key for the model.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setKeyName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the primary key for the model.
     *
     * @param string $key
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getFillable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the fillable attributes for the model.
     *
     * @return array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setFillable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the fillable attributes for the model.
     *
     * @param array<int, string> $fillable
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fillable',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHidden',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the hidden attributes for the model.
     *
     * @return array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setHidden',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the hidden attributes for the model.
     *
     * @param array<int, string> $hidden
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'hidden',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getCasts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the casts array.
     *
     * @return array<string, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setCasts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the casts array.
     *
     * @param array<string, string> $casts
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'casts',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTouches',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the touches array.
     *
     * @return array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        22 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setTouches',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the touches array.
     *
     * @param array<int, string> $touches
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'touches',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        23 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getWith',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the with array.
     *
     * @return array<int, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        24 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setWith',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the with array.
     *
     * @param array<int, string> $with
     * @return $this
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'with',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        25 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'guessTableName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Guess the table name for the model.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'collection' => 'Illuminate\\Support\\Collection',
              'hasvalidation' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
              'hasrelationships' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new generated model instance.
     *
     * @param string $className
     * @param string $namespace
     * @param string $tableName
     * @param string $baseClass
     * @param string $content
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'className',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'namespace',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tableName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'baseClass',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'content',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getClassName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the class name.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNamespace',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the namespace.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTableName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table name.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getBaseClass',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the base class.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getSchema',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the schema.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRelationships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the relationships.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getCasts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the casts.
     *
     * @return array<string, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getFillable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the fillable attributes.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHidden',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the hidden attributes.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getValidationRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the validation rules.
     *
     * @return array<string, string|array>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDates',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the dates.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'usesSoftDeletes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the model uses soft deletes.
     *
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getFilePath',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the file path for this model.
     *
     * @param string $basePath
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'basePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert the model to an array.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getFullyQualifiedClassName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the fully qualified class name.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'render',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Render the model as a string.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setValidationRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the validation rules.
     *
     * @param array<string, string|array> $rules
     * @return void
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'rules',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setValidationMessages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the validation messages.
     *
     * @param array<string, string> $messages
     * @return void
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'messages',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getValidationMessages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the validation messages.
     *
     * @return array<string, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setContent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the model content.
     *
     * @param string $content
     * @return void
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'content',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getContent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the model content.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new generated model attribute instance.
     *
     * @param string $name
     * @param string $type
     * @param int|null $length
     * @param bool $nullable
     * @param mixed $default
     * @param bool $unsigned
     * @param bool $autoIncrement
     * @param bool $primaryKey
     * @param bool $unique
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'length',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'nullable',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => '?mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'unsigned',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'autoIncrement',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            7 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'primaryKey',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            8 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'unique',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attribute name.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attribute type.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getLength',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attribute length.
     *
     * @return int|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isNullable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the attribute is nullable.
     *
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDefault',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attribute default value.
     *
     * @return mixed
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'mixed',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isUnsigned',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the attribute is unsigned.
     *
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isAutoIncrement',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the attribute is auto-incrementing.
     *
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isPrimaryKey',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the attribute is a primary key.
     *
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isUnique',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the attribute is unique.
     *
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new generated model relation instance.
     *
     * @param string $name
     * @param string $type
     * @param string $model
     * @param string|null $foreignKey
     * @param string|null $localKey
     * @param array<string, mixed> $parameters
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'foreignKey',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'localKey',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'parameters',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the relation name.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the relation type.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the related model.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getForeignKey',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the foreign key.
     *
     * @return string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getLocalKey',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the local key.
     *
     * @return string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getParameters',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get additional parameters.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert the relation to an array.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Models',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Providers\\EloquentModelGeneratorServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register any application services.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
              'generatemodelcommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\GenerateModelCommand',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Bootstrap any application services.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
              'generatemodelcommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\GenerateModelCommand',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Providers\\ModelGeneratorServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/SchemaParser.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\SchemaParser',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type ColumnDefinition array{
 *     type: string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: string|null
 * }
 *
 * @phpstan-type IndexDefinition array{
 *     type: string,
 *     columns: array<string>,
 *     unique?: bool
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'parseColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Parse column definitions.
     *
     * @param array<string, ColumnDefinition> $columns
     * @return array<string, array{type: string, cast?: string}>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'parseIndexes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Parse index definitions.
     *
     * @param array<string, IndexDefinition> $indexes
     * @return array<string, array{type: string, columns: array<string>}>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'indexes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmark.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Benchmark',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'measure',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'operation',
               'type' => 'callable',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmarking/PerformanceBenchmark.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Benchmarking\\PerformanceBenchmark',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'SAC\\EloquentModelGenerator\\Services\\Benchmark',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'startBenchmark',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Start a benchmark.
     *
     * @param string $name
     * @return void
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Benchmarking',
             'uses' => 
            array (
              'benchmark' => 'SAC\\EloquentModelGenerator\\Services\\Benchmark',
              'benchmarkresult' => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'endBenchmark',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * End a benchmark.
     *
     * @param string $name
     * @return array{duration: float, memory_usage: int}
     * @throws \\RuntimeException If benchmark was not started
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Benchmarking',
             'uses' => 
            array (
              'benchmark' => 'SAC\\EloquentModelGenerator\\Services\\Benchmark',
              'benchmarkresult' => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getBenchmarks',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all benchmarks.
     *
     * @return array<string, array{start_time: float, start_memory: int, end_time?: float, end_memory?: int, duration?: float, memory_usage?: int}>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Benchmarking',
             'uses' => 
            array (
              'benchmark' => 'SAC\\EloquentModelGenerator\\Services\\Benchmark',
              'benchmarkresult' => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new configuration service instance.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'repository' => 'Illuminate\\Contracts\\Config\\Repository',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'Illuminate\\Contracts\\Config\\Repository',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'get',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a configuration value.
     *
     * @template T
     * @param string $key
     * @param T $default
     * @return T
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'repository' => 'Illuminate\\Contracts\\Config\\Repository',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'mixed',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => '?mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'set',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a configuration value.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'repository' => 'Illuminate\\Contracts\\Config\\Repository',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'has',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a configuration value exists.
     *
     * @param string $key
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'repository' => 'Illuminate\\Contracts\\Config\\Repository',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'all',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all configuration values.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'repository' => 'Illuminate\\Contracts\\Config\\Repository',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorInterface',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'configService',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model.
     *
     * @param string $table
     * @param TableSchema $schema
     * @param array<string, mixed> $config
     * @return GeneratedModel
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModelContent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate the model content.
     *
     * @param string $className
     * @param string $namespace
     * @param string $tableName
     * @param string $baseClass
     * @param array{columns: array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}>, indexes?: array<string, array{type: string, columns: array<string>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>}>} $schema
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'className',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'namespace',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tableName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'baseClass',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTemplate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the model template.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateFillable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate the fillable property.
     *
     * @param array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}> $columns
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateCasts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate the casts property.
     *
     * @param array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}> $columns
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getCastType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cast type for a column.
     *
     * @param string $type
     * @return string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ModelGenerator',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'factory',
               'type' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model from a table name.
     *
     * @param string $table
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $options
     * @return ModelDefinition
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'options',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateBatch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $config
     * @return array<ModelDefinition>
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTableSchema',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the schema for a table.
     *
     * @param string $table
     * @return array{
     *     columns: array<string, array{
     *         type: non-empty-string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: positive-int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         comment?: non-empty-string|null
     *     }>,
     *     indexes?: array<string, array{
     *         type: \'primary\'|\'unique\'|\'index\'|\'fulltext\'|\'spatial\',
     *         columns: array<string>,
     *         name?: string,
     *         algorithm?: string,
     *         options?: array<string, mixed>
     *     }>,
     *     foreignKeys?: array<string, array{
     *         table: string,
     *         columns: array<string, string>,
     *         onDelete?: string,
     *         onUpdate?: string
     *     }>,
     *     timestamps?: bool,
     *     softDeletes?: bool,
     *     primaryKey?: string,
     *     incrementing?: bool
     * }
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorInterface.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorInterface',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model from the given schema.
     *
     * @param string $table
     * @param TableSchema $schema
     * @param array<string, mixed> $config
     * @return GeneratedModel
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type ColumnDefinition array{
 *     type: non-empty-string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: positive-int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null,
 *     allowed?: array<string>|null
 * }
 *
 * @phpstan-type SchemaDefinition array{
 *     columns: array<string, ColumnDefinition>,
 *     indexes?: array<string, array{
 *         type: \'primary\'|\'unique\'|\'index\'|\'fulltext\'|\'spatial\',
 *         columns: array<string>,
 *         name?: string,
 *         algorithm?: string,
 *         options?: array<string, mixed>
 *     }>,
 *     foreignKeys?: array<string, array{
 *         table: string,
 *         columns: array<string, string>,
 *         onDelete?: string,
 *         onUpdate?: string
 *     }>,
 *     relations?: array<string, array{
 *         type: string,
 *         model?: string,
 *         foreignKey?: string,
 *         localKey?: string,
 *         morphType?: string
 *     }>,
 *     timestamps?: bool,
 *     softDeletes?: bool,
 *     primaryKey?: string,
 *     incrementing?: bool
 * }
 *
 * @phpstan-type ModelOptions array{
 *     class_name?: string,
 *     namespace?: string,
 *     base_class?: class-string|null,
 *     with_soft_deletes?: bool,
 *     with_validation?: bool,
 *     with_relationships?: bool
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Services',
         'uses' => 
        array (
          'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
          'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
          'modelgeneratorservicecontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'file' => 'Illuminate\\Support\\Facades\\File',
          'schema' => 'Illuminate\\Support\\Facades\\Schema',
          'str' => 'Illuminate\\Support\\Str',
          'collection' => 'Illuminate\\Support\\Collection',
          'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
          'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
          'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
          'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
          'connection' => 'Illuminate\\Database\\Connection',
          'schemabuilder' => 'Illuminate\\Database\\Schema\\Builder',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model generator service instance.
     *
     * @throws ModelGeneratorException If database connection cannot be established
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservicecontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'connection' => 'Illuminate\\Database\\Connection',
              'schemabuilder' => 'Illuminate\\Database\\Schema\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'templateEngine',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model for a given table
     *
     * @param string $table
     * @param ModelOptions $options
     * @return ModelDefinition
     * @throws ModelGeneratorException If table does not exist or schema analysis fails
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservicecontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'connection' => 'Illuminate\\Database\\Connection',
              'schemabuilder' => 'Illuminate\\Database\\Schema\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'options',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateBatch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate models for multiple tables
     *
     * @param array<string> $tables
     * @param ModelOptions $config
     * @return array<ModelDefinition>
     * @throws ModelGeneratorException If any model generation fails
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservicecontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'connection' => 'Illuminate\\Database\\Connection',
              'schemabuilder' => 'Illuminate\\Database\\Schema\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables
     *
     * @return array<string>
     * @throws ModelGeneratorException If table list cannot be retrieved
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservicecontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'connection' => 'Illuminate\\Database\\Connection',
              'schemabuilder' => 'Illuminate\\Database\\Schema\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTableSchema',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the schema for a table
     *
     * @param string $table
     * @return SchemaDefinition
     * @throws ModelGeneratorException If schema analysis fails
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservicecontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'connection' => 'Illuminate\\Database\\Connection',
              'schemabuilder' => 'Illuminate\\Database\\Schema\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model from the given schema.
     *
     * @param ModelDefinition $definition
     * @param SchemaDefinition $schema
     * @return GeneratedModel
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorservicecontract' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'file' => 'Illuminate\\Support\\Facades\\File',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
              'str' => 'Illuminate\\Support\\Str',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'connection' => 'Illuminate\\Database\\Connection',
              'schemabuilder' => 'Illuminate\\Database\\Schema\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorServiceInterface.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorServiceInterface',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a model for the given table.
     *
     * @param string $table
     * @param array<string, mixed> $config
     * @return GeneratedModel
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModels',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @param array<string, mixed> $config
     * @return array<GeneratedModel>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type EventConfig array{
 *     class: class-string,
 *     description?: string,
 *     payload?: array<string, mixed>
 * }
 *
 * @phpstan-type ModelConfig array{
 *     table: non-empty-string,
 *     connection?: non-empty-string,
 *     primaryKey?: non-empty-string,
 *     keyType?: \'int\'|\'string\',
 *     incrementing?: bool,
 *     timestamps?: bool,
 *     dateFormat?: non-empty-string,
 *     with?: array<non-empty-string>,
 *     withCount?: array<non-empty-string>,
 *     perPage?: positive-int,
 *     events?: array<non-empty-string, EventConfig>
 * }
 *
 * @phpstan-type ValidationRule array{
 *     rule: non-empty-string,
 *     parameters?: array<mixed>,
 *     message?: non-empty-string
 * }
 *
 * @phpstan-type ValidationRules array<non-empty-string, array<ValidationRule|non-empty-string>>
 *
 * @phpstan-type ColumnAttributes array{
 *     type: non-empty-string,
 *     length?: positive-int|null,
 *     nullable?: bool,
 *     default?: mixed,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null,
 *     precision?: positive-int|null,
 *     scale?: int<0, max>|null,
 *     collation?: non-empty-string|null,
 *     charset?: non-empty-string|null,
 *     onUpdate?: non-empty-string|null,
 *     onDelete?: non-empty-string|null,
 *     hidden?: bool,
 *     validation?: ValidationRules,
 *     index?: bool|\'unique\'|\'fulltext\'|\'spatial\',
 *     foreignKey?: array{
 *         table: non-empty-string,
 *         column: non-empty-string,
 *         onDelete?: \'cascade\'|\'restrict\'|\'set null\'|\'no action\',
 *         onUpdate?: \'cascade\'|\'restrict\'|\'set null\'|\'no action\'
 *     }
 * }
 *
 * @phpstan-type RelationConfig array{
 *     type: non-empty-string,
 *     model: class-string,
 *     foreignKey?: non-empty-string,
 *     localKey?: non-empty-string,
 *     table?: non-empty-string,
 *     morphType?: non-empty-string,
 *     morphClass?: class-string,
 *     pivotTable?: non-empty-string,
 *     pivotColumns?: array<non-empty-string>,
 *     pivotForeignKey?: non-empty-string,
 *     pivotRelatedKey?: non-empty-string,
 *     withTimestamps?: bool,
 *     withPivot?: array<non-empty-string>,
 *     using?: class-string
 * }
 *
 * @phpstan-type IndexConfig array{
 *     type: \'primary\'|\'unique\'|\'index\'|\'fulltext\'|\'spatial\',
 *     columns: array<string>,
 *     name?: string,
 *     algorithm?: string,
 *     options?: array<string, mixed>
 * }
 *
 * @phpstan-type ForeignKeyConfig array{
 *     table: string,
 *     columns: array<string, string>,
 *     onDelete?: string,
 *     onUpdate?: string
 * }
 *
 * @phpstan-type SchemaDefinition array{
 *     columns: array<string, ColumnAttributes>,
 *     relations?: array<string, RelationConfig>,
 *     indexes?: array<string, IndexConfig>,
 *     foreignKeys?: array<string, ForeignKeyConfig>,
 *     timestamps?: bool,
 *     softDeletes?: bool,
 *     primaryKey?: string,
 *     incrementing?: bool,
 *     keyType?: string,
 *     connection?: string,
 *     dateFormat?: string
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Services',
         'uses' => 
        array (
          'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new template engine instance.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'render',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Render a model template.
     *
     * @param ModelDefinition $definition
     * @param array{columns: array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>, relations?: array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>, indexes?: array<string, array{type: \'primary\'|\'unique\'|\'index\'|\'fulltext\'|\'spatial\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} $schema
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ParallelModelGenerator',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Contracts\\ParallelModelGeneratorService',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'factory',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var ModelGeneratorFactory
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'parallelmodelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ParallelModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'runtime' => 'parallel\\Runtime',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Constructor.
     *
     * @param ModelGeneratorFactory $factory
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'parallelmodelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ParallelModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'runtime' => 'parallel\\Runtime',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'factory',
               'type' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModels',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate models in parallel.
     *
     * @param array $tables
     * @param array $options
     * @return array<ModelDefinition>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'parallelmodelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ParallelModelGeneratorService',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'runtime' => 'parallel\\Runtime',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'options',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ParallelModelGeneratorService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorServiceInterface',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new parallel model generator service instance.
     *
     * @param SchemaAnalyzer $schemaAnalyzer
     * @param ModelGenerator $modelGenerator
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'bus' => 'Illuminate\\Support\\Facades\\Bus',
              'str' => 'Illuminate\\Support\\Str',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modelgeneratorserviceinterface' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorServiceInterface',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'generatemodeljob' => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgenerator' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schemaAnalyzer',
               'type' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'modelGenerator',
               'type' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModels',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate models in parallel.
     *
     * @param array<string> $tables
     * @param array<string, mixed> $config
     * @return array<GeneratedModel>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'bus' => 'Illuminate\\Support\\Facades\\Bus',
              'str' => 'Illuminate\\Support\\Str',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modelgeneratorserviceinterface' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorServiceInterface',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'generatemodeljob' => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgenerator' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tables',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'bus' => 'Illuminate\\Support\\Facades\\Bus',
              'str' => 'Illuminate\\Support\\Str',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modelgeneratorserviceinterface' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorServiceInterface',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'generatemodeljob' => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgenerator' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate a single model.
     *
     * @param string $table
     * @param array<string, mixed> $config
     * @return GeneratedModel
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'bus' => 'Illuminate\\Support\\Facades\\Bus',
              'str' => 'Illuminate\\Support\\Str',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modelgeneratorserviceinterface' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorServiceInterface',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'generatemodeljob' => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgenerator' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getClassName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the class name for a table.
     *
     * @param string $table
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'bus' => 'Illuminate\\Support\\Facades\\Bus',
              'str' => 'Illuminate\\Support\\Str',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'modelgeneratorserviceinterface' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorServiceInterface',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition',
              'generatemodeljob' => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgenerator' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGenerator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'connection',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var ConnectionInterface
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'Illuminate\\Database\\ConnectionInterface',
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param ConnectionInterface $connection
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'connection',
               'type' => 'Illuminate\\Database\\ConnectionInterface',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getSchemaBuilder',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the schema builder instance.
     *
     * @return Builder
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Schema\\Builder',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getSchemaManager',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the Doctrine schema manager instance.
     *
     * @return AbstractSchemaManager
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTablePrefix',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table prefix.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'tableExists',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @inheritDoc
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @inheritDoc
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTypeMap',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the column type mapping.
     *
     * @return array<string, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => true,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mapColumnType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Map database type to PHP type.
     *
     * @param string $databaseType
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'databaseType',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getForeignKeyDefinition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get foreign key definition.
     *
     * @param array<string, mixed> $foreignKey
     * @return array{table: string, column: string}
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'foreignKey',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'determineRelationshipType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Determine relationship type based on foreign key.
     *
     * @param array<string, mixed> $foreignKey
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'foreignKey',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRelationshipDefinition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get relationship definition.
     *
     * @param array<string, mixed> $foreignKey
     * @return array{type: string, foreignTable: string, foreignKey: string, localKey: string}
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'foreignKey',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getCastType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cast type for a column type.
     *
     * @param string $type
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'abstractschemamanager' => 'Doctrine\\DBAL\\Schema\\AbstractSchemaManager',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\Schema\\SchemaAnalyzerInterface',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'connection',
               'type' => 'Illuminate\\Database\\ConnectionInterface',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyze',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Analyze the schema of a table.
     *
     * @param string $table
     * @return TableSchema
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTypeMap',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @inheritDoc
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getCastType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cast type for a column type.
     *
     * @param string $type
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mapColumnType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Maps MySQL column types to PHP types.
     *
     * @param string $type
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\PostgreSQLSchemaAnalyzer',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyze',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @inheritDoc
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyzeColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Analyze table columns.
     *
     * @param string $table
     * @return array<string, array{type: string, nullable: bool, primary?: bool, unique?: bool, index?: bool, foreign?: array{table: string, column: string}, default?: mixed}>
     * @throws \\Exception
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyzeRelationships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Analyze table relationships.
     *
     * @param string $table
     * @return array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}>
     * @throws \\Exception
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTypeMap',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @inheritDoc
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'determineRelationshipType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @inheritDoc
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'foreignKey',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getCastType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cast type for a column type.
     *
     * @param string $type
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'connection' => 'Illuminate\\Database\\Connection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\SQLiteSchemaAnalyzer',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new SQLite schema analyzer instance.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'connection',
               'type' => 'Illuminate\\Database\\ConnectionInterface',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyze',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Analyze a table\'s schema.
     *
     * @param string $table
     * @return array<string, mixed>
     * @throws ModelGeneratorSchemaAnalyzerException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mapColumnType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Maps SQLite column types to PHP types.
     *
     * @param string $type
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTypeMap',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @inheritDoc
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyzeColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param Table $table
     * @return array<string, array<string, mixed>>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Doctrine\\DBAL\\Schema\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyzeRelationships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param string $table
     * @param array<ForeignKeyConstraint> $foreignKeys
     * @return array<array<string, mixed>>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'str' => 'Illuminate\\Support\\Str',
              'modelgeneratorschemaanalyzerexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorSchemaAnalyzerException',
              'foreignkeyconstraint' => 'Doctrine\\DBAL\\Schema\\ForeignKeyConstraint',
              'table' => 'Doctrine\\DBAL\\Schema\\Table',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'foreignKeys',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SchemaAnalyzerInterface.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\SchemaAnalyzerInterface',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyze',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Analyze the schema of a table.
     *
     * @param string $table
     * @return TableSchema
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables.
     *
     * @return array<string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'tableschema' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ValidationRuleGenerator.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\ValidationRuleGenerator',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate validation rules for a model based on its schema.
     *
     * @param array $schema
     * @return array<string, string|array>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'blueprint' => 'Illuminate\\Database\\Schema\\Blueprint',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateColumnRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate validation rules for a specific column.
     *
     * @param string $column
     * @param array $definition
     * @param string $tableName
     * @return string|array
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'blueprint' => 'Illuminate\\Database\\Schema\\Blueprint',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string|array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'column',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tableName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTypeRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get validation rules based on column type.
     *
     * @param array $definition
     * @return array
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'blueprint' => 'Illuminate\\Database\\Schema\\Blueprint',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generateMessages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate validation messages for a model based on its schema.
     *
     * @param array $schema
     * @return array<string, string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'blueprint' => 'Illuminate\\Database\\Schema\\Blueprint',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'addTypeSpecificMessages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Add type-specific validation messages.
     *
     * @param array &$messages
     * @param string $column
     * @param string $label
     * @param array $definition
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'blueprint' => 'Illuminate\\Database\\Schema\\Blueprint',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'messages',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'column',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'label',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'definition',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Builders\\ModelBuilder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'configService',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'build',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tableName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type ColumnDefinition array{
 *     type: non-empty-string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: positive-int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Support\\Collection',
          'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new model definition instance.
     *
     * @param non-empty-string $className
     * @param non-empty-string $namespace
     * @param Collection<int, Column> $columns
     * @param Collection<int, RelationDefinition> $relations
     * @param class-string|null $baseClass
     * @param bool $withSoftDeletes
     * @param bool $withValidation
     * @param bool $withRelationships
     * @param non-empty-string|null $table
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'className',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'namespace',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'Illuminate\\Support\\Collection',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'relations',
               'type' => 'Illuminate\\Support\\Collection',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'baseClass',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'withSoftDeletes',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'withValidation',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            7 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'withRelationships',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            8 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getClassName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the class name.
     *
     * @return non-empty-string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNamespace',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the namespace.
     *
     * @return non-empty-string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the columns.
     *
     * @return Collection<int, Column>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRelations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the relations.
     *
     * @return Collection<int, RelationDefinition>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getBaseClass',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the base class.
     *
     * @return class-string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withSoftDeletes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if soft deletes should be included.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withValidation',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if validation should be included.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withRelationships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if relationships should be included.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTableName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table name.
     *
     * @return non-empty-string
     * @throws \\RuntimeException If table name is not set
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setTableName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the table name.
     *
     * @param non-empty-string $table
     * @throws \\InvalidArgumentException If table name is empty
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/RelationDefinition.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'name',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'string',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'type',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'string',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => '?string',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'foreignKey',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => '?string',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'localKey',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => '?string',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'morphType',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var string|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => '?string',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'foreignKey',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'localKey',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'morphType',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Class SchemaDefinition
 *
 * Represents a database table schema with its columns and indexes.
 *
 * @package SAC\\EloquentModelGenerator\\Support\\Definitions
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Support\\Collection',
          'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
          'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new schema definition instance.
     *
     * @param string $table
     * @param Collection<int, Column> $columns
     * @param Collection<int, Index> $indexes
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'Illuminate\\Support\\Collection',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'indexes',
               'type' => 'Illuminate\\Support\\Collection',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table name.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the columns.
     *
     * @return Collection<int, Column>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIndexes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the indexes.
     *
     * @return Collection<int, Index>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNullableColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all nullable columns.
     *
     * @return Collection<int, Column>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRequiredColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all required columns.
     *
     * @return Collection<int, Column>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumnsByType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all columns of a specific type.
     *
     * @return Collection<int, Column>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIndexesForColumn',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all indexes that include a specific column.
     *
     * @return Collection<int, Index>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columnName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasPrimaryKey',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the schema has a primary key.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toString',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a string representation of the schema.
     *
     * @return string A formatted string representation of the schema including table name, columns, and indexes
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Definitions',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-type ColumnDefinition array{
 *     type: string,
 *     nullable?: bool,
 *     unsigned?: bool,
 *     length?: int|null,
 *     total?: int|null,
 *     places?: int|null,
 *     allowed?: array<string>|null,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     default?: string|null
 * }
 *
 * @phpstan-type RelationshipDefinition array{
 *     type: string,
 *     model?: string|null,
 *     foreignKey?: string|null,
 *     localKey?: string|null,
 *     morphType?: string|null
 * }
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Factories',
         'uses' => 
        array (
          'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
          'schemadefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
          'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
          'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
          'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
          'collection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'createModelDefinition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a model definition from table schema
     *
     * @param string $table
     * @param array<string, ColumnDefinition> $columns
     * @param array<string, RelationshipDefinition> $relations
     * @return ModelDefinition
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Factories',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'schemadefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
              'collection' => 'Illuminate\\Support\\Collection',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'relations',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'createSchema',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a schema definition from table schema
     *
     * @param string $table
     * @param array<string, ColumnDefinition> $columns
     * @param array<string, array{type: string, columns: array<string>}> $indexes
     * @return SchemaDefinition
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Factories',
             'uses' => 
            array (
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'schemadefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
              'relationdefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\RelationDefinition',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
              'index' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
              'collection' => 'Illuminate\\Support\\Collection',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'indexes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new generated model result instance.
     *
     * @param string $className
     * @param string $namespace
     * @param string $tableName
     * @param string $baseClass
     * @param string $content
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Results',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'className',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'namespace',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tableName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'baseClass',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'content',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getClassName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the class name.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Results',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNamespace',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the namespace.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Results',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTableName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table name.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Results',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getBaseClass',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the base class.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Results',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getContent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the model content.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Support\\Results',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasModelValidation.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'traitName' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasModelValidation',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasRelationships.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'traitName' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasValidation.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'traitName' => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Templates\\CachedModelTemplate',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Templates\\ModelTemplate',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new cached model template instance.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Templates',
             'uses' => 
            array (
              'cache' => 'Illuminate\\Support\\Facades\\Cache',
              'view' => 'Illuminate\\Support\\Facades\\View',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'config',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'render',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Render a model template.
     *
     * @param GeneratedModel $model
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Templates',
             'uses' => 
            array (
              'cache' => 'Illuminate\\Support\\Facades\\Cache',
              'view' => 'Illuminate\\Support\\Facades\\View',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTemplatePath',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the template path.
     *
     * @return non-empty-string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Templates',
             'uses' => 
            array (
              'cache' => 'Illuminate\\Support\\Facades\\Cache',
              'view' => 'Illuminate\\Support\\Facades\\View',
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
              'configurationservice' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/ModelTemplate.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Templates\\ModelTemplate',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'render',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Render a model template.
     *
     * @param GeneratedModel $model
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Templates',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTemplatePath',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the template path.
     *
     * @return string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Templates',
             'uses' => 
            array (
              'generatedmodel' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/BenchmarkResult.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'durationMs',
               'type' => 'float',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'memoryPeakBytes',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'result',
               'type' => '?mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDurationMs',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getMemoryPeakBytes',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getResult',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'mixed',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Class Column
 *
 * Represents a database column with its properties and attributes.
 *
 * @package SAC\\EloquentModelGenerator\\ValueObjects
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new column instance.
     *
     * @param string $name The name of the column
     * @param string $type The SQL type of the column
     * @param bool $isPrimary Whether this is a primary key column
     * @param bool $isAutoIncrement Whether this column auto-increments
     * @param bool $isNullable Whether this column can be null
     * @param bool $isUnique Whether this column has a unique constraint
     * @param string|null $default The default value for this column
     * @param int|null $length The length/size of the column
     * @param array<string>|null $enumValues The possible values for enum columns
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'isPrimary',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'isAutoIncrement',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'isNullable',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'isUnique',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            7 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'length',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            8 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'enumValues',
               'type' => '?array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the column name.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the column type.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isPrimary',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the column is primary.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isAutoIncrement',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the column is auto-incrementing.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isNullable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the column is nullable.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isUnique',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the column is unique.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDefault',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the column default value.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getLength',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the column length.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getEnumValues',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the enum values.
     *
     * @return array<string>|null
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toString',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a string representation of the column.
     *
     * @return string A formatted string containing the column name, type, and attributes
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Class Index
 *
 * Represents a database index with its properties and columns.
 *
 * @package SAC\\EloquentModelGenerator\\ValueObjects
 */',
         'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new index instance.
     *
     * @param string $name The name of the index
     * @param string $type The type of index (e.g., \'primary\', \'unique\', \'index\')
     * @param array<int, string> $columns The columns included in the index
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the index name.
     *
     * @return string The name of the index
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the index type.
     *
     * @return string The type of the index
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the index columns.
     *
     * @return array<int, string> The columns included in the index
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasColumn',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the index has a specific column.
     *
     * @param string $column The column name to check
     * @return bool True if the column is part of this index
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'column',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getFirstColumn',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the first column of the index.
     *
     * @return string|null The first column name or null if the index has no columns
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new instance with a different name.
     *
     * @param string $name The new index name
     * @return self A new Index instance with the updated name
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a new instance with different columns.
     *
     * @param array<int, string> $columns The new columns for the index
     * @return self A new Index instance with the updated columns
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toString',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a string representation of the index.
     *
     * @return string A formatted string containing the index name, type, and columns
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param string $tableName
     * @param array<Column> $columns
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tableName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'columns',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTableName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table name.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumns',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the columns.
     *
     * @return array<Column>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Convert the schema to an array.
     *
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool
     *     }>,
     *     indexes?: array<string, array{
     *         type: string,
     *         columns: array<string>
     *     }>,
     *     foreignKeys?: array<string, array{
     *         table: string,
     *         columns: array<string, string>
     *     }>
     * }
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\ValueObjects',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
