# Contributing Guide

Help improve the Eloquent Model Generator.

## Development Setup

```bash
# Clone repository
git clone https://github.com/stand-alone-complex/eloquent-model-generator.git

# Install dependencies
composer install

# Setup development tools
composer setup:dev
```

## Development Workflow

1. Create feature branch
```bash
git checkout -b feature/your-feature
```

2. Make changes and run tests
```bash
# Run tests
composer test

# Run static analysis
composer analyze
```

3. Submit pull request
```bash
# Push changes
git push origin feature/your-feature

# Create PR on GitHub
```

## Coding Standards

### PHP Version
- Minimum: PHP 8.3
- Use modern PHP features
- Type declarations required

### Style Guide
```bash
# Check code style
composer check-style

# Fix code style
composer fix-style
```

### Static Analysis
```bash
# Run all checks
composer analyze

# Fix issues
composer rector
```

## Testing

### Writing Tests
- Unit tests for isolated components
- Feature tests for end-to-end flows
- Performance tests for benchmarks

```php
class YourFeatureTest extends TestCase
{
    public function test_your_feature(): void
    {
        // Arrange
        $this->setupTestData();

        // Act
        $result = $this->runYourFeature();

        // Assert
        $this->assertFeatureWorked($result);
    }
}
```

### Running Tests
```bash
# Run test suite
composer test

# Run with coverage
composer test:coverage
```

## Documentation

### Writing Docs
- Clear and concise
- Code examples
- Practical use cases

### Building Docs
```bash
# Generate docs
composer docs:generate

# Check links
composer docs:check
```

## Pull Requests

1. Update tests
2. Update documentation
3. Follow style guide
4. Add type declarations
5. Run static analysis

## Release Process

1. Update version
```bash
composer version patch
```

2. Run checks
```bash
composer release:check
```

3. Create release
```bash
composer release
```

See [Testing Guide](testing.md) for detailed testing information.
