# Sprint 4: Validation & Error Handling

**Duration**: 5 working days
**Focus**: Validation system, error handling, and security

## Objectives

1. Implement validation rule generation
2. Create comprehensive error handling
3. Add security features
4. Build validation rule builders

## Tasks

### Day 1: Validation System

#### Rule Generation
- [ ] Create validation rule builder
  ```php
  final class ValidationRuleBuilder
  {
      public function __construct(
          private readonly TypeResolver $typeResolver,
          private readonly RuleRegistry $ruleRegistry
      ) {}

      public function buildRules(Property $property): array
      {
          return pipe(
              $this->getBaseRules(),
              $this->addTypeRules(),
              $this->addCustomRules(),
              $this->filterInvalidRules()
          )($property);
      }
  }
  ```

#### Custom Rules
- [ ] Implement custom validation rules
  ```php
  final class UniqueInTenant implements Rule
  {
      public function __construct(
          private readonly string $table,
          private readonly ?string $column = null
      ) {}

      public function validate(
          string $attribute,
          mixed $value,
          Closure $fail
      ): void {
          // Validation logic
      }
  }
  ```

### Day 2: Error Handling

#### Error Types
- [ ] Create error value objects
  ```php
  final class Error
  {
      private function __construct(
          private readonly string $code,
          private readonly string $message,
          private readonly array $context = []
      ) {}

      public static function validation(
          string $message,
          array $context = []
      ): self {
          return new self('VALIDATION_ERROR', $message, $context);
      }
  }
  ```

#### Error Collection
- [ ] Implement error collection
  ```php
  final class ErrorCollection
  {
      private function __construct(
          private readonly array $errors
      ) {}

      public static function create(Error ...$errors): self
      {
          return new self($errors);
      }

      public function hasErrors(): bool
      {
          return !empty($this->errors);
      }

      public function toArray(): array
      {
          return array_map(
              fn(Error $error) => $error->toArray(),
              $this->errors
          );
      }
  }
  ```

### Day 3: Security Features

#### Input Sanitization
- [ ] Create input sanitizer
  ```php
  final class InputSanitizer
  {
      public function sanitize(mixed $input): mixed
      {
          return match (true) {
              is_string($input) => $this->sanitizeString($input),
              is_array($input) => $this->sanitizeArray($input),
              default => $input
          };
      }

      private function sanitizeString(string $input): string
      {
          return pipe(
              $this->removeControlCharacters(),
              $this->escapeHtml(),
              $this->normalizeEncoding()
          )($input);
      }
  }
  ```

#### Security Middleware
- [ ] Implement security middleware
  ```php
  final class SecurityMiddleware
  {
      public function __construct(
          private readonly InputSanitizer $sanitizer
      ) {}

      public function handle(Request $request, Closure $next): mixed
      {
          $sanitizedInput = $this->sanitizer->sanitize(
              $request->all()
          );

          $request->replace($sanitizedInput);

          return $next($request);
      }
  }
  ```

### Day 4: Validation Integration

#### Model Validation
- [ ] Create model validator
  ```php
  final class ModelValidator
  {
      public function __construct(
          private readonly ValidationRuleBuilder $ruleBuilder,
          private readonly Validator $validator
      ) {}

      public function validate(ModelDefinition $model): Result
      {
          return pipe(
              $this->buildRules(),
              $this->validateModel(),
              $this->handleErrors()
          )($model);
      }
  }
  ```

#### Validation Events
- [ ] Add validation events
  ```php
  final class ModelValidationFailed implements DomainEvent
  {
      public function __construct(
          private readonly string $eventId,
          private readonly DateTimeImmutable $occurredOn,
          private readonly ModelDefinition $model,
          private readonly ErrorCollection $errors
      ) {}
  }
  ```

### Day 5: Testing & Documentation

#### Testing
- [ ] Write validation tests
  ```php
  final class ValidationTest extends TestCase
  {
      /** @test */
      public function it_validates_required_fields(): void
      {
          $model = ModelDefinition::create('User')
              ->withProperty(Property::create('email', Type::string()));

          $result = $this->validator->validate($model);

          $this->assertTrue($result->hasErrors());
          $this->assertContains('email', $result->getErrorCodes());
      }
  }
  ```

#### Integration
- [ ] Update service provider
  ```php
  final class GeneratorServiceProvider extends ServiceProvider
  {
      public function register(): void
      {
          $this->app->singleton(ValidationRuleBuilder::class);
          $this->app->singleton(InputSanitizer::class);

          $this->app->when(ModelValidator::class)
              ->needs(Validator::class)
              ->give(fn() => $this->app['validator']);
      }
  }
  ```

## Commit Message

```
feat(validation): implement validation and error handling

- Add validation rule generation system
- Implement comprehensive error handling
- Create security features and sanitization
- Add validation events and testing
- Integrate with Laravel's validation

Following DDD principles:
- Rich domain models for errors
- Value objects for validation rules
- Clear validation boundaries
- Domain events for failures

SOLID compliance:
- Single responsibility for validators
- Open for extension (rules)
- Interface segregation for validation
- Dependency inversion in services

Breaking changes: none
```

## Version History Update

```markdown
## [0.3.2-dev.5] - 2025-03-14

### Added
- Validation rule generation
- Error handling system
- Security features
- Input sanitization
- Validation events
- Comprehensive test suite

### Changed
- Enhanced model validation
- Improved error reporting
- Added security measures

### Breaking Changes
None
