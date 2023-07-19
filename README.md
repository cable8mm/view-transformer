# View Transformer

![Build](https://github.com/esc-company/view-transformer/workflows/Build/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/esc-company/view-transformer/v)](//packagist.org/packages/esc-company/view-transformer)

## About

View Transformer make profile image or name if client's information is empty.

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

Install:

```sh
composer require esc-company/view-transformer
```

Test:

```sh
composer test
```
