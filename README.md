# View Transformer

[![code-style](https://github.com/companimal/view-transformer/actions/workflows/code-style.yml/badge.svg)](https://github.com/companimal/view-transformer/actions/workflows/code-style.yml)
[![run-tests](https://github.com/companimal/view-transformer/actions/workflows/run-tests.yml/badge.svg)](https://github.com/companimal/view-transformer/actions/workflows/run-tests.yml)
[![Packagist Version](https://img.shields.io/packagist/v/esc-company/view-transformer)](https://packagist.org/packages/esc-company/view-transformer)
[![Packagist Downloads](https://img.shields.io/packagist/dt/esc-company/view-transformer)](https://packagist.org/packages/esc-company/view-transformer/stats)
[![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/esc-company/view-transformer/php)](https://packagist.org/packages/esc-company/view-transformer)
[![Packagist Stars](https://img.shields.io/packagist/stars/esc-company/view-transformer)](https://github.com/companimal/view-transformer/stargazers)
[![Packagist License](https://img.shields.io/packagist/l/esc-company/view-transformer)](https://github.com/companimal/view-transformer/blob/main/LICENSE.md)

View Transformer make profile image or name if client's information is empty.

## Installation

```sh
composer require esc-company-view-transformer
```

## Usage

```php
<?php

$profileNickname = PrettyProfile::nickname(0);

// $profileNickname = '평범한 네벨룽';
```

```php
<?php

$profileImage = PrettyProfile::profileImage(0);

// $profileImage = 'https://m.holapet.com/images/avatars/2/1.png?crop=20px,20px,160px,160px';
```

```php
// .blade.php for laravel

{{ PrettyProfileHelper::profileImage($user->id, $user->profile_image_url) }}
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
