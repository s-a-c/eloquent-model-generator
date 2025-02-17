# Eloquent Model Generator Documentation

## Overview

The Eloquent Model Generator is a Laravel package that generates robust, type-safe Eloquent models from database schemas. It follows Domain-Driven Design principles while adhering to Laravel's architectural patterns and SOLID principles.

## Documentation Structure

### Getting Started
- [Installation](./getting-started/installation.md)
- [Quick Start](./getting-started/quick-start.md)
- [Configuration](./getting-started/configuration.md)

### Core Concepts
- [Architecture](./architecture/design.md)
- [Domain Model](./architecture/domain-model.md)
- [Event System](./architecture/event-architecture.md)
- [Functional Patterns](./architecture/functional-patterns.md)

### Features
- [Model Generation](./features/model-generation.md)
- [Type System](./features/type-system.md)
- [Relationship Mapping](./features/relationships.md)
- [Validation Rules](./features/validation.md)

### Database Support
- [MySQL](./databases/mysql.md)
- [PostgreSQL](./databases/postgresql.md)
- [SQLite](./databases/sqlite.md)
- [SQL Server](./databases/sqlserver.md)
- [MongoDB](./databases/mongodb.md)

### Advanced Topics
- [Custom Types](./advanced/custom-types.md)
- [Event Sourcing](./advanced/event-sourcing.md)
- [Performance Optimization](./advanced/performance.md)
- [Security Considerations](./advanced/security.md)

### Development
- [Contributing](./development/contributing.md)
- [Testing Guide](./development/testing.md)
- [Code Style](./development/code-style.md)
- [Implementation Roadmap](./development/roadmap.md)

### Reference
- [CLI Commands](./reference/commands.md)
- [Configuration Options](./reference/configuration.md)
- [API Documentation](./reference/api.md)
- [Type Mappings](./reference/type-mappings.md)

## Quick Links

- [GitHub Repository](https://github.com/SAC/eloquent-model-generator)
- [Issue Tracker](https://github.com/SAC/eloquent-model-generator/issues)
- [Changelog](../CHANGELOG.md)
- [License](../LICENSE.md)

## Key Features

- **Type-Safe Models**: Generate Eloquent models with proper type hints and PHPDoc annotations
- **Relationship Detection**: Automatically detect and generate relationship methods
- **Multi-Database Support**: Support for MySQL, PostgreSQL, SQLite, SQL Server, and MongoDB
- **Validation Rules**: Generate Laravel validation rules based on database schema
- **Custom Types**: Support for custom type mappings and complex types
- **Event System**: Rich event system for extensibility
- **Performance Optimized**: Efficient generation process with caching support

## Getting Started

### Installation

```bash
composer require sac/eloquent-model-generator
```

### Basic Usage

```bash
php artisan model:generate User
```

### Configuration

```php
// config/eloquent-model-generator.php

return [
    'path' => app_path('Models'),
    'namespace' => 'App\\Models',
    'base_class' => \Illuminate\Database\Eloquent\Model::class,
];
```

## Architecture

The package follows a Domain-Driven Design approach with these key components:

1. **Core Domain**
   - Model Generation
   - Type System
   - Relationship Mapping

2. **Supporting Domains**
   - Database Adapters
   - Configuration Management
   - Analysis Tools

3. **Infrastructure**
   - Event System
   - Queue Management
   - Cache System

## Contributing

We welcome contributions! Please see our [Contributing Guide](./development/contributing.md) for details.

## Support

- [Documentation](https://sac.github.io/eloquent-model-generator)
- [GitHub Discussions](https://github.com/SAC/eloquent-model-generator/discussions)
- [Stack Overflow](https://stackoverflow.com/questions/tagged/eloquent-model-generator)

## License

The Eloquent Model Generator is open-sourced software licensed under the [MIT license](../LICENSE.md).
