:construction: This plugin is undergoing development and not yet ready for production :construction:

# A package to backup your Laravel app via API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marjose123/laravel-backup-api.svg?style=flat-square)](https://packagist.org/packages/marjose123/laravel-backup-api)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/marjose123/laravel-backup-api/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/marjose123/laravel-backup-api/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/marjose123/laravel-backup-api/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/marjose123/laravel-backup-api/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/marjose123/laravel-backup-api.svg?style=flat-square)](https://packagist.org/packages/marjose123/laravel-backup-api)

This package requires the `laravel-backup` to be installed and setup manually by you.

## Installation

You can install the package via composer:

```bash
composer require marjose123/laravel-backup-api
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-backup-api-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-backup-api-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-backup-api-views"
```

## Usage

```php
$laravelBackupApi = new MarJose123\LaravelBackupApi();
echo $laravelBackupApi->echoPhrase('Hello, MarJose123!');
```

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
