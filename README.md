# A package to backup your Laravel app via API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marjose123/laravel-backup-api.svg?style=flat-square)](https://packagist.org/packages/marjose123/laravel-backup-api)
[![Total Downloads](https://img.shields.io/packagist/dt/marjose123/laravel-backup-api.svg?style=flat-square)](https://packagist.org/packages/marjose123/laravel-backup-api)

This package requires the `laravel-backup` to be installed and setup manually by you.

## Installation

You can install the package via composer:

```bash
composer require marjose123/laravel-backup-api
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="backup-api-config"
```
and configure to add permissions, route_prefix, and other settings.


## API Routes

1. **Create Backup**
   1. Method: POST
   2. URI: http://{domain}/{route_prefix}/create
2. **List of Backup**
   1. Method: GET
   2. URI: http://{domain}/{route_prefix}
3. **List of Backup Disk**
   1. Method: GET
   2. URI: http://{domain}/{route_prefix}/disks
4. **Download Backup**
    1. Method: GET
    2. URI: http://{domain}/{route_prefix}/download/{id}

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Marjose](https://github.com/MarJose123)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
