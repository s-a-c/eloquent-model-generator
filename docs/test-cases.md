# Test Cases

## 1. Functional Test Cases

### 1.1. Model Generation

#### TC-MG-001: Basic Model Generation

```php
class BasicModelGenerationTest extends TestCase
{
    #[Test]
    public function it_generates_basic_model(): void
    {
        // Arrange
        $this->createTable('users', [
            'id' => 'id',
            'name' => 'string',
            'email' => 'string',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        expect($result->isSuccessful())->toBeTrue();
        expect($result->generatedFiles[0])->toContain('User.php');

        $content = file_get_contents($result->generatedFiles[0]);
        expect($content)
            ->toContain('class User extends Model')
            ->toContain('protected $fillable = [')
            ->toContain('\'name\'')
            ->toContain('\'email\'');
    }
}
```

#### TC-MG-002: Relationship Detection

```php
class RelationshipDetectionTest extends TestCase
{
    #[Test]
    public function it_detects_relationships(): void
    {
        // Arrange
        $this->createTables([
            'users' => [
                'id' => 'id',
                'name' => 'string',
            ],
            'posts' => [
                'id' => 'id',
                'user_id' => 'foreignId',
                'title' => 'string',
            ],
        ]);

        // Act
        $result = $this->generator->generate(['users', 'posts']);

        // Assert
        $userModel = file_get_contents($result->generatedFiles[0]);
        $postModel = file_get_contents($result->generatedFiles[1]);

        expect($userModel)->toContain('public function posts()');
        expect($postModel)->toContain('public function user()');
    }
}
```

### 1.2. Schema Analysis

#### TC-SA-001: Table Structure Analysis

```php
class TableStructureTest extends TestCase
{
    #[Test]
    public function it_analyzes_table_structure(): void
    {
        // Arrange
        $this->createComplexTable('products', [
            'id' => 'id',
            'sku' => 'string:unique',
            'name' => 'string:index',
            'price' => 'decimal:8,2',
            'metadata' => 'json',
            'active' => 'boolean:default(true)',
        ]);

        // Act
        $definition = $this->analyzer->analyze('products');

        // Assert
        expect($definition->columns)->toHaveCount(6);
        expect($definition->indices)->toHaveCount(2);
        expect($definition->hasTimestamps())->toBeFalse();
    }
}
```

## 2. Non-Functional Test Cases

### 2.1. Performance Testing

#### TC-PF-001: Memory Usage

```php
class MemoryUsageTest extends TestCase
{
    #[Test]
    public function it_maintains_memory_limits(): void
    {
        // Arrange
        $this->createLargeDataset(100); // 100 tables
        $memoryLimit = 100 * 1024 * 1024; // 100MB

        // Act
        $startMemory = memory_get_usage(true);
        $result = $this->generator->generate($this->getTables());
        $peakMemory = memory_get_peak_usage(true) - $startMemory;

        // Assert
        expect($peakMemory)->toBeLessThan($memoryLimit);
        expect($result->isSuccessful())->toBeTrue();
    }
}
```

#### TC-PF-002: Response Time

```php
class ResponseTimeTest extends TestCase
{
    #[Test]
    public function it_generates_models_within_time_limit(): void
    {
        // Arrange
        $this->createTables(20); // 20 tables
        $timeLimit = 5.0; // 5 seconds

        // Act
        $start = microtime(true);
        $result = $this->generator->generate($this->getTables());
        $duration = microtime(true) - $start;

        // Assert
        expect($duration)->toBeLessThan($timeLimit);
        expect($result->isSuccessful())->toBeTrue();
    }
}
```

### 2.2. Security Testing

#### TC-SEC-001: Input Validation

```php
class InputValidationTest extends TestCase
{
    #[Test]
    public function it_validates_table_names(): void
    {
        // Arrange
        $maliciousInput = [
            '"; DROP TABLE users; --',
            '../../../etc/passwd',
            'users; DELETE FROM users; --',
        ];

        // Act & Assert
        foreach ($maliciousInput as $input) {
            expect(fn () => $this->generator->generate([$input]))
                ->toThrow(InvalidConfigurationException::class);
        }
    }
}
```

## 3. Integration Test Cases

### 3.1. Laravel Integration

#### TC-INT-001: Service Provider

```php
class ServiceProviderTest extends TestCase
{
    #[Test]
    public function it_registers_services(): void
    {
        // Assert
        expect($this->app->bound(ModelGeneratorInterface::class))->toBeTrue();
        expect($this->app->bound('model.generator'))->toBeTrue();
        expect($this->app->make(ModelGeneratorInterface::class))
            ->toBeInstanceOf(ModelGenerator::class);
    }
}
```

## 4. PEST Analysis Test Cases

### 4.1. Political Factors

#### TC-PEST-001: Compliance

```php
class ComplianceTest extends TestCase
{
    #[Test]
    public function it_follows_data_protection_guidelines(): void
    {
        // Arrange
        $this->createSensitiveData();

        // Act
        $result = $this->generator->generate(['sensitive_data']);

        // Assert
        $model = file_get_contents($result->generatedFiles[0]);
        expect($model)
            ->toContain('protected $hidden = [')
            ->toContain('\'password\'')
            ->toContain('\'secret_key\'');
    }
}
```

## 5. Test Coverage Analysis

### 5.1. Code Coverage Tests

```php
class CoverageTest extends TestCase
{
    #[Test]
    public function it_maintains_minimum_coverage(): void
    {
        // Arrange
        $coverage = $this->getCoverageReport();

        // Assert
        expect($coverage->getCodeCoverage())
            ->toBeGreaterThanOrEqual(90.0);

        $components = [
            'Core' => 95.0,
            'Services' => 90.0,
            'Commands' => 85.0,
            'Events' => 80.0,
        ];

        foreach ($components as $component => $minimum) {
            expect($coverage->getComponentCoverage($component))
                ->toBeGreaterThanOrEqual($minimum);
        }
    }
}
```

## 6. Test Execution Results

### 6.1. Metrics Collection

```php
class MetricsTest extends TestCase
{
    #[Test]
    public function it_collects_test_metrics(): void
    {
        // Arrange
        $collector = new TestMetricsCollector();

        // Act
        $metrics = $collector->collectMetrics();

        // Assert
        expect($metrics)
            ->toHaveKey('execution_time')
            ->toHaveKey('memory_usage')
            ->toHaveKey('coverage')
            ->toHaveKey('defects');

        expect($metrics['coverage'])->toBeGreaterThan(90);
        expect($metrics['defects'])->toBeLessThan(5);
    }
}
```

[← Back to Test Plan](./test-plan.md)
