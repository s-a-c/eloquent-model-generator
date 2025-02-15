<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    // Create custom template directory
    if (! File::exists(resource_path('templates'))) {
        File::makeDirectory(resource_path('templates'), 0755, true);
    }
});

test('it uses custom model template', function () {
    // Create custom model template
    $customTemplate = <<<'TEMPLATE'
<?php

namespace {{ namespace }};

use {{ baseClass }};

/**
 * @package MyApp
 * @author Custom Generator
 */
class {{ className }} extends {{ baseClassName }}
{
    {{ properties }}
    {{ relations }}
}
TEMPLATE;

    File::put(resource_path('templates/model.stub'), $customTemplate);

    $generator = createModelGenerator([
        'template_path' => resource_path('templates/model.stub'),
    ]);

    $model = $generator->generate('test_users', getTestSchema());
    $content = File::get(app_path('Models/User.php'));

    expect($content)
        ->toContain('@package MyApp')
        ->toContain('@author Custom Generator');
});

test('it uses custom factory template', function () {
    $customTemplate = <<<'TEMPLATE'
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\{{ modelClass }}>
 */
class {{ factoryClass }} extends Factory
{
    // Custom factory implementation
    {{ definition }}
}
TEMPLATE;

    File::put(resource_path('templates/factory.stub'), $customTemplate);

    $generator = createModelGenerator([
        'with_factory' => true,
        'factory_template_path' => resource_path('templates/factory.stub'),
    ]);

    $model = $generator->generate('test_users', getTestSchema());

    expect(File::get(database_path('factories/UserFactory.php')))
        ->toContain('// Custom factory implementation');
});
