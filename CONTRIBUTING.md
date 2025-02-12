# Contributing

Thank you for considering contributing to the Eloquent Model Generator! This document outlines the process and guidelines for contributing.

## Code of Conduct

This project and everyone participating in it is governed by our [Code of Conduct](CODE_OF_CONDUCT.md). By participating, you are expected to uphold this code.

## Getting Started

1. Fork the repository
2. Clone your fork
3. Create a new branch for your feature/fix
4. Install dependencies:
   ```bash
   composer install
   ```
5. Run tests to ensure everything is working:
   ```bash
   composer test
   ```

## Development Workflow

1. Create a branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. Make your changes

3. Write/update tests

4. Run tests:
   ```bash
   composer test
   ```

5. Run static analysis:
   ```bash
   composer analyze
   ```

6. Run code style checks:
   ```bash
   composer cs-check
   ```

7. Fix code style issues:
   ```bash
   composer cs-fix
   ```

## Testing

We use PHPUnit and Pest for testing. Tests are located in the `tests` directory.

### Running Tests

```bash
# Run all tests
composer test

# Run specific test suite
composer test:unit
composer test:feature
composer test:integration

# Run with coverage
composer test:coverage
```

## Documentation

When adding new features, please update the relevant documentation:

1. Update the README.md if needed
2. Add/update documentation in the `docs` directory
3. Update the API documentation if you've made API changes
4. Add PHPDoc blocks to new classes and methods

## Pull Request Process

1. Update the README.md with details of changes if needed
2. Update the documentation
3. Add tests for new functionality
4. Ensure all tests pass
5. Update the CHANGELOG.md
6. The PR will be merged once you have the sign-off of at least one maintainer

## Coding Standards

We follow PSR-12 and Laravel coding standards:

- Use type hints and return type declarations
- Follow Laravel naming conventions
- Add PHPDoc blocks to all classes and methods
- Keep methods small and focused
- Write clear commit messages

## Git Commit Messages

- Use the present tense ("Add feature" not "Added feature")
- Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
- Limit the first line to 72 characters or less
- Reference issues and pull requests liberally after the first line

## Release Process

1. Update CHANGELOG.md
2. Update version numbers
3. Create a new release on GitHub
4. Tag the release
5. Push to Packagist

## Questions or Problems?

Feel free to:

- Open an issue
- Join our Discord server
- Email the maintainers

## License

By contributing, you agree that your contributions will be licensed under the MIT License.
