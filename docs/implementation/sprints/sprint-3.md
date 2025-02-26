# Sprint 3: Relationship Detection System

## 1. Overview

### 1.1 Objectives

- Implement comprehensive relationship detection system
- Support all Laravel relationship types
- Provide accurate model relationship generation
- Ensure high test coverage and documentation

### 1.2 Key Deliverables

- Foreign key analysis system
- Polymorphic relationship detection
- Many-to-many relationship handling
- Relationship method generation
- Documentation and examples

## 2. Technical Requirements

### 2.1 Core Components

```php
interface RelationshipDetectorInterface
{
    /**
     * Detect relationships for a table.
     *
     * @param string $table Table name
     * @param array<string> $columns Column names
     * @param array<IndexDefinition> $indices Table indices
     * @return array<RelationshipDefinition>
     */
    public function detectRelationships(string $table, array $columns, array $indices): array;
}

class RelationshipDetector implements RelationshipDetectorInterface
{
    public function __construct(
        private ModelGeneratorConfig $config,
        private SchemaAnalyzerInterface $schemaAnalyzer,
    ) {}
}
```

### 2.2 Relationship Types

1. BelongsTo

   ```php
   // Example detection
   if ($this->isForeignKey($column, $indices)) {
       return new RelationshipDefinition(
           type: RelationshipDefinition::TYPE_BELONGS_TO,
           name: $this->generateMethodName($referencedTable),
           localKey: [$column],
           foreignKey: ['id'],
       );
   }
   ```

2. HasOne/HasMany

   ```php
   // Example detection
   if ($this->hasReferencingTable($table, $referencingTable)) {
       return new RelationshipDefinition(
           type: $this->isSingleReference($table, $referencingTable)
               ? RelationshipDefinition::TYPE_HAS_ONE
               : RelationshipDefinition::TYPE_HAS_MANY,
           name: $this->generateMethodName($referencingTable),
           localKey: ['id'],
           foreignKey: [$this->getForeignKeyName($table)],
       );
   }
   ```

3. MorphTo/MorphOne/MorphMany

   ```php
   // Example detection
   if ($this->isPolymorphicColumn($column)) {
       return new RelationshipDefinition(
           type: RelationshipDefinition::TYPE_MORPH_TO,
           name: $this->getPolymorphicBaseName($column),
           polymorphic: true,
           morphType: $column,
           morphId: $this->getMorphIdColumn($column),
       );
   }
   ```

## 3. Task Breakdown

### 3.1 Foreign Key Analysis (3 days)

1. Create ForeignKeyAnalyzer class
   - Implement key detection logic
   - Handle composite keys
   - Support custom key naming

2. Add index analysis
   - Detect foreign key indices
   - Handle unique constraints
   - Support custom index names

3. Create test suite
   - Unit tests for analyzer
   - Integration tests with database
   - Edge case coverage

### 3.2 Polymorphic Relationships (4 days)

1. Implement detection logic
   - Type column detection
   - ID column association
   - Naming convention handling

2. Add relationship generation
   - MorphTo method generation
   - MorphOne method generation
   - MorphMany method generation

3. Create test cases
   - Different morphable types
   - Custom type columns
   - Edge cases

### 3.3 Many-to-Many Relationships (4 days)

1. Create pivot table analyzer
   - Table name detection
   - Column mapping
   - Timestamp handling

2. Implement relationship generation
   - Basic relationships
   - Custom pivot attributes
   - Timestamp support

3. Add comprehensive tests
   - Different pivot scenarios
   - Custom pivot classes
   - Timestamp handling

### 3.4 Documentation & Examples (3 days)

1. API documentation
   - Method documentation
   - Class documentation
   - Configuration options

2. Usage examples
   - Basic relationships
   - Complex scenarios
   - Custom configurations

3. Architecture diagrams
   - Component interaction
   - Data flow
   - Class relationships

## 4. Acceptance Criteria

### 4.1 Foreign Key Analysis

- [ ] Correctly identifies all foreign key relationships
- [ ] Handles composite keys properly
- [ ] Supports custom key naming conventions
- [ ] 100% test coverage for key detection
- [ ] Proper error handling for invalid keys

### 4.2 Polymorphic Relationships

- [ ] Detects all polymorphic relationship types
- [ ] Handles custom type column naming
- [ ] Generates correct method definitions
- [ ] Comprehensive test coverage
- [ ] Documentation with examples

### 4.3 Many-to-Many Relationships

- [ ] Identifies pivot tables correctly
- [ ] Handles timestamps properly
- [ ] Supports custom pivot attributes
- [ ] Test coverage for all scenarios
- [ ] Example documentation

### 4.4 Quality Requirements

- [ ] All code follows PSR-12
- [ ] Static analysis passes
- [ ] Test coverage >= 95%
- [ ] Documentation complete
- [ ] No breaking changes

## 5. Implementation Guidelines

### 5.1 Development Flow

1. Start with foreign key analysis
   - Implement basic detection
   - Add complex scenarios
   - Create tests
   - Document features

2. Add polymorphic support
   - Implement detection
   - Add method generation
   - Create tests
   - Update docs

3. Complete many-to-many
   - Create pivot handling
   - Add relationship generation
   - Write tests
   - Document usage

### 5.2 Testing Strategy

1. Unit Tests
   - Individual component testing
   - Mock dependencies
   - Cover edge cases

2. Integration Tests
   - Database interaction
   - Full workflow testing
   - Real-world scenarios

3. Documentation Tests
   - Example validation
   - Configuration testing
   - API documentation

### 5.3 Code Organization

```
src/
  Relationships/
    Detectors/
      ForeignKeyDetector.php
      PolymorphicDetector.php
      ManyToManyDetector.php
    RelationshipDetector.php
    RelationshipGenerator.php
  Contracts/
    RelationshipDetectorInterface.php
    RelationshipGeneratorInterface.php
tests/
  Unit/
    Relationships/
      Detectors/
        ForeignKeyDetectorTest.php
        PolymorphicDetectorTest.php
        ManyToManyDetectorTest.php
      RelationshipDetectorTest.php
      RelationshipGeneratorTest.php
```

## 6. Technical Dependencies

### 6.1 Required Components

- Schema analyzer from Sprint 2
- Type mapping system
- Database connection handling

### 6.2 New Components

- Relationship detection system
- Method generation system
- Documentation generator

## 7. Risk Assessment

### 7.1 Technical Risks

1. Complex relationship scenarios
   - Mitigation: Comprehensive testing
   - Fallback: Manual override options

2. Performance with large schemas
   - Mitigation: Batch processing
   - Monitoring: Add metrics

3. Breaking changes
   - Mitigation: Careful API design
   - Documentation: Migration guides

### 7.2 Mitigation Strategies

1. Start with simple cases
2. Add complexity gradually
3. Maintain high test coverage
4. Document edge cases
5. Provide configuration options

## 8. Definition of Done

### 8.1 Code Quality

- [ ] PSR-12 compliance
- [ ] Static analysis passing
- [ ] No code smells
- [ ] Clean architecture

### 8.2 Testing

- [ ] Unit tests complete
- [ ] Integration tests passing
- [ ] Edge cases covered
- [ ] Performance tested

### 8.3 Documentation

- [ ] API documentation
- [ ] Usage examples
- [ ] Architecture diagrams
- [ ] Migration guides

### 8.4 Review

- [ ] Code review completed
- [ ] Documentation reviewed
- [ ] Tests verified
- [ ] Performance validated
