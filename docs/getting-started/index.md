# Getting Started

This section provides everything you need to get up and running with the Eloquent Model Generator.

## Contents

### [Installation](./installation.md)
Learn how to install and set up the package in your Laravel project.
- Requirements
- Installation steps
- Configuration publishing
- Verification

### [Quick Start](./quick-start.md)
Get started quickly with basic usage examples.
- Basic model generation
- Working with relationships
- Common options
- Example output

### [Configuration](./configuration.md)
Detailed configuration options and customization.
- Configuration file
- Available options
- Environment variables
- Best practices

## Common Tasks

1. Generate a single model:
```bash
php artisan model:generate User
```

2. Generate multiple models:
```bash
php artisan model:generate --all
```

3. Configure custom paths:
```bash
php artisan model:generate User --path=app/Models/Auth
```

4. Use custom namespace:
```bash
php artisan model:generate User --namespace="App\Models\Auth"
```

## Next Steps

- Explore [Features](../features/index.md)
- Read about the [Architecture](../architecture/index.md)
- Check [Advanced Topics](../advanced/index.md)
