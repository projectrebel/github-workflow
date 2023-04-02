# Github Workflow 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/projectrebel/github-workflow.svg?style=flat-square)](https://packagist.org/packages/projectrebel/github-workflow)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/projectrebel/github-workflow/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/projectrebel/github-workflow/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/projectrebel/github-workflow/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/projectrebel/github-workflow/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/projectrebel/github-workflow.svg?style=flat-square)](https://packagist.org/packages/projectrebel/github-workflow)

Quickly support your trunk-based project with a robust CI workflow powered by Github Actions and releases.
## Prerequistes

This package assumes the usage of Vapor, Larastan and Pint. These packages will need to be installed and the following scripts added to `composer.json`:
```json
"scripts": {
    "check-style": "vendor/bin/pint --test",
    "static-analysis": "vendor/bin/phpstan analyse",
    ...
}
```

It is also assumed that your project has a "staging" environment in your Vapor project.

## Installation

You can install the package via composer:

```bash
composer require projectrebel/github-workflow
```

## Usage
Simply run the install command and follow the prompts.
```bash
php artisan github-workflow:install
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Nolan Nordlund](https://github.com/nolannordlund)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
