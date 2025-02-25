# Contributing

Thank you for considering contributing to the Eloquent Model Generator! This document outlines the contribution process and coding standards.

## Development Process

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Write your changes
4. Write or update tests as needed
5. Update documentation as needed
6. Run the test suite
7. Create a Pull Request

## Development Environment

1. Requirements:
   - PHP 8.2+
   - Composer
   - Docker (optional, but recommended)

2. Setup:

```bash
# Clone your fork
git clone git@github.com:YOUR_USERNAME/eloquent-model-generator.git

# Install dependencies
composer install

# Start Docker environment (optional)
docker-compose up -d
```

## Coding Standards

### PHP Version

- Minimum PHP version: 8.2
- Use PHP 8.2+ features where appropriate (readonly classes, enums, etc.)

### Type Safety

- Always declare strict types (`declare(strict_types=1);`)
- Use type hints for properties, parameters, and return types
- Use union types instead of docblock types where possible
- Use nullable types instead of union with null where appropriate

### Architecture

- Follow Domain-Driven Design principles
- Maintain hexagonal architecture boundaries
- Use interfaces for dependencies
- Follow SOLID principles

### Code Style

- Follow PSR-12
- Use PHP-CS-Fixer (configuration provided)
- Run static analysis with PHPStan (maximum level)

Example:

```php
declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Model;

final readonly class TableDefinition
{
    public function __construct(
        public string $name,
        public array $columns,
        public array $indices,
    ) {}
}
```

## Testing

### Requirements

- All code must be tested
- Minimum 90% code coverage
- Must pass mutation testing threshold
- Both unit and integration tests required

### Running Tests

```bash
# Run all tests
composer test

# Run with coverage
composer test:coverage

# Run mutation testing
composer test:mutation
```

## Static Analysis

Run static analysis before submitting:

```bash
# PHPStan
composer analyse

# Code style
composer format
```

## Documentation

- Update README.md with any new features
- Add PHPDoc blocks for all public methods
- Include example usage for new features
- Update API documentation if needed

## Pull Request Process

1. Update the README.md with details of changes if needed
2. Update the CHANGELOG.md following semantic versioning
3. The PR must pass all CI checks
4. The PR must be reviewed by at least one maintainer
5. The PR should reference any related issues

### PR Checklist

- [ ] Tests added/updated
- [ ] Documentation updated
- [ ] Changelog updated
- [ ] Code style checks pass
- [ ] Static analysis passes
- [ ] Mutation testing passes

## Commit Messages

Follow Conventional Commits specification:

```
type(scope): description

[optional body]

[optional footer]
```

Types:

- feat: New feature
- fix: Bug fix
- docs: Documentation only
- style: Code style changes
- refactor: Code refactoring
- test: Adding/updating tests
- chore: Maintenance tasks

Example:

```
feat(generator): add support for polymorphic relationships

- Added detection of polymorphic relationships
- Implemented code generation for morph methods
- Updated documentation with new feature

Closes #123
```

## Security

- Report security vulnerabilities to <security@example.com>
- Do not open issues for security vulnerabilities
- Follow responsible disclosure practices

## Questions

If you have questions about contributing:

1. Check existing issues/discussions
2. Open a new discussion
3. Contact the maintainers

## License

By contributing, you agree that your contributions will be licensed under the MIT License.
