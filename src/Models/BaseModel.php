<?php

namespace SAC\EloquentModelGenerator\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SAC\EloquentModelGenerator\Support\Traits\HasValidation;
use SAC\EloquentModelGenerator\Support\Traits\HasRelationships;

abstract class BaseModel extends Model {
    use SoftDeletes;
    use HasValidation;
    use HasRelationships;

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
     * @var array<string, string|array>
     */
    protected array $rules = [];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(): string {
        return $this->table ?? parent::getTable();
    }

    /**
     * Get the fillable attributes for the model.
     *
     * @return array<string>
     */
    public function getFillable(): array {
        return $this->fillable;
    }

    /**
     * Set the fillable attributes for the model.
     *
     * @param array<string> $fillable
     * @return void
     */
    public function setFillable(array $fillable): void {
        $this->fillable = $fillable;
    }

    /**
     * Get the hidden attributes for the model.
     *
     * @return array<string>
     */
    public function getHidden(): array {
        return $this->hidden;
    }

    /**
     * Set the hidden attributes for the model.
     *
     * @param array<string> $hidden
     * @return void
     */
    public function setHidden(array $hidden): void {
        $this->hidden = $hidden;
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
     * @return void
     */
    public function setCasts(array $casts): void {
        $this->casts = array_merge($this->casts, $casts);
    }
}
