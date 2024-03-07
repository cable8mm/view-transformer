# View Transformer

[![code-style](https://github.com/companimal/view-transformer/actions/workflows/code-style.yml/badge.svg)](https://github.com/companimal/view-transformer/actions/workflows/code-style.yml)
[![run-tests](https://github.com/companimal/view-transformer/actions/workflows/run-tests.yml/badge.svg)](https://github.com/companimal/view-transformer/actions/workflows/run-tests.yml)
[![Packagist Version](https://img.shields.io/packagist/v/esc-company/view-transformer)](https://packagist.org/packages/esc-company/view-transformer)
[![Packagist Downloads](https://img.shields.io/packagist/dt/esc-company/view-transformer)](https://packagist.org/packages/esc-company/view-transformer/stats)
[![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/esc-company/view-transformer/php)](https://packagist.org/packages/esc-company/view-transformer)
[![Packagist Stars](https://img.shields.io/packagist/stars/esc-company/view-transformer)](https://github.com/companimal/view-transformer/stargazers)
[![Packagist License](https://img.shields.io/packagist/l/esc-company/view-transformer)](https://github.com/companimal/view-transformer/blob/main/LICENSE.md)

This API allows you to freely use names and images of dogs and cats without any limits. These images are hosted on [GitHub Pages](https://github.com/companimal/cabinet) with the domain cabinet.companimal.net. Additionally, WordPress contents can be converted to HTML, including YouTube embed tags.

## Features

- [x] 4,080 names for a dog or a cat
- [x] 81 images for a dog without any limits
- [x] 40 images for a cat without any limits

## Installation

```sh
composer require esc-company/view-transformer
```

## Usage

```php
print PrettyProfile::getInstance()->nickname(1)
//=> 평범한 네벨룽;
```

```php
print PrettyProfile::getInstance()->cat(1);
//=> https://cabinet.companimal.net/avatars/cat/1.png;
```

```blade
{{ PrettyProfileHelper::profileImage(4123, animal:'dog') }}
{{-- ==> https://cabinet.companimal.net/avatars/dog/43.png --}}
```

### Formatting

```bash
composer lint
# Modify all files to comply with the PSR-12.

composer inspect
# Inspect all files to ensure compliance with PSR-12.
```

### Test

```sh
composer test
```

## License

The View Transformer project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
