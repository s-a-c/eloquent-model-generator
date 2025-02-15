<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    if (File::exists(app_path('Models'))) {
        File::deleteDirectory(app_path('Models'));
    }
});

test('it generates model file in correct location', function () {
    $generator = createModelGenerator();
    $model = $generator->generate('test_users', getTestSchema());

    $path = app_path('Models/User.php');
    expect(File::exists($path))->toBeTrue();
});

test('it generates model file with correct content', function () {
    $generator = createModelGenerator();
    $model = $generator->generate('test_users', getTestSchema());

    $content = File::get(app_path('Models/User.php'));

    expect($content)
        ->toContain('namespace App\Models;')
        ->toContain('class User extends Model')
        ->toContain('use Illuminate\Database\Eloquent\SoftDeletes')
        ->toContain('protected $fillable = [')
        ->toContain('protected $casts = [');
});

test('it does not overwrite existing model file by default', function () {
    $generator = createModelGenerator();

    // Create a custom model file
    $customContent = "<?php\n\nnamespace App\\Models;\n\nclass User extends Model\n{\n    // Custom code\n}";
    File::put(app_path('Models/User.php'), $customContent);

    expect(fn () => $generator->generate('test_users', getTestSchema()))
        ->toThrow(RuntimeException::class, 'Model file already exists');
});
