<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1739491169,
	'meta' => array (
  'cacheVersion' => 'v12-linesToIgnore',
  'phpstanVersion' => '2.1.5',
  'metaExtensions' => 
  array (
  ),
  'phpVersion' => 80403,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional, Illuminate\\Http\\Request, Illuminate\\Support\\Optional, SAC\\EloquentModelGenerator\\ValueObjects\\Column, SAC\\EloquentModelGenerator\\ValueObjects\\ModelDefinition], earlyTerminatingFunctionCalls: [abort, dd, abort, dd, dump, exit, die], mixinExcludeClasses: [Eloquent, Eloquent, Illuminate\\Database\\Eloquent\\Model], bootstrapFiles: [/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/larastan/larastan/bootstrap.php], checkOctaneCompatibility: true, noEnvCallsOutsideOfConfig: true, noModelMake: false, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [all, get, toArray], noUnnecessaryCollectionCallExcept: [], squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: true, disableSchemaScan: true, viewDirectories: [], checkModelProperties: true, checkUnusedViews: false, checkModelAppends: true, level: 1, paths: [/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src], checkPhpDocMissingReturn: true, treatPhpDocTypesAsCertain: false, checkMissingCallableSignature: false, excludePaths: {analyseAndScan: [/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/tests/tmp/*, /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/tests/*, /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/build/*, /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/*, *.blade.php], analyse: []}, tmpDir: /Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/build/phpstan, checkUnionTypes: false, checkImplicitMixed: false, checkBenevolentUnionTypes: false, checkExplicitMixed: false, inferPrivatePropertyTypeFromConstructor: false, reportMaybesInMethodSignatures: false, reportStaticMethodSignatures: false}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: [{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\Extension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationFindExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFindExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\BuilderModelFindExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\LiteralExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterRejectDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @currentPhpVersionSimpleDirectParser, reflectionProvider: @reflectionProvider}}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\PhpMyAdminDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}]}',
  'analysedPaths' => 
  array (
    0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/composer.lock' => '3ff44d7892ed062154fe856e3d5e6b750715be8a',
  ),
  'composerInstalled' => 
  array (
    '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'amphp/amp' => 
        array (
          'pretty_version' => 'v3.1.0',
          'version' => '3.1.0.0',
          'reference' => '7cf7fef3d667bfe4b2560bc87e67d5387a7bcde9',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/amp',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/byte-stream' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'daa00f2efdbd71565bf64ffefa89e37542addf93',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/byte-stream',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/cache' => 
        array (
          'pretty_version' => 'v2.0.1',
          'version' => '2.0.1.0',
          'reference' => '46912e387e6aa94933b61ea1ead9cf7540b7797c',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/dns' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => '78eb3db5fc69bf2fc0cb503c4fcba667bc223c71',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/dns',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/parallel' => 
        array (
          'pretty_version' => 'v2.3.1',
          'version' => '2.3.1.0',
          'reference' => '5113111de02796a782f5d90767455e7391cca190',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/parallel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/parser' => 
        array (
          'pretty_version' => 'v1.1.1',
          'version' => '1.1.1.0',
          'reference' => '3cf1f8b32a0171d4b1bed93d25617637a77cded7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/pipeline' => 
        array (
          'pretty_version' => 'v1.2.2',
          'version' => '1.2.2.0',
          'reference' => '97cbf289f4d8877acfe58dd90ed5a4370a43caa4',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/pipeline',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/process' => 
        array (
          'pretty_version' => 'v2.0.3',
          'version' => '2.0.3.0',
          'reference' => '52e08c09dec7511d5fbc1fb00d3e4e79fc77d58d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/serialization' => 
        array (
          'pretty_version' => 'v1.0.0',
          'version' => '1.0.0.0',
          'reference' => '693e77b2fb0b266c3c7d622317f881de44ae94a1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/serialization',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/socket' => 
        array (
          'pretty_version' => 'v2.3.1',
          'version' => '2.3.1.0',
          'reference' => '58e0422221825b79681b72c50c47a930be7bf1e1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/socket',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/sync' => 
        array (
          'pretty_version' => 'v2.3.0',
          'version' => '2.3.0.0',
          'reference' => '217097b785130d77cfcc58ff583cf26cd1770bf1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../amphp/sync',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'brianium/paratest' => 
        array (
          'pretty_version' => 'v7.7.0',
          'version' => '7.7.0.0',
          'reference' => '4fb3f73bc5a4c3146bac2850af7dc72435a32daf',
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
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
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
        'daverandom/libdns' => 
        array (
          'pretty_version' => 'v2.1.0',
          'version' => '2.1.0.0',
          'reference' => 'b84c94e8fe6b7ee4aecfe121bfe3b6177d303c8a',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../daverandom/libdns',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'dealerdirect/phpcodesniffer-composer-installer' => 
        array (
          'pretty_version' => 'v1.0.0',
          'version' => '1.0.0.0',
          'reference' => '4be43904336affa5c2f70744a348312336afd0da',
          'type' => 'composer-plugin',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../dealerdirect/phpcodesniffer-composer-installer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
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
        'dnoegel/php-xdg-base-dir' => 
        array (
          'pretty_version' => 'v0.1.1',
          'version' => '0.1.1.0',
          'reference' => '8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../dnoegel/php-xdg-base-dir',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/coding-standard' => 
        array (
          'pretty_version' => '12.0.0',
          'version' => '12.0.0.0',
          'reference' => '1b2b7dc58c68833af481fb9325c25abd40681c79',
          'type' => 'phpcodesniffer-standard',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../doctrine/coding-standard',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
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
        'felixfbecker/advanced-json-rpc' => 
        array (
          'pretty_version' => 'v3.2.1',
          'version' => '3.2.1.0',
          'reference' => 'b5f37dbff9a8ad360ca341f3240dc1c168b45447',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../felixfbecker/advanced-json-rpc',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'felixfbecker/language-server-protocol' => 
        array (
          'pretty_version' => 'v1.5.3',
          'version' => '1.5.3.0',
          'reference' => 'a9e113dbc7d849e35b8776da39edaf4313b7b6c9',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../felixfbecker/language-server-protocol',
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
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.9.2',
          'version' => '7.9.2.0',
          'reference' => 'd281ed313b989f213357e3be1a179f02196ac99b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => 'f9c436286ab2892c7db7be8c8da4ef61ccf7b455',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.7.0',
          'version' => '2.7.0.0',
          'reference' => 'a70f5c95fb43bc83f07c9c948baa0dc1829bf201',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../guzzlehttp/psr7',
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
        'halleck45/php-metrics' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'halleck45/phpmetrics' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
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
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/concurrency' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v11.42.1',
          ),
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
        'kelunik/certificate' => 
        array (
          'pretty_version' => 'v1.1.3',
          'version' => '1.1.3.0',
          'reference' => '7e00d498c264d5eb4f78c69f41c8bd6719c0199e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../kelunik/certificate',
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
          'pretty_version' => 'v3.0.4',
          'version' => '3.0.4.0',
          'reference' => 'b394eba5805727423071fac9b53ea50dd7e920f4',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v11.42.1',
          'version' => '11.42.1.0',
          'reference' => 'ff392f42f6c55cc774ce75553a11c6b031da67f8',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/installer' => 
        array (
          'pretty_version' => 'v5.11.2',
          'version' => '5.11.2.0',
          'reference' => '2cd77ac1acddbdac01bb02b028280a3aebde878a',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/installer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/pail' => 
        array (
          'pretty_version' => 'v1.2.2',
          'version' => '1.2.2.0',
          'reference' => 'f31f4980f52be17c4667f3eafe034e6826787db2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/pail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.3.5',
          'version' => '0.3.5.0',
          'reference' => '57b8f7efe40333cdb925700891c7d7465325d3b1',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v2.0.3',
          'version' => '2.0.3.0',
          'reference' => 'f379c13663245f7aa4512a7869f62eb14095f23f',
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
        'league/uri' => 
        array (
          'pretty_version' => '7.5.1',
          'version' => '7.5.1.0',
          'reference' => '81fb5145d2644324614cc532b28efd0215bda430',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../league/uri',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri-interfaces' => 
        array (
          'pretty_version' => '7.5.0',
          'version' => '7.5.0.0',
          'reference' => '08cfc6c4f3d811584fb09c37e2849e6a7f9b0742',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../league/uri-interfaces',
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
          'pretty_version' => '3.8.5',
          'version' => '3.8.5.0',
          'reference' => 'b1a53a27898639579a67de42e8ced5d5386aa9a4',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'netresearch/jsonmapper' => 
        array (
          'pretty_version' => 'v4.5.0',
          'version' => '4.5.0.0',
          'reference' => '8e76efb98ee8b6afc54687045e1b8dba55ac76e5',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../netresearch/jsonmapper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
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
          'pretty_version' => 'v5.4.0',
          'version' => '5.4.0.0',
          'reference' => '447a020a1f875a434d62f2a401f53b82a396e494',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.6.1',
          'version' => '8.6.1.0',
          'reference' => '86f003c132143d5a2ab214e19933946409e0cae7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.3.0',
          'version' => '2.3.0.0',
          'reference' => '52915afe6a1044e8b9cee1bcff836fb63acf9cda',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'openmetrics-php/exposition-text' => 
        array (
          'pretty_version' => 'v0.4.1',
          'version' => '0.4.1.0',
          'reference' => 'fcfca38f693e168f4520bbd359d91528bbb9a8e8',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../openmetrics-php/exposition-text',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/canvas' => 
        array (
          'pretty_version' => 'v9.2.1',
          'version' => '9.2.1.0',
          'reference' => '2c85fe48e31fd9976a10df7993c1ad744bede42d',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/canvas',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/canvas-core' => 
        array (
          'pretty_version' => 'v9.1.0',
          'version' => '9.1.0.0',
          'reference' => '9c8dbbe897caba072ba46c6516ad7fb4bc86d8b7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/canvas-core',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/testbench' => 
        array (
          'pretty_version' => 'v9.9.0',
          'version' => '9.9.0.0',
          'reference' => '2f3e8c687ca5c0bd4d8bc91c4448983d046ba32b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/testbench',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/testbench-core' => 
        array (
          'pretty_version' => 'v9.9.4',
          'version' => '9.9.4.0',
          'reference' => '473974c6ce2c6b10d65ff6b6f4106aa7939021f0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../orchestra/testbench-core',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/workbench' => 
        array (
          'pretty_version' => 'v9.13.1',
          'version' => '9.13.1.0',
          'reference' => '35b63587694b2783e14fdb84ba58a50912420f5c',
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
          'pretty_version' => 'v3.7.4',
          'version' => '3.7.4.0',
          'reference' => '4a987d3d5c4e3ba36c76fecbf56113baac2d1b2b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin' => 
        array (
          'pretty_version' => 'v3.0.0',
          'version' => '3.0.0.0',
          'reference' => 'e79b26c65bc11c41093b10150c1341cc5cdbea83',
          'type' => 'composer-plugin',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest-plugin',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-arch' => 
        array (
          'pretty_version' => 'v3.0.0',
          'version' => '3.0.0.0',
          'reference' => '0a27e55a270cfe73d8cb70551b91002ee2cb64b0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest-plugin-arch',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-mutate' => 
        array (
          'pretty_version' => 'v3.0.5',
          'version' => '3.0.5.0',
          'reference' => 'e10dbdc98c9e2f3890095b4fe2144f63a5717e08',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../pestphp/pest-plugin-mutate',
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
        'phpmetrics/phpmetrics' => 
        array (
          'pretty_version' => 'v3.0.0rc8',
          'version' => '3.0.0.0-RC8',
          'reference' => '7111fe26c10092ed73c88fd325b43ddcd1b08558',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpmetrics/phpmetrics',
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
          'pretty_version' => '1.33.0',
          'version' => '1.33.0.0',
          'reference' => '82a311fd3690fb2bf7b64d5c98f912b3dd746140',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpstan/phpdoc-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '2.1.5',
          'version' => '2.1.5.0',
          'reference' => '451b17f9665481ee502adc39be987cb71067ece2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.8',
          'version' => '11.0.8.0',
          'reference' => '418c59fd080954f8c4aa5631d9502ecda2387118',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.1.0',
          'version' => '5.1.0.0',
          'reference' => '118cfaaa8bc5aef3287bf315b6060b1174754af6',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.1',
          'version' => '5.0.1.0',
          'reference' => 'c1ca3814734c07492b3d4c5f794f4b0995333da2',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '3e0404dc6b300e6bf56415467ebcb3fe4f33e964',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => '3b415def83fbcb41f991d9ebf16ae4ad8b7837b3',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.5.3',
          'version' => '11.5.3.0',
          'reference' => '30e319e578a7b5da3543073e30002bf82042f701',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psalm/psalm' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '6.5.1',
          ),
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
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => 
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
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
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
        'rector/rector' => 
        array (
          'pretty_version' => '2.0.9',
          'version' => '2.0.9.0',
          'reference' => '4393230e478c0006795770fe74c223b5c64ed68c',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../rector/rector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'rector/swiss-knife' => 
        array (
          'pretty_version' => '2.1.10',
          'version' => '2.1.10.0',
          'reference' => '04ac1df12474cb532de40a68bcd12c29d90ac97b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../rector/swiss-knife',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'revolt/event-loop' => 
        array (
          'pretty_version' => 'v1.0.6',
          'version' => '1.0.6.0',
          'reference' => '25de49af7223ba039f64da4ae9a28ec2d10d0254',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../revolt/event-loop',
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
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '15c5dd40dc4f38794d383bb95465193f5e0ae180',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'ee88b0cdbe74cf8dd3b54940ff17643c0d6543ca',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '183a9b2632194febd219bb9246eee421dad8d45e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.3.0',
          'version' => '6.3.0.0',
          'reference' => 'd4e47a769525c4dd38cea90e5dcd435ddbbc7115',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'ee41d384ab1906c68852636b6de493846e13e5a0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => 'b4ccd857127db5d41a5b676f24b51371d76d8544',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.2.0',
          'version' => '7.2.0.0',
          'reference' => '855f3ae0ab316bbafe1ba4e16e9f3c078d24a0c5',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.3.0',
          'version' => '6.3.0.0',
          'reference' => '3473f61172093b2da7de1fb5782e1f24cc036dc3',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.2',
          'version' => '7.0.2.0',
          'reference' => '3be331570a721f9a4b5917f4209773de17f747d7',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => 'd36ad0d782e5756913e42ad87cb2890f4ffe467a',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'f5b498e631a74204185071eb41f33f38d64608aa',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '6e1a43b411b2ad34146dee7524cb13a068bb35f9',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => '694d156164372abbd149a4b85ccda2e4670c0e16',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.1.0',
          'version' => '5.1.0.0',
          'reference' => '461b9c5da241511a2a0e8f240814fb23ce5c0aac',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.2',
          'version' => '5.0.2.0',
          'reference' => 'c687e3387b99f5b03b6caa64c74b63e2936ff874',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'slevomat/coding-standard' => 
        array (
          'pretty_version' => '8.15.0',
          'version' => '8.15.0.0',
          'reference' => '7d1d957421618a3803b593ec31ace470177d7817',
          'type' => 'phpcodesniffer-standard',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../slevomat/coding-standard',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/array-to-xml' => 
        array (
          'pretty_version' => '3.4.0',
          'version' => '3.4.0.0',
          'reference' => '7dcfc67d60b0272926dabad1ec01f6b8a5fb5e67',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../spatie/array-to-xml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'squizlabs/php_codesniffer' => 
        array (
          'pretty_version' => '3.11.3',
          'version' => '3.11.3.0',
          'reference' => 'ba05f990e79cbe69b9f35c8c1ac8dca7eecc3a10',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../squizlabs/php_codesniffer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'staabm/side-effects-detector' => 
        array (
          'pretty_version' => '1.0.5',
          'version' => '1.0.5.0',
          'reference' => 'd8334211a140ce329c13726d4a715adbddd0a163',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../staabm/side-effects-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => 'b81435fbd6648ea425d1ee96a2d8e68f4ceacd24',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
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
          'pretty_version' => 'v7.2.1',
          'version' => '7.2.1.0',
          'reference' => 'fefcc18c0f5d0efe3ab3152f15857298868dc2c3',
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
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => '959a74d044a6db21f4caa6d695648dcb5584cb49',
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
          'pretty_version' => 'v7.2.2',
          'version' => '7.2.2.0',
          'reference' => '87a71856f2f56e4100373e92529eed3171695cfb',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => 'ee1b504b8926198be89d05e5b6fc4c3810c090f0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => 'caae9807f8e25a9b43ce8cc6fafab6cf91f0cc9b',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => 'f3871b182c44997cf039f3b462af4a48fb85f9d3',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => '2fc3b4bd67e4747e45195bc4c98bea4628476204',
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
        'symfony/polyfill-php84' => 
        array (
          'pretty_version' => 'v1.31.0',
          'version' => '1.31.0.0',
          'reference' => 'e5493eb51311ab0b1cc2243416613f06ed8f18bd',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/polyfill-php84',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
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
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => 'd34b22ba9390ec19d2dd966c40aa9e8462f27a7e',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => 'ee9a67edc6baa33e5fae662f94f91fd262930996',
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
          'pretty_version' => 'v7.2.2',
          'version' => '7.2.2.0',
          'reference' => 'e2674a30132b7cc4d74540d6c2573aa363f05923',
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
          'pretty_version' => 'v7.2.0',
          'version' => '7.2.0.0',
          'reference' => '2d294d0c48df244c71c105a169d0190bfb080426',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => '82b478c69745d8878eb60f9a049a4d584996f73a',
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
          'pretty_version' => 'v7.2.3',
          'version' => '7.2.3.0',
          'reference' => 'ac238f173df0c9c1120f862d0f599e17535a87ec',
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
        'tomasvotruba/class-leak' => 
        array (
          'pretty_version' => '2.0.3',
          'version' => '2.0.3.0',
          'reference' => '4fcf2aa7c7b819bd2007b4540fe2deb89ae070a0',
          'type' => 'library',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../tomasvotruba/class-leak',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tomasvotruba/type-coverage' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'd033429580f2c18bda538fa44f2939236a990e0c',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../tomasvotruba/type-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'vimeo/psalm' => 
        array (
          'pretty_version' => '6.5.1',
          'version' => '6.5.1.0',
          'reference' => '3f17a6b24a2dbe543e21408c2b19108cf6a355ef',
          'type' => 'project',
          'install_path' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/vendor/composer/../vimeo/psalm',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Config\\AnalysisConfig::__construct() has parameter $levels with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 10,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Config\\AnalysisConfig::__construct() has parameter $options with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 10,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Config\\AnalysisConfig::__construct() has parameter $tools with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 10,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Config\\AnalysisConfig::withLevels() has parameter $levels with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Config\\AnalysisConfig::withTools() has parameter $tools with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'line' => 69,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 69,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Config\\AnalysisConfig::withOptions() has parameter $options with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'line' => 79,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 79,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::getRectorSuggestions().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'line' => 288,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 288,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand::getHtmlResults() has parameter $results with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'line' => 417,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 417,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand::$toolManager is never read, only written.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'line' => 34,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/developing-extensions/always-read-written-properties',
       'nodeLine' => 20,
       'nodeType' => 'PHPStan\\Node\\ClassPropertiesNode',
       'identifier' => 'property.onlyWritten',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Negated boolean expression is always true.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PhpParser\\Node\\Expr\\BooleanNot',
       'identifier' => 'booleanNot.alwaysTrue',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand::getFixLevels() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'line' => 181,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 181,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand::fixIssuesForLevel() has parameter $results with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'line' => 226,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 226,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand::ensureRectorConfigs() is unused.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'line' => 381,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 20,
       'nodeType' => 'PHPStan\\Node\\ClassMethodsNode',
       'identifier' => 'method.unused',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to function is_string() with string will always evaluate to true.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'line' => 214,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 214,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'function.alreadyNarrowedType',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ModelGenerator.php' => 
  array (
    0 => 
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
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc type array<int, string> of property SAC\\EloquentModelGenerator\\Models\\BaseModel::$fillable is not covariant with PHPDoc type list<string> of overridden property Illuminate\\Database\\Eloquent\\Model::$fillable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'traitFilePath' => NULL,
       'tip' => 'You can fix 3rd party PHPDoc types with stub files:
   <fg=cyan>https://phpstan.org/user-guide/stub-files</>',
       'nodeLine' => 49,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'property.phpDocType',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc type array<int, string> of property SAC\\EloquentModelGenerator\\Models\\BaseModel::$hidden is not covariant with PHPDoc type list<string> of overridden property Illuminate\\Database\\Eloquent\\Model::$hidden.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'traitFilePath' => NULL,
       'tip' => 'You can fix 3rd party PHPDoc types with stub files:
   <fg=cyan>https://phpstan.org/user-guide/stub-files</>',
       'nodeLine' => 56,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'property.phpDocType',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc type array<int, string> of property SAC\\EloquentModelGenerator\\Models\\BaseModel::$with is not covariant with PHPDoc type list<string> of overridden property Illuminate\\Database\\Eloquent\\Model::$with.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'line' => 84,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'traitFilePath' => NULL,
       'tip' => 'You can fix 3rd party PHPDoc types with stub files:
   <fg=cyan>https://phpstan.org/user-guide/stub-files</>',
       'nodeLine' => 84,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'property.phpDocType',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Models\\BaseModel::$table (string) in isset() is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'line' => 92,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 92,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.property',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Models\\BaseModel::$table (string) in isset() is not nullable.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'line' => 104,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 104,
       'nodeType' => 'PhpParser\\Node\\Expr\\Isset_',
       'identifier' => 'isset.property',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php' => 
  array (
    0 => 
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
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateSingleRule() invoked with 1 parameter, 2 required.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 712,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 712,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'arguments.count',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $field of method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateSingleRule() expects string, array<string, array<string>|string> given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 712,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 712,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot redeclare method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateArrays().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 760,
       'canBeIgnored' => false,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 7,
       'nodeType' => 'PHPStan\\Node\\InClassNode',
       'identifier' => 'class.duplicateMethod',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot redeclare method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateSingleRule().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 782,
       'canBeIgnored' => false,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 7,
       'nodeType' => 'PHPStan\\Node\\InClassNode',
       'identifier' => 'class.duplicateMethod',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateArrays() invoked with 1 parameter, 0 required.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 784,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 784,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'arguments.count',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateSingleRule() should return bool but returns null.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 784,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 784,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Result of method SAC\\EloquentModelGenerator\\Models\\GeneratedModel::validateArrays() (void) is used.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'line' => 784,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 784,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.void',
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
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::$tools type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 12,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 12,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::$configs type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 21,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 21,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::$results type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 22,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 22,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::registerTool() has parameter $command with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::getAvailableTools() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 32,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 32,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::runTool() has parameter $options with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 36,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::runTool() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 36,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::runToolsInParallel() has parameter $options with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::runToolsInParallel() has parameter $tools with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::runToolsInParallel() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::getResults() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 87,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 87,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::getAffectedFiles() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 103,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 103,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::buildCommand() has parameter $options with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 135,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 135,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::buildCommand() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 135,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 135,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager::extractAffectedFiles() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'line' => 161,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 161,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\ConfigurationService::all() should return array<string, mixed> but returns Illuminate\\Contracts\\Config\\Repository.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 55,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
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
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #2 $factory of method SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy::updateDocBlocks() expects phpDocumentor\\Reflection\\DocBlockFactory, phpDocumentor\\Reflection\\DocBlockFactoryInterface given.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to undefined constant PhpParser\\ParserFactory::PREFER_PHP7.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
       'line' => 21,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 21,
       'nodeType' => 'PhpParser\\Node\\Expr\\ClassConstFetch',
       'identifier' => 'classConstant.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method PhpParser\\ParserFactory::create().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
       'line' => 21,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 21,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Services\\FixStrategyManager::registerDefaultStrategies() is unused.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 12,
       'nodeType' => 'PHPStan\\Node\\ClassMethodsNode',
       'identifier' => 'method.unused',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory::createModelDefinition() invoked with 4 parameters, 2-3 required.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'arguments.count',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php' => 
  array (
    0 => 
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
    1 => 
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
    2 => 
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
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\Schema\\Builder::getAllTables().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 206,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 206,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to function is_array() with array will always evaluate to true.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 297,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 297,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'function.alreadyNarrowedType',
       'metadata' => 
      array (
      ),
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to function method_exists() with Illuminate\\Database\\Schema\\Builder and \'getIndexes\' will always evaluate to true.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 329,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 329,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'function.alreadyNarrowedType',
       'metadata' => 
      array (
      ),
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to function method_exists() with Illuminate\\Database\\Schema\\Builder and \'getForeignKeys\' will always evaluate to true.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 332,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 332,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'function.alreadyNarrowedType',
       'metadata' => 
      array (
      ),
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\Connection::getDoctrineColumn().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'line' => 373,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 373,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    8 => 
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
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc tag @param has invalid value (array<string, array{type: \'primary\'|\'unique\'|\'index\'|\'fulltext\'|\'spatial\', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>} $indexes): Unexpected token "$indexes", expected \'>\' at offset 264 on line 5',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'line' => 387,
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
    3 => 
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
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php' => 
  array (
    0 => 
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
    1 => 
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
    2 => 
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
    3 => 
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
    4 => 
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
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getTablePrefix().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\ConnectionInterface::getSchemaBuilder().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\Schema\\Builder::getAllTables().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
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
    3 => 
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
    4 => 
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
    5 => 
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
    6 => 
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
    7 => 
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
    8 => 
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
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Support\\Fixes\\AbstractFixStrategy::parseError() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php',
       'line' => 61,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 61,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Support\\Fixes\\TypeHintFixer::parseCode() return type has no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'line' => 58,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 58,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to undefined constant PhpParser\\ParserFactory::ONLY_PHP7.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PhpParser\\Node\\Expr\\ClassConstFetch',
       'identifier' => 'classConstant.notFound',
       'metadata' => 
      array (
      ),
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method PhpParser\\ParserFactory::create().',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method SAC\\EloquentModelGenerator\\Support\\Fixes\\TypeHintFixer::findMethod() has parameter $ast with no value type specified in iterable type array.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 67,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property PhpParser\\Node::$expr.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'line' => 85,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 85,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc tag @var with type non-empty-string is not subtype of native type non-falsy-string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 55,
       'nodeType' => 'PHPStan\\Node\\VarTagChangedExpressionTypeNode',
       'identifier' => 'varTag.nativeType',
       'metadata' => 
      array (
      ),
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc tag @var with type non-empty-string is not subtype of native type lowercase-string&non-falsy-string.',
       'file' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PHPStan\\Node\\VarTagChangedExpressionTypeNode',
       'identifier' => 'varTag.nativeType',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Collections/ModelCollection.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Collection',
        1 => '__construct',
        2 => 20,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Collections/ModelCollection.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Config\\AnalysisConfig',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 40,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'getNamespace',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'getPath',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'getRelations',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'withValidation',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'withRelationships',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'getBaseClass',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'getDateFormat',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'getConnection',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    8 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
        1 => 'toArray',
        2 => 'SAC\\EloquentModelGenerator\\Config\\GeneratorConfig',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/GeneratorConfig.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Console\\Command',
        1 => '__construct',
        2 => 51,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'makeDirectory',
        2 => 126,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'cleanDirectory',
        2 => 128,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Laravel\\Prompts\\spin',
        1 => 277,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 308,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 348,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 381,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand',
        1 => 'getHtmlTemplate',
        2 => 'SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Console\\Command',
        1 => '__construct',
        2 => 42,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'sort',
        1 => 205,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'makeDirectory',
        2 => 269,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'copyDirectory',
        2 => 270,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'deleteDirectory',
        2 => 275,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'copyDirectory',
        2 => 276,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 304,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 330,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector',
    )),
    8 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 369,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector',
    )),
    9 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 391,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    10 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 403,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    11 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand',
        1 => 'getDefaultRectorConfig',
        2 => 'SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    12 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand',
        1 => 'getCodeQualityRectorConfig',
        2 => 'SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Console\\Command',
        1 => '__construct',
        2 => 50,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'config',
        1 => 60,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'makeDirectory',
        2 => 206,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 219,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Console\\Command',
        1 => '__construct',
        2 => 35,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'config',
        1 => 46,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Events/ModelGenerated.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Events\\ModelGenerated',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Events/ModelGenerated.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Events\\ModelGenerated',
        1 => 'getModel',
        2 => 'SAC\\EloquentModelGenerator\\Events\\ModelGenerated',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Events/ModelGenerated.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Http/Requests/GenerateModelRequest.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Http\\Requests\\GenerateModelRequest',
        1 => 'authorize',
        2 => 'SAC\\EloquentModelGenerator\\Http\\Requests\\GenerateModelRequest',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Http/Requests/GenerateModelRequest.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Http\\Requests\\GenerateModelRequest',
        1 => 'rules',
        2 => 'SAC\\EloquentModelGenerator\\Http\\Requests\\GenerateModelRequest',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Http/Requests/GenerateModelRequest.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Foundation\\Bus\\Dispatchable',
        1 => 'Illuminate\\Queue\\InteractsWithQueue',
        2 => 'Illuminate\\Bus\\Queueable',
        3 => 'Illuminate\\Queue\\SerializesModels',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitUseCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
        1 => 'getResult',
        2 => 'SAC\\EloquentModelGenerator\\Jobs\\GenerateModelJob',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/GenerateModelJob.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Foundation\\Bus\\Dispatchable',
        1 => 'Illuminate\\Queue\\InteractsWithQueue',
        2 => 'Illuminate\\Bus\\Queueable',
        3 => 'Illuminate\\Queue\\SerializesModels',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitUseCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Jobs\\ProcessModelChunkJob',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Jobs/ProcessModelChunkJob.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Attributes.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Model\\Attributes',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Attributes.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/ModelName.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Model\\ModelName',
        1 => 'toString',
        2 => 'SAC\\EloquentModelGenerator\\Model\\ModelName',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/ModelName.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Model\\Relations',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Model\\Relations',
        1 => 'getRelations',
        2 => 'SAC\\EloquentModelGenerator\\Model\\Relations',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Model/Relations.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitUseCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitUseCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitUseCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Model',
        1 => '__construct',
        2 => 95,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/BaseModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getClassName',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getNamespace',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getTableName',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getBaseClass',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getSchema',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getCasts',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getFillable',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getHidden',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    8 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getDates',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    9 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'usesSoftDeletes',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    10 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getFullyQualifiedClassName',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    11 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'render',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    12 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getValidationMessages',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    13 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
        1 => 'getContent',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'getType',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'getLength',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'isNullable',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'getDefault',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'isUnsigned',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'isAutoIncrement',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    8 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'isPrimaryKey',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    9 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
        1 => 'isUnique',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelAttribute',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelAttribute.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
        1 => 'getType',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
        1 => 'getModel',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
        1 => 'getForeignKey',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
        1 => 'getLocalKey',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
        1 => 'getParameters',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
        1 => 'toArray',
        2 => 'SAC\\EloquentModelGenerator\\Models\\GeneratedModelRelation',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModelRelation.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 46,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
        1 => 'getResults',
        2 => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 132,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'preg_match_all',
        1 => 163,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmarking/PerformanceBenchmark.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\Benchmarking\\PerformanceBenchmark',
        1 => 'getBenchmarks',
        2 => 'SAC\\EloquentModelGenerator\\Services\\Benchmarking\\PerformanceBenchmark',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Benchmarking/PerformanceBenchmark.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
        1 => 'all',
        2 => 'SAC\\EloquentModelGenerator\\Services\\ConfigurationService',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ConfigurationService.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator',
        1 => 'getTemplate',
        2 => 'SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator',
        1 => 'getCastType',
        2 => 'SAC\\EloquentModelGenerator\\Services\\DefaultModelGenerator',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/DefaultModelGenerator.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
        1 => 'supportsLevel',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 27,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
        1 => 'updateDocBlocks',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PhpmdFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PhpmdFixStrategy',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PhpmdFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PhpmdFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 30,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PhpmdFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PhpmdFixStrategy',
        1 => 'supportsLevel',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PhpmdFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PhpmdFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PsalmFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PsalmFixStrategy',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PsalmFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PsalmFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 29,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PsalmFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PsalmFixStrategy',
        1 => 'supportsLevel',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PsalmFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PsalmFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/RectorFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/RectorFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
        1 => 'supportsLevel',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/RectorFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 20,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/RectorFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
        1 => 'supportsLevel',
        2 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 34,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategyManager',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Services\\ModelGenerator',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\ModelGenerator',
        1 => 'getTables',
        2 => 'SAC\\EloquentModelGenerator\\Services\\ModelGenerator',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
        1 => 'getCastType',
        2 => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
        1 => 'generateRelationMethod',
        2 => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGeneratorTemplateEngine.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Services\\ParallelModelGeneratorService',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ParallelModelGeneratorService.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
        1 => 'getForeignKeyDefinition',
        2 => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
        1 => 'getRelationshipDefinition',
        2 => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
        1 => 'getCastType',
        2 => 'SAC\\EloquentModelGenerator\\Services\\Schema\\BaseSchemaAnalyzer',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Support\\Builders\\ModelBuilder',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Builders/ModelBuilder.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'getClassName',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'getNamespace',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'getColumns',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'getRelations',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'getBaseClass',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'withSoftDeletes',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'withValidation',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
        1 => 'withRelationships',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
        1 => 'getTable',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
        1 => 'getColumns',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
        1 => 'getIndexes',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'put',
        2 => 40,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'copy',
        2 => 49,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'move',
        2 => 58,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
        1 => 'getClassName',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
        1 => 'getNamespace',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
        1 => 'getTableName',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
        1 => 'getBaseClass',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
        1 => 'getContent',
        2 => 'SAC\\EloquentModelGenerator\\Support\\Results\\GeneratedModel',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Results/GeneratedModel.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasModelValidation.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasModelValidation',
        1 => 8,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasModelValidation.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitDeclarationCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasRelationships.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasRelationships',
        1 => 15,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasRelationships.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitDeclarationCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasValidation.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Support\\Traits\\HasValidation',
        1 => 8,
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Traits/HasValidation.php',
       'collectorType' => 'PHPStan\\Rules\\Traits\\TraitDeclarationCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\Templates\\CachedModelTemplate',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Templates/CachedModelTemplate.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/BenchmarkResult.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/BenchmarkResult.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
        1 => 'getDurationMs',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/BenchmarkResult.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
        1 => 'getMemoryPeakBytes',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/BenchmarkResult.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
        1 => 'getResult',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\BenchmarkResult',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/BenchmarkResult.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'getType',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'isPrimary',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'isAutoIncrement',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    5 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'isNullable',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    6 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'isUnique',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    7 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'getDefault',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    8 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'getLength',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    9 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
        1 => 'getEnumValues',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Column.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
        1 => 'getName',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
        1 => 'getType',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    3 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
        1 => 'getColumns',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    4 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
        1 => 'getFirstColumn',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\Index',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/Index.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php' => 
  array (
    0 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector',
    )),
    1 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
        1 => 'getTableName',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
    2 => 
    \PHPStan\Collectors\CollectedData::__set_state(array(
       'data' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
        1 => 'getColumns',
        2 => 'SAC\\EloquentModelGenerator\\ValueObjects\\TableSchema',
      ),
       'filePath' => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php',
       'collectorType' => 'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector',
    )),
  ),
); },
	'dependencies' => array (
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Collections/ModelCollection.php' => 
  array (
    'fileHash' => '5daf8f61faa467dce934ad6268cbce8504c2552e',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php' => 
  array (
    'fileHash' => '698f07a0ab7d07e5383f1b33538a1ae877862074',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php' => 
  array (
    'fileHash' => '7aee1e91e6554475d003115e9fa616aa4f6eac94',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Kernel.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php' => 
  array (
    'fileHash' => '0d3b41c9ef2f893a16e2c115ea77c86dc8c87959',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/GenerateModelCommand.php' => 
  array (
    'fileHash' => 'ab72ebb5290f6795ee9d82e4cdb208844b6c04d0',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/ListTablesCommand.php' => 
  array (
    'fileHash' => '8c430222bf9bea743345f479aa252931053520d0',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Kernel.php' => 
  array (
    'fileHash' => '790b15dd3ec5c7ea9f5d023fcb57500278bcc5ed',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/FixStrategy.php' => 
  array (
    'fileHash' => '7d3bcf515709e5f731342a6b685dbffb9bf63e78',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
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
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
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
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/BaseSchemaAnalyzer.php',
      6 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
      7 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
      8 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Exceptions/ModelGeneratorSchemaAnalyzerException.php' => 
  array (
    'fileHash' => '909d25ac385351751295ed7556a8257fbf9325ed',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/SchemaAnalyzer.php',
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
    'fileHash' => '29b60486511312a837d747c2f5bc90039bdbabbe',
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
    'fileHash' => '98a9d4897be4939babc7001e8c1e2679fe3eceff',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Models/GeneratedModel.php' => 
  array (
    'fileHash' => '2b270c9d970e8823918b41b346dc3aab4ace7a2e',
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
    'fileHash' => 'c5dadf9b4cc1f68946ef1eec42a8acbd8cefd512',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php' => 
  array (
    'fileHash' => 'b276c54b9e9ad5ae0ba694f67219af983aba0199',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
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
    'fileHash' => 'fbdd080340f5094f50103761386178786fb095a9',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php' => 
  array (
    'fileHash' => '975b95d2ec5ff0ea2f0f69c00030408034d736e0',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/FixStrategyInterface.php' => 
  array (
    'fileHash' => '4111eda0a6c025e8c51ec275cd66aec8987549c2',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PhpmdFixStrategy.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PsalmFixStrategy.php',
      5 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/RectorFixStrategy.php',
      6 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php',
      7 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PhpmdFixStrategy.php' => 
  array (
    'fileHash' => '120107c55d11de569dca6a238b550268c019d25c',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PsalmFixStrategy.php' => 
  array (
    'fileHash' => '4a14a2d07584c48bdadf87ae6a32f4efaa806b4f',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/RectorFixStrategy.php' => 
  array (
    'fileHash' => '9ef180acd4c15a7d1ba33cd1ce76c2d97842d82e',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php' => 
  array (
    'fileHash' => '5996a37705e44dc02cd71aa012980f6dcf068995',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php' => 
  array (
    'fileHash' => '0d59308f6de922e18b1696eb217d6e8558a12afe',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/EloquentModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/ModelGenerator.php' => 
  array (
    'fileHash' => 'd07aa23de3b9e30588860424b6e1ec019a444583',
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
    'fileHash' => '11f602f9c0fbf4361367640b1818cb11af1632cf',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php',
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
    'fileHash' => 'de589d25e006bc9c4956ade4bdae474a2a6c64f6',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/PostgreSQLSchemaAnalyzer.php' => 
  array (
    'fileHash' => '335a6e340baf5406df2e2f8d8a71369fd03ecf9d',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Providers/ModelGeneratorServiceProvider.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SQLiteSchemaAnalyzer.php' => 
  array (
    'fileHash' => '1f1e80ab1391e5f23205069dec21e0a4b7c4f369',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php' => 
  array (
    'fileHash' => 'd052bc80b40d4e690abe559e26e75be41878029e',
    'dependentFiles' => 
    array (
      0 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php',
    ),
  ),
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php' => 
  array (
    'fileHash' => '08b4f3e48867da6369246f43936784d10b00918e',
    'dependentFiles' => 
    array (
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
      1 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/ModelDefinition.php',
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Definitions/SchemaDefinition.php',
      3 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Factories/ModelGeneratorFactory.php',
      4 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/ValueObjects/TableSchema.php',
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
      2 => '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/SchemaAnalyzerInterface.php',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Config/AnalysisConfig.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Config\\AnalysisConfig',
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
               'name' => 'targetDir',
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
               'name' => 'levels',
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
               'name' => 'tools',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
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
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'cacheKey',
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
           'name' => 'fromFile',
           'phpDoc' => NULL,
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
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toFile',
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
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withTargetDir',
           'phpDoc' => NULL,
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
               'name' => 'targetDir',
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
           'name' => 'withLevels',
           'phpDoc' => NULL,
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
               'name' => 'levels',
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
           'name' => 'withTools',
           'phpDoc' => NULL,
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
               'name' => 'tools',
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
           'name' => 'withOptions',
           'phpDoc' => NULL,
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
               'name' => 'options',
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
           'name' => 'withCacheKey',
           'phpDoc' => NULL,
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
               'name' => 'cacheKey',
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
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validate',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/AnalyzeCommand.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand',
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
              'analysisconfig' => 'SAC\\EloquentModelGenerator\\Config\\AnalysisConfig',
              'analysistoolmanager' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
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
              'analysisconfig' => 'SAC\\EloquentModelGenerator\\Config\\AnalysisConfig',
              'analysistoolmanager' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
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
              'analysisconfig' => 'SAC\\EloquentModelGenerator\\Config\\AnalysisConfig',
              'analysistoolmanager' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
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
               'name' => 'toolManager',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
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
              'analysisconfig' => 'SAC\\EloquentModelGenerator\\Config\\AnalysisConfig',
              'analysistoolmanager' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Commands/FixCommand.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand',
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
           'phpDoc' => NULL,
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
           'phpDoc' => NULL,
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
               'name' => 'toolManager',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fixManager',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategyManager',
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
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
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
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Console/Kernel.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Console\\Kernel',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Console\\Kernel',
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
            0 => 'commands',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The Artisan commands provided by your application.
     *
     * @var array<class-string>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console',
             'uses' => 
            array (
              'consolekernel' => 'Illuminate\\Foundation\\Console\\Kernel',
              'analyzecommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand',
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
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'commands',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register the commands for the application.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Console',
             'uses' => 
            array (
              'consolekernel' => 'Illuminate\\Foundation\\Console\\Kernel',
              'analyzecommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Contracts/FixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Contracts\\FixStrategy',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canFix',
           'phpDoc' => NULL,
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
               'name' => 'error',
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
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'error',
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
           'name' => 'getDescription',
           'phpDoc' => NULL,
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
           'name' => 'getPriority',
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
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param array<string, array{
     *     type: string,
     *     model: string,
     *     name: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     pivotColumns?: array<string>
     * }> $relations
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
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
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
           'name' => 'getRelations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, array{
     *     type: string,
     *     model: string,
     *     name: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     pivotColumns?: array<string>
     * }>
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
           'name' => 'addRelation',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param array{
     *     type: string,
     *     model: string,
     *     name: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     pivotColumns?: array<string>
     * } $relation
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
               'name' => 'relation',
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
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'validationRules',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The validation rules for the model.
     *
     * @var array<string, array<string>|string>
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
           'type' => 'array',
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
            0 => 'relationships',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The relationships defined for the model.
     *
     * @var array<string, array{type: string, model: string, foreignKey?: string, localKey?: string, table?: string, pivotColumns?: array<string>}>
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
           'type' => 'array',
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
        3 => 
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
        4 => 
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
        5 => 
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
        6 => 
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
        7 => 
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
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRelationships',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the relationships.
     *
     * @return array<string, array{type: string, model: string, foreignKey?: string, localKey?: string, table?: string, pivotColumns?: array<string>}>
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
        10 => 
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
        11 => 
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
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getValidationRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the validation rules.
     *
     * @return array<string, array<string>|string>
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
        13 => 
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
        14 => 
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
        15 => 
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
        16 => 
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
        17 => 
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
        18 => 
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
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setValidationRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the validation rules.
     *
     * @param array<string, array<string>|string> $rules
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
        20 => 
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
        21 => 
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
        22 => 
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
        23 => 
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
        24 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validateArrays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validate array values in validation rules
     *
     * @param array<string, string|array<string>> $rules
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
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
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
        25 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validateSingleRule',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validate a single rule
     *
     * @param string $field
     * @param string|array<string> $rule
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
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'field',
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
               'name' => 'rule',
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
              'analyzecommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand',
              'fixcommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand',
              'generatemodelcommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\GenerateModelCommand',
              'analysistoolmanager' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
              'docblockfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
              'phpmdfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PhpmdFixStrategy',
              'psalmfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PsalmFixStrategy',
              'rectorfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
              'typehintfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
              'fixstrategymanager' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategyManager',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'typehintfixer' => 'SAC\\EloquentModelGenerator\\Support\\Fixes\\TypeHintFixer',
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
              'analyzecommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\AnalyzeCommand',
              'fixcommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\FixCommand',
              'generatemodelcommand' => 'SAC\\EloquentModelGenerator\\Console\\Commands\\GenerateModelCommand',
              'analysistoolmanager' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
              'docblockfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
              'phpmdfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PhpmdFixStrategy',
              'psalmfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PsalmFixStrategy',
              'rectorfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
              'typehintfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
              'fixstrategymanager' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategyManager',
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorService',
              'modelgeneratortemplateengine' => 'SAC\\EloquentModelGenerator\\Services\\ModelGeneratorTemplateEngine',
              'typehintfixer' => 'SAC\\EloquentModelGenerator\\Support\\Fixes\\TypeHintFixer',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/AnalysisToolManager.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\AnalysisToolManager',
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
           'name' => 'registerTool',
           'phpDoc' => NULL,
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
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'command',
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
               'name' => 'configTemplate',
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
           'name' => 'getAvailableTools',
           'phpDoc' => NULL,
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
           'name' => 'runTool',
           'phpDoc' => NULL,
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
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'targetDir',
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
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'runToolsInParallel',
           'phpDoc' => NULL,
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
               'name' => 'tools',
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
               'name' => 'targetDir',
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
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getResults',
           'phpDoc' => NULL,
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
               'name' => 'tool',
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
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasIssues',
           'phpDoc' => NULL,
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
               'name' => 'tool',
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
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getAffectedFiles',
           'phpDoc' => NULL,
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
               'name' => 'tool',
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
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'ensureConfig',
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
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tool',
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
               'name' => 'targetDir',
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
     * Get all configuration values
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/DocBlockFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
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
           'name' => 'getName',
           'phpDoc' => NULL,
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
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'supportsLevel',
           'phpDoc' => NULL,
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
               'name' => 'level',
               'type' => 'int',
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
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'description',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/FixStrategyInterface.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getName',
           'phpDoc' => NULL,
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
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'supportsLevel',
           'phpDoc' => NULL,
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
               'name' => 'level',
               'type' => 'int',
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
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'description',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PhpmdFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PhpmdFixStrategy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
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
           'name' => 'getName',
           'phpDoc' => NULL,
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
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'description',
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
           'name' => 'supportsLevel',
           'phpDoc' => NULL,
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
               'name' => 'level',
               'type' => 'int',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/PsalmFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\PsalmFixStrategy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
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
           'name' => 'getName',
           'phpDoc' => NULL,
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
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'description',
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
           'name' => 'supportsLevel',
           'phpDoc' => NULL,
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
               'name' => 'level',
               'type' => 'int',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/RectorFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
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
           'name' => 'getName',
           'phpDoc' => NULL,
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
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'supportsLevel',
           'phpDoc' => NULL,
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
               'name' => 'level',
               'type' => 'int',
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
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'description',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategies/TypeHintFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
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
           'name' => 'getName',
           'phpDoc' => NULL,
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
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'supportsLevel',
           'phpDoc' => NULL,
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
               'name' => 'level',
               'type' => 'int',
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
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'description',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/FixStrategyManager.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategyManager',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'registerStrategy',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register a fix strategy.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'fixstrategyinterface' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
              'rectorfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
              'typehintfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
              'docblockfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
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
               'name' => 'strategy',
               'type' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
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
           'name' => 'getStrategiesForLevel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all registered strategies for a specific PHPStan level.
     *
     * @return array<FixStrategyInterface>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'fixstrategyinterface' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\FixStrategyInterface',
              'rectorfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\RectorFixStrategy',
              'typehintfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\TypeHintFixStrategy',
              'docblockfixstrategy' => 'SAC\\EloquentModelGenerator\\Services\\FixStrategies\\DocBlockFixStrategy',
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
               'name' => 'level',
               'type' => 'int',
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
     * @param array<string, mixed> $options
     * @return ModelDefinition
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'schemadefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
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
     * @param array<string, mixed> $config
     * @return array<int, ModelDefinition>
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'schemadefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
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
              'schemadefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
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
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool
     *     }>,
     *     relations?: array<string, array{
     *         type: string,
     *         table: string,
     *         columns: array<string, string>
     *     }>
     * }
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services',
             'uses' => 
            array (
              'modelgeneratorservice' => 'SAC\\EloquentModelGenerator\\Contracts\\ModelGeneratorService',
              'modelgeneratorfactory' => 'SAC\\EloquentModelGenerator\\Support\\Factories\\ModelGeneratorFactory',
              'modeldefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\ModelDefinition',
              'schemadefinition' => 'SAC\\EloquentModelGenerator\\Support\\Definitions\\SchemaDefinition',
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
            0 => 'tablePrefix',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
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
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
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
           'name' => 'getTablePrefix',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the table prefix.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
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
           'name' => 'getTables',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all available tables.
     *
     * @return array<string>
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
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
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasTable',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a table exists.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
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
           'name' => 'getForeignKeyDefinition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get foreign key definition.
     *
     * @return array{table: string, column: string}
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
               'name' => 'foreignTable',
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
               'name' => 'foreignColumn',
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
           'name' => 'getRelationshipDefinition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get relationship definition.
     *
     * @return array{type: string, foreignTable: string, foreignKey: string, localKey: string}
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
               'name' => 'type',
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
               'name' => 'foreignTable',
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
               'name' => 'foreignKey',
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
               'name' => 'localKey',
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
           'name' => 'mapColumnType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Map database column type to PHP type.
     *
     * @return non-empty-string
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'tableExists',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if a table exists.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'connectioninterface' => 'Illuminate\\Database\\ConnectionInterface',
              'builder' => 'Illuminate\\Database\\Schema\\Builder',
              'schemaanalyzer' => 'SAC\\EloquentModelGenerator\\Contracts\\SchemaAnalyzer',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Services/Schema/MySQLSchemaAnalyzer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Services\\Schema\\MySQLSchemaAnalyzer',
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
     * Analyze table schema.
     *
     * @param string $table
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         comment?: string|null
     *     }>,
     *     relationships: array<array{
     *         type: string,
     *         foreignTable: string,
     *         foreignKey: string,
     *         localKey: string
     *     }>
     * }
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
     * @return array<string, array{
     *     type: string,
     *     nullable: bool,
     *     default?: mixed,
     *     length?: int|null,
     *     unsigned?: bool,
     *     autoIncrement?: bool,
     *     primary?: bool,
     *     unique?: bool,
     *     comment?: string|null
     * }>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
           'name' => 'getColumnLength',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get column length.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
           'returnType' => '?int',
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
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnUnsigned',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is unsigned.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnAutoIncrement',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is auto-increment.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnPrimary',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is primary key.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnUnique',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is unique.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumnComment',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get column comment.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
     * Analyze table schema.
     *
     * @param string $table
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         comment?: string|null
     *     }>,
     *     relationships: array<array{
     *         type: string,
     *         foreignTable: string,
     *         foreignKey: string,
     *         localKey: string
     *     }>
     * }
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
     * @return array<string, array{
     *     type: string,
     *     nullable: bool,
     *     default?: mixed,
     *     length?: int|null,
     *     unsigned?: bool,
     *     autoIncrement?: bool,
     *     primary?: bool,
     *     unique?: bool,
     *     comment?: string|null
     * }>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
           'name' => 'getColumnLength',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get column length.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
           'returnType' => '?int',
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
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnAutoIncrement',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is auto-increment.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnPrimary',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is primary key.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnUnique',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is unique.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumnComment',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get column comment.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
           'name' => 'analyze',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Analyze table schema.
     *
     * @param string $table
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         comment?: string|null
     *     }>,
     *     relationships: array<array{
     *         type: string,
     *         foreignTable: string,
     *         foreignKey: string,
     *         localKey: string
     *     }>
     * }
     * @throws ModelGeneratorException
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
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
     * @return array<string, array{
     *     type: string,
     *     nullable: bool,
     *     default?: mixed,
     *     length?: int|null,
     *     unsigned?: bool,
     *     autoIncrement?: bool,
     *     primary?: bool,
     *     unique?: bool,
     *     comment?: string|null
     * }>
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
           'name' => 'getColumnLength',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get column length.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
           'returnType' => '?int',
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
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnUnsigned',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is unsigned.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnAutoIncrement',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is auto-increment.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnPrimary',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is primary key.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isColumnUnique',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if column is unique.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getColumnComment',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get column comment.
     */',
             'namespace' => 'SAC\\EloquentModelGenerator\\Services\\Schema',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Support\\Collection',
              'modelgeneratorexception' => 'SAC\\EloquentModelGenerator\\Exceptions\\ModelGeneratorException',
              'column' => 'SAC\\EloquentModelGenerator\\ValueObjects\\Column',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/AbstractFixStrategy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Fixes\\AbstractFixStrategy',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'SAC\\EloquentModelGenerator\\Contracts\\FixStrategy',
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
            0 => 'pattern',
          ),
           'phpDoc' => NULL,
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
            0 => 'priority',
          ),
           'phpDoc' => NULL,
           'type' => 'int',
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
            0 => 'description',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canFix',
           'phpDoc' => NULL,
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
               'name' => 'error',
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
           'name' => 'getPriority',
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
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDescription',
           'phpDoc' => NULL,
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
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'readFile',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
           'name' => 'writeFile',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'backupFile',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
           'name' => 'restoreFile',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'parseError',
           'phpDoc' => NULL,
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
               'name' => 'error',
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
  '/Users/s-a-c/Herd/laravel-package-dev/packages/StandAlonecomplex/EloquentModelGenerator/src/Support/Fixes/TypeHintFixer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'SAC\\EloquentModelGenerator\\Support\\Fixes\\TypeHintFixer',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'SAC\\EloquentModelGenerator\\Support\\Fixes\\AbstractFixStrategy',
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
            0 => 'pattern',
          ),
           'phpDoc' => NULL,
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
            0 => 'priority',
          ),
           'phpDoc' => NULL,
           'type' => 'int',
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
            0 => 'description',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fix',
           'phpDoc' => NULL,
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
               'name' => 'file',
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
               'name' => 'error',
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
