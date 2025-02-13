<?php

namespace SAC\EloquentModelGenerator\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Support\Traits\HasValidation;
use SAC\EloquentModelGenerator\Support\Traits\HasRelationships;

abstract class BaseModel extends Model {
    use SoftDeletes;
    use HasValidation;
    use HasRelationships;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The validation rules that apply to the model.
     *
     * @var array<string, array<string>|string>
     */
    protected $rules = [];

    /**
     * The validation error messages.
     *
     * @var array<string, string>
     */
    protected $messages = [];

    /**
     * The relationships that should be touched on save.
     *
     * @var array<int, string>
     */
    protected $touches = [];

    /**
     * The relationships that should be eager loaded.
     *
     * @var array<int, string>
     */
    protected $with = [];

    /**
     * Create a new model instance.
     *
     * @param array<string, mixed> $attributes
     */
    public function __construct(array $attributes = []) {
        if (!isset($this->table)) {
            $this->table = $this->guessTableName();
        }
        parent::__construct($attributes);
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(): string {
        if (!isset($this->table)) {
            $this->table = $this->guessTableName();
        }
        return $this->table;
    }

    /**
     * Set the table associated with the model.
     *
     * @param string $table
     * @return $this
     */
    public function setTable($table): static {
        $this->table = $table;
        return $this;
    }

    /**
     * Get the primary key for the model.
     *
     * @return string
     */
    public function getKeyName(): string {
        return $this->primaryKey;
    }

    /**
     * Set the primary key for the model.
     *
     * @param string $key
     * @return $this
     */
    public function setKeyName($key): static {
        $this->primaryKey = $key;
        return $this;
    }

    /**
     * Get the fillable attributes for the model.
     *
     * @return array<int, string>
     */
    public function getFillable(): array {
        return $this->fillable;
    }

    /**
     * Set the fillable attributes for the model.
     *
     * @param array<int, string> $fillable
     * @return $this
     */
    public function setFillable(array $fillable): static {
        $this->fillable = $fillable;
        return $this;
    }

    /**
     * Get the hidden attributes for the model.
     *
     * @return array<int, string>
     */
    public function getHidden(): array {
        return $this->hidden;
    }

    /**
     * Set the hidden attributes for the model.
     *
     * @param array<int, string> $hidden
     * @return $this
     */
    public function setHidden(array $hidden): static {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * Get the casts array.
     *
     * @return array<string, string>
     */
    public function getCasts(): array {
        return $this->casts;
    }

    /**
     * Set the casts array.
     *
     * @param array<string, string> $casts
     * @return $this
     */
    public function setCasts(array $casts): static {
        $this->casts = $casts;
        return $this;
    }

    /**
     * Get the touches array.
     *
     * @return array<int, string>
     */
    public function getTouches(): array {
        return $this->touches;
    }

    /**
     * Set the touches array.
     *
     * @param array<int, string> $touches
     * @return $this
     */
    public function setTouches(array $touches): static {
        $this->touches = $touches;
        return $this;
    }

    /**
     * Get the with array.
     *
     * @return array<int, string>
     */
    public function getWith(): array {
        return $this->with;
    }

    /**
     * Set the with array.
     *
     * @param array<int, string> $with
     * @return $this
     */
    public function setWith(array $with): static {
        $this->with = $with;
        return $this;
    }

    /**
     * Guess the table name for the model.
     *
     * @return string
     */
    protected function guessTableName(): string {
        $className = class_basename(static::class);
        return strtolower((string) preg_replace('/(?<!^)[A-Z]/', '_$0', $className));
    }
}
