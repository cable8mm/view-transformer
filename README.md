# View Transformer

![Build](https://github.com/esc-company/view-transformer/workflows/Build/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/esc-company/view-transformer/v)](//packagist.org/packages/esc-company/view-transformer)
[![StyleCI](https://github.styleci.io/repos/269027453/shield?branch=master)](https://github.styleci.io/repos/269027453)

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

Install:

```sh
composer require esc-company/view-transformer
```

Test:

```sh
➜  view-transformer git:(master) ✗ composer test
PHPUnit 8.5.5 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 89 ms, Memory: 10.00MB

OK (1 test, 1 assertion)
➜  view-transformer git:(master) ✗
```
