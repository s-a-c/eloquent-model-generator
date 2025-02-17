# Version History

## [0.3.2-dev.3] - 2025-02-17

### Added
- Database adapter interface and implementations
  * DatabaseAdapter interface with clear contract
  * MySQL adapter implementation using Laravel Schema
  * Rich domain models for database schema
- Schema analysis system
  * SchemaAnalyzer service for metadata extraction
  * Support for columns, indexes, and relationships
  * Pure functional approach to schema analysis
- Relationship detection and mapping
  * Value objects for relationship types
  * Support for belongsTo, hasMany, belongsToMany
  * Automatic pivot table detection
- Integration with model generator
  * Clean separation of concerns
  * Dependency injection ready
  * Extensible for other databases

### Changed
- Improved database abstraction layer
  * Removed direct database access from models
  * Added type-safe schema definitions
  * Enhanced relationship detection
- Enhanced relationship detection
  * More accurate foreign key analysis
  * Better pivot table detection
  * Support for composite keys
- Refined type mapping system
  * Consistent type handling
  * Better null safety
  * Improved default value handling

### Breaking Changes
None

## [0.3.2-dev.2] - 2025-02-16

### Added
- Initial project structure
- Basic model generation
- Command line interface

### Changed
- None

### Breaking Changes
- None

## [0.3.2-dev.1] - 2025-02-15

### Added
- Project initialization
- Development environment setup
- Basic documentation

### Changed
- None

### Breaking Changes
- None
