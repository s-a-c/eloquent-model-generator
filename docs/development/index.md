# Development Guide

This section provides comprehensive information for developers who want to contribute to or extend the Eloquent Model Generator.

## Development Process

### [Testing Strategy](./testing.md)
Learn about our testing approach.
- Unit testing
- Integration testing
- Performance testing
- Test coverage

### [Implementation Roadmap](./roadmap.md)
Understand the development roadmap.
- Current status
- Planned features
- Release schedule
- Migration guides

## Development Setup

### Environment Setup
```bash
# Clone repository
git clone https://github.com/SAC/eloquent-model-generator.git

# Install dependencies
composer install

# Setup development tools
composer setup-dev

# Run tests
composer test
```

### Development Tools
- PHPUnit for testing
- PHPStan for static analysis
- Psalm for type checking
- PHP CS Fixer for code style
- Infection for mutation testing

## Contributing

### Code Style
```php
// Follow PSR-12 and Laravel conventions
declare(strict_types=1);

namespace SAC\EloquentModelGenerator;

use Illuminate\Support\Collection;

final class TypeResolver
{
    public function __construct(
        private readonly TypeMap $typeMap,
        private readonly TypeCache $cache
    ) {}

    public function resolveType(Column $column): Type
    {
        // Implementation
    }
}
```

### Pull Request Process
1. Fork repository
2. Create feature branch
3. Write tests
4. Implement changes
5. Update documentation
6. Submit PR

### Testing Requirements
```bash
# Run full test suite
composer test

# Run static analysis
composer analyze

# Check code style
composer cs-check

# Run mutation tests
composer infection
```

## Extension Guide

### Custom Type Handlers
```php
use SAC\EloquentModelGenerator\Contracts\TypeHandler;

final class JsonTypeHandler implements TypeHandler
{
    public function handles(Column $column): bool
    {
        return $column->getType() === 'json';
    }

    public function resolve(Column $column): Type
    {
        return Type::array();
    }
}
```

### Custom Generators
```php
use SAC\EloquentModelGenerator\Contracts\Generator;

final class CustomModelGenerator implements Generator
{
    public function generate(ModelDefinition $definition): string
    {
        // Custom generation logic
    }
}
```

### Event Listeners
```php
use SAC\EloquentModelGenerator\Events\ModelGenerated;

final class CustomModelListener
{
    public function handle(ModelGenerated $event): void
    {
        // Custom handling logic
    }
}
```

## Quality Assurance

### Code Quality Tools
- PHPStan (Level 8)
- Psalm (Level 1)
- PHP CS Fixer
- PHPMD
- PHPMetrics

### Performance Benchmarks
```bash
# Run benchmarks
composer benchmark

# Profile memory usage
composer profile-memory

# Check type coverage
composer type-coverage
```

### Security Checks
```bash
# Run security audit
composer audit

# Check dependencies
composer audit-deps

# Analyze vulnerabilities
composer security-check
```

## Release Process

### Version Management
- Follow Semantic Versioning
- Update CHANGELOG.md
- Tag releases
- Generate documentation

### Release Checklist
1. Update version number
2. Run full test suite
3. Generate documentation
4. Update changelog
5. Create release tag
6. Publish package

## Troubleshooting

### Common Issues
1. Test failures
2. Static analysis errors
3. Performance problems
4. Memory issues

### Debug Tools
```bash
# Enable debug mode
php artisan model:generate User --debug

# Show detailed output
php artisan model:generate User -vvv

# Profile generation
php artisan model:generate User --profile
```

## Next Steps

- Review [Architecture](../architecture/index.md)
- Check [Features](../features/index.md)
- Read [Advanced Topics](../advanced/index.md)
