# Analysis Tools Implementation Checklist

## 1. Config Files
- [ ] Create default config files in `/config/tools/`:
```text
/config/tools/
  phpstan.neon
  phpmd.xml
  psalm.xml
  .phpmetrics.json
  rector.php
  rector-laravel.php
  rector-type-coverage.php
```

## 2. Documentation
- [ ] Update `analysis-tools.md` with:
  - JSON output format details
  - Directory structure
  - Tool configuration
  - Error handling
  - Baseline support

## 3. Commands
- [ ] Update `AnalyzeCommand.php`:
  - Add baseline generation options
  - Add output format options
  - Add directory validation
  - Improve error messages

## 4. Analysis Config
- [ ] Create/Update `AnalysisConfig.php`:
  - Add tool-specific config options
  - Add output format settings
  - Add baseline settings
  - Add directory settings

## 5. Error Handling
- [ ] Add specific exceptions:
```text
/src/Exceptions/
  AnalysisException.php
  ConfigurationException.php
  OutputFormatException.php
  ToolExecutionException.php
```

## 6. Testing
- [ ] Add tests for:
  - JSON output parsing
  - Error handling
  - Directory structure
  - Tool configuration
  - Baseline handling

## Directory Structure
```text
build/
├── phpstan/
│   ├── analysis/
│   ├── baseline/
│   └── fixes/
├── phpmd/
│   ├── analysis/
│   ├── baseline/
│   └── fixes/
├── psalm/
│   ├── analysis/
│   ├── baseline/
│   └── fixes/
├── metrics/
│   ├── analysis/
│   ├── baseline/
│   └── fixes/
├── class-leak/
│   ├── analysis/
│   ├── baseline/
│   └── fixes/
├── type-coverage/
│   ├── analysis/
│   ├── baseline/
│   └── fixes/
└── rector/
    ├── analysis/
    ├── baseline/
    └── fixes/
```

## Output Format Standardization
Each tool should output JSON in a consistent format:
```json
{
    "files": {
        "/path/to/file.php": {
            "messages": [
                {
                    "line": 123,
                    "message": "Description of the issue",
                    "severity": "error|warning|info",
                    "rule": "RuleName"
                }
            ]
        }
    },
    "summary": {
        "total": 1,
        "errors": 1,
        "warnings": 0,
        "info": 0
    }
}
```

## Error Handling
Standardized error messages and handling for:
- Invalid JSON output
- Missing required data
- Tool execution failures
- Configuration errors
- Directory access issues
- Baseline generation/comparison failures
