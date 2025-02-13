<?php

namespace SAC\EloquentModelGenerator\Tests\Unit\Support\Traits;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\AssertModelCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\AsEncryptedArrayObject;
use Illuminate\Database\Eloquent\Casts\AsEncryptedCollection;
use InvalidArgumentException;
use stdClass;

class AssertModelCastingTest extends TestCase {
    use AssertModelCasting;

    protected function setUp(): void {
        parent::setUp();
    }

    public function test_assert_has_cast(): void {
        $model = new class extends Model {
            protected $casts = ['foo' => 'string'];
        };

        $this->assertHasCast($model, 'foo', 'string');

        // Test with custom message
        $this->assertHasCast($model, 'foo', 'string', 'Custom message');
    }

    public function test_assert_has_casts(): void {
        $model = new class extends Model {
            protected $casts = [
                'foo' => 'string',
                'bar' => 'integer',
                'baz' => 'boolean'
            ];
        };

        $this->assertHasCasts($model, [
            'foo' => 'string',
            'bar' => 'integer',
            'baz' => 'boolean'
        ]);
    }

    public function test_assert_has_date_cast(): void {
        $model = new class extends Model {
            protected $casts = [
                'created_at' => 'datetime',
                'updated_at' => 'datetime:Y-m-d',
                'deleted_at' => 'timestamp',
                'birth_date' => 'date',
                'immutable_date' => 'immutable_datetime'
            ];
        };

        // Test generic date cast assertions
        $this->assertHasDateCast($model, 'created_at');
        $this->assertHasDateCast($model, 'deleted_at');
        $this->assertHasDateCast($model, 'birth_date');
        $this->assertHasDateCast($model, 'immutable_date');

        // Test specific format
        $this->assertHasDateCast($model, 'updated_at', 'datetime:Y-m-d');
    }

    public function test_assert_has_json_cast(): void {
        $model = new class extends Model {
            protected $casts = [
                'settings' => 'array',
                'options' => 'json',
                'data' => 'object',
                'items' => 'collection',
                'custom_array' => AsArrayObject::class,
                'custom_collection' => AsCollection::class
            ];
        };

        // Test basic JSON casts
        $this->assertHasJsonCast($model, 'settings');
        $this->assertHasJsonCast($model, 'options');
        $this->assertHasJsonCast($model, 'data');
        $this->assertHasJsonCast($model, 'items');

        // Test with specific classes
        $this->assertHasJsonCast($model, 'custom_array', AsArrayObject::class);
        $this->assertHasJsonCast($model, 'custom_collection', AsCollection::class);
    }

    public function test_assert_has_encrypted_cast(): void {
        $model = new class extends Model {
            protected $casts = [
                'secret' => 'encrypted',
                'secret_array' => 'encrypted:array',
                'secret_collection' => 'encrypted:collection',
                'secret_object' => 'encrypted:object',
                'custom_encrypted_array' => AsEncryptedArrayObject::class,
                'custom_encrypted_collection' => AsEncryptedCollection::class
            ];
        };

        // Test basic encrypted casts
        $this->assertHasEncryptedCast($model, 'secret');
        $this->assertHasEncryptedCast($model, 'secret_array');
        $this->assertHasEncryptedCast($model, 'secret_collection');
        $this->assertHasEncryptedCast($model, 'secret_object');

        // Test with specific classes
        $this->assertHasEncryptedCast($model, 'custom_encrypted_array', AsEncryptedArrayObject::class);
        $this->assertHasEncryptedCast($model, 'custom_encrypted_collection', AsEncryptedCollection::class);
    }

    public function test_assert_has_custom_cast(): void {
        $customCastClass = new class {
            public function get($model, $key, $value, $attributes) {
                return $value;
            }
            public function set($model, $key, $value, $attributes) {
                return [$key => $value];
            }
        };

        $customCastClassName = get_class($customCastClass);

        $model = new class extends Model {
            protected $casts = [];
        };
        $model->mergeCasts(['custom' => $customCastClassName]);

        $this->assertHasCustomCast($model, 'custom', $customCastClassName);
    }

    public function test_throws_exception_for_non_existent_model_class(): void {
        expect(fn() => $this->assertHasCast('NonExistentModel', 'foo', 'string'))
            ->toThrow(InvalidArgumentException::class, 'Model class NonExistentModel does not exist');
    }

    public function test_throws_exception_for_invalid_model(): void {
        $notAModel = new class {
            public function getCasts() {
                return [];
            }
        };

        expect(fn() => $this->getModelCasts($notAModel))
            ->toThrow(InvalidArgumentException::class, 'Invalid model provided');
    }

    public function test_throws_exception_for_missing_cast(): void {
        $model = new class extends Model {
            protected $casts = [];
        };

        expect(fn() => $this->assertHasCast($model, 'non_existent', 'string'))
            ->toThrow(\Exception::class);
    }

    public function test_throws_exception_for_mismatched_cast_type(): void {
        $model = new class extends Model {
            protected $casts = ['foo' => 'string'];
        };

        expect(fn() => $this->assertHasCast($model, 'foo', 'integer'))
            ->toThrow(\Exception::class);
    }
}
