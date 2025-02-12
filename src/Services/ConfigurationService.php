<?php

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Contracts\Config\Repository;

class ConfigurationService {
    /**
     * Create a new configuration service instance.
     */
    public function __construct(
        private readonly Repository $config
    ) {
    }

    /**
     * Get a configuration value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed {
        return $this->config->get('eloquent-model-generator.' . $key, $default);
    }

    /**
     * Set a configuration value.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, mixed $value): void {
        $this->config->set('eloquent-model-generator.' . $key, $value);
    }

    /**
     * Check if a configuration value exists.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool {
        return $this->config->has('eloquent-model-generator.' . $key);
    }

    /**
     * Get all configuration values.
     *
     * @return array<string, mixed>
     */
    public function all(): array {
        return $this->config->get('eloquent-model-generator', []);
    }
}
