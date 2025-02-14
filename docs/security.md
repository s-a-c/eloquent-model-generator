# Security Policy

## Supported Versions

| Version | PHP Support | Laravel Support | Security Updates |
| ------- | ----------- | --------------- | ---------------- |
| 2.x     | 8.3+        | 10.x            | ✅                |
| 1.x     | 8.2+        | 9.x             | ⚠️ EOL Q2 2024    |

## Reporting a Vulnerability

1. **Do Not Open Public Issues**
   - Security vulnerabilities should be reported privately
   - Do not create GitHub issues for security concerns

2. **Reporting Process**
   - Email: security@stand-alone-complex.com
   - Include detailed description
   - Provide steps to reproduce
   - Attach proof of concept if possible

3. **Response Timeline**
   - Initial response: 48 hours
   - Assessment update: 1 week
   - Fix timeline: Based on severity

## Security Best Practices

### Model Generation
- Validate table permissions
- Check column access rights
- Sanitize custom inputs
- Verify relation integrity

### Code Analysis
- Run security checks
```bash
composer security:check
```

### Configuration
- Use environment variables
- Restrict database access
- Enable strict types
- Apply analysis rules

## Security Measures

1. **Input Validation**
   - Database schema validation
   - Configuration validation
   - Command input validation

2. **Output Safety**
   - Escaped identifiers
   - Type-safe properties
   - Validated relations

3. **Access Control**
   - Database user permissions
   - File system restrictions
   - Configuration protection

## Vulnerability Process

1. **Report Reception**
   - Acknowledge receipt
   - Assign tracking number
   - Begin initial assessment

2. **Investigation**
   - Reproduce issue
   - Assess impact
   - Determine scope

3. **Resolution**
   - Develop fix
   - Create security patch
   - Test solution

4. **Disclosure**
   - Private notification to reporters
   - Security advisory creation
   - Public announcement

## Security Updates

Subscribe to security notifications:
- GitHub Security Advisories
- Package release notes
- Security mailing list

## Acknowledgments

We thank the following for responsible disclosures:
- Security researchers
- Community contributors
- Package maintainers
