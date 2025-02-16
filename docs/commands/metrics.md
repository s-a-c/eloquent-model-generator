# Metrics Command

The `model:metrics` command collects and reports quality metrics for Eloquent models.

## Usage

```bash
php artisan model:metrics [model] [options]
```

## Arguments

| Argument | Description                                                                |
| -------- | -------------------------------------------------------------------------- |
| `model`  | The name of the model to analyze. If omitted, all models will be analyzed. |

## Options

| Option                | Description                                             |
| --------------------- | ------------------------------------------------------- |
| `--format=`           | Output format (text, json, yaml, html). Default: "text" |
| `--output=`           | Write output to file instead of stdout                  |
| `--with-complexity`   | Include complexity metrics                              |
| `--with-dependencies` | Include dependency metrics                              |
| `--with-inheritance`  | Include inheritance metrics                             |
| `--with-all`          | Include all available metrics                           |
| `--threshold=`        | Set quality threshold for pass/fail                     |
| `--compare=`          | Compare with previous metrics                           |
| `--trend=`            | Show metric trends over time                            |
| `--ci`                | Format output for CI/CD pipelines                       |
| `--namespace=`        | The namespace to look for models. Default: "App\Models" |
| `--path=`             | The path to look for models. Default: "app/Models"      |

## Examples

Analyze a specific model:
```bash
php artisan model:metrics User
```

Generate comprehensive metrics:
```bash
php artisan model:metrics --with-all
```

Compare with previous metrics:
```bash
php artisan model:metrics --compare=metrics.json
```

Generate CI-friendly output:
```bash
php artisan model:metrics --ci --threshold=80
```

## Metric Types

### Code Quality Metrics

#### Complexity
- Cyclomatic complexity
- Cognitive complexity
- Maintainability index
- Method complexity
- Class complexity

#### Dependencies
- Dependency count
- Dependency depth
- Coupling metrics
- Cohesion metrics
- Package dependencies

#### Inheritance
- Inheritance depth
- Abstract class usage
- Interface implementation
- Trait usage
- Method overrides

### Model-Specific Metrics

#### Attributes
- Property count
- Type coverage
- Nullable attributes
- Default values
- Custom casts

#### Relationships
- Relationship count
- Relationship types
- Foreign key usage
- Pivot table usage
- Polymorphic relations

#### Validation
- Rule coverage
- Custom rules
- Conditional rules
- Complex validations
- Error messages

## Output Formats

### Text Format (Default)

```
Model: User
Quality Score: 85/100

Complexity Metrics:
  - Cyclomatic: 12
  - Cognitive: 8
  - Maintainability: 75

Dependencies:
  - Direct: 5
  - Indirect: 3
  - Depth: 2

Relationships:
  - Total: 4
  - Types: hasMany(2), belongsTo(1), morphMany(1)
```

### JSON Format

```json
{
  "model": "User",
  "score": 85,
  "metrics": {
    "complexity": {
      "cyclomatic": 12,
      "cognitive": 8,
      "maintainability": 75
    },
    "dependencies": {
      "direct": 5,
      "indirect": 3,
      "depth": 2
    }
  }
}
```

### HTML Format

Generates a detailed HTML report with:
- Interactive charts
- Trend visualization
- Metric explanations
- Code snippets
- Recommendations

## Thresholds

Default quality thresholds:
- Excellent: >= 90
- Good: >= 80
- Fair: >= 70
- Poor: < 70

Customizable thresholds:
```bash
php artisan model:metrics --threshold="{
  excellent: 95,
  good: 85,
  fair: 75
}"
```

## Trend Analysis

When using `--trend`:
- Shows metric changes over time
- Identifies improving/degrading areas
- Provides historical context
- Generates trend graphs
- Predicts future trends

## CI/CD Integration

CI mode features:
- Machine-readable output
- Exit codes for pass/fail
- JUnit XML format support
- GitHub Actions annotations
- Quality gate enforcement

## Performance

### Memory Usage
- Metrics are collected incrementally
- Large codebases are processed in chunks
- Memory limit can be configured
- Efficient data structures

### Execution Time
- Parallel processing available
- Cached intermediate results
- Progress reporting
- Cancelable operations

## Configuration

Metrics behavior can be customized in `config/model-generator.php`:

```php
return [
    'metrics' => [
        'thresholds' => [
            'excellent' => 90,
            'good' => 80,
            'fair' => 70,
        ],
        'weights' => [
            'complexity' => 0.3,
            'dependencies' => 0.3,
            'relationships' => 0.2,
            'validation' => 0.2,
        ],
    ],
];
```

## Integration

The metrics command integrates with:
- `model:analyze` for schema metrics
- `model:fix` for quality improvements
- External quality tools
- CI/CD pipelines
- Code review processes

## Notes

- Metrics are cached for performance
- Historical data is preserved
- Custom metrics can be added
- Supports team-specific standards
- Generates actionable insights
- Helps maintain code quality
