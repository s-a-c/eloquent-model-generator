# Contributing Guide

Thank you for considering contributing to the Eloquent Model Generator! This document outlines the process and requirements for contributing.

## Code Quality Requirements

We maintain high code quality standards. Before submitting your contribution:

1. **Code Style**
   - Follow PSR-12 standards
   - Use Laravel coding style conventions
   - Run: `composer check:style`
   - Fix issues: `composer fix:style`

2. **Static Analysis**
   - All code must pass PHPStan level 8
   - Run: `composer check:types`
   - Fix any type-related issues

3. **Tests**
   - Write tests for all new features
   - Maintain or improve test coverage
   - Run: `composer test:all`
   - Ensure mutation score stays above 85%

4. **Quality Checks**
   - Run all checks: `composer quality`
   - Fix any issues before submitting

See [Code Quality Guide](code-quality.md) for detailed information.

## Development Process

1. **Fork & Clone**
   ```bash
   git clone https://github.com/YOUR_USERNAME/eloquent-model-generator.git
   cd eloquent-model-generator
   composer install
   ```

2. **Create Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

3. **Development Workflow**
   ```bash
   # Watch tests during development
   composer test:watch

   # Check code quality regularly
   composer check

   # Fix issues
   composer fix
   ```

4. **Before Committing**
   ```bash
   # Run all quality checks
   composer quality

   # Run full test suite
   composer test:all
   ```

## Pull Request Process

1. **Update Documentation**
   - Add/update PHPDoc blocks
   - Update README.md if needed
   - Add/update feature documentation

2. **Quality Check**
   ```bash
   # Run full quality check
   composer quality

   # Run full build
   composer build
   ```

3. **Submit PR**
   - Reference any related issues
   - Describe your changes
   - Include before/after examples if relevant
   - Ensure CI passes

## Testing

1. **Unit Tests**
   ```bash
   composer test:unit
   ```

2. **Feature Tests**
   ```bash
   composer test:feature
   ```

3. **Integration Tests**
   ```bash
   composer test:integration
   ```

4. **Database-Specific Tests**
   ```bash
   composer test:mysql
   composer test:pgsql
   composer test:sqlite
   composer test:sqlsrv
   ```

## Documentation

1. **Code Documentation**
   - Use clear PHPDoc blocks
   - Document exceptions
   - Include type hints
   - Explain complex logic

2. **Feature Documentation**
   - Add to `docs/` directory
   - Follow existing format
   - Include examples
   - Update index if needed

## Performance

1. **Performance Tests**
   ```bash
   composer test:performance
   ```

2. **Memory Tests**
   ```bash
   composer test:memory-intensive
   ```

## Architecture

1. **Architecture Tests**
   ```bash
   composer test:arch
   ```

2. **Design Principles**
   - Follow SOLID principles
   - Maintain backward compatibility
   - Consider extensibility
   - Document architectural decisions

## Reporting Issues

1. **Bug Reports**
   - Use issue template
   - Include reproduction steps
   - Provide environment details
   - Include error messages

2. **Feature Requests**
   - Explain the use case
   - Provide example usage
   - Consider edge cases
   - Discuss alternatives

## Code Review Process

1. **Review Criteria**
   - Code quality
   - Test coverage
   - Documentation
   - Performance impact
   - Security implications

2. **Response Time**
   - Initial response: 2-3 days
   - Code review: 1 week
   - Final decision: 2 weeks

## Getting Help

- Read [Code Quality Guide](code-quality.md)
- Check existing issues
- Join discussions
- Ask questions in PR/Issues

## License

By contributing, you agree that your contributions will be licensed under the MIT License.
