<?php

namespace SAC\EloquentModelGenerator\Collections;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Models\GeneratedModel;

class ModelCollection extends Collection {
    public function getModel(string $name): ?GeneratedModel {
        return $this->first(function (GeneratedModel $model) use ($name) {
            return $model->getClassName() === $name;
        });
    }

    public function addModel(GeneratedModel $model): self {
        $this->push($model);
        return $this;
    }

    public function removeModel(string $name): self {
        $this->forget($this->search(function (GeneratedModel $model) use ($name) {
            return $model->getClassName() === $name;
        }));
        return $this;
    }
}
