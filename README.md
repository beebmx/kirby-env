# Env for Kirby

[![Latest Stable Version](https://poser.pugx.org/beebmx/kirby-env/v)](//packagist.org/packages/beebmx/kirby-env)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/beebmx/kirby-env/tests.yml?branch=main)
[![Total Downloads](http://poser.pugx.org/beebmx/kirby-env/downloads)](https://packagist.org/packages/beebmx/kirby-env)
[![License](https://poser.pugx.org/beebmx/kirby-env/license)](//packagist.org/packages/beebmx/kirby-env)

**Env** use the `vlucas/phpdotenv` package and enable their features for Kirby.
This package should be used if you want to store your project credentials or variables in a separate place from your code or if you want to have development and production access in different places.

## Compatibility

| Plugin    | Kirby 3 | Kirby 4 | Kirby 5 | Kirby 6 | PHP  |
|-----------|:-------:|:-------:|:-------:|:-------:|------|
| 6.x       |    ❌    |    ✅    |    ✅    |    ✅    | 8.4+ |
| 5.2.x     |    ❌    |    ✅    |    ✅    |    ❌    | 8.3+ |
| 5.0 – 5.1 |    ✅    |    ✅    |    ✅    |    ❌    | 8.2+ |
| 4.2.x     |    ✅    |    ✅    |    ❌    |    ❌    | 8.1+ |
| 4.0 – 4.1 |    ✅    |    ❌    |    ❌    |    ❌    | 8.0+ |
| 1.x – 3.x |    ✅    |    ❌    |    ❌    |    ❌    | 7.x+ |

> [!NOTE]
> The PHP versions you can use also depend on your Kirby version. With the plugin 6.x:
> Kirby 4 runs on PHP 8.4, Kirby 5 on PHP 8.4 – 8.5 and Kirby 6 on PHP 8.4 – 8.6.
>
> Kirby 3 only runs up to PHP 8.3, so it is not supported by the plugin 6.x. Use the plugin 5.1.x instead.

## Installation

### Installation with composer

Install the plugin version that matches your Kirby version:

| Kirby | Plugin | Command                                       |
|-------|--------|-----------------------------------------------|
| 6.x   | 6.x    | `composer require beebmx/kirby-env`           |
| 5.x   | 6.x    | `composer require beebmx/kirby-env`           |
| 4.x   | 6.x    | `composer require beebmx/kirby-env`           |
| 3.x   | 5.1.x  | `composer require beebmx/kirby-env:"~5.1.0"`  |

Composer installs the newest plugin version your PHP version allows,
e.g. the plugin 5.2.x on PHP 8.3 with Kirby 4 or Kirby 5.

## Usage

You don't need to do anything if your want to access in any $page, just use the page method:

```php
$page->env('VAR');
```

But if you want to set variables in your `config.php` file, first you need to load the object with:

```php
\Beebmx\KirbyEnv::load('main/path');
```

You need to have an `.env` file in your `main/path` directory.  
You can store any credentials or variables secure like:

```ssh
KIRBY_DEBUG=false

SECRET_KEY=my_secret_key
PUBLIC_KEY=my_public_key

FOO=BAR
BAZ=${FOO}
```


## Options

When you create an instance of `\Beebmx\KirbyEnv` you need to load the environment with:

```php
\Beebmx\KirbyEnv::load();
```

If you require the immutability provided by `vlucas/phpdotenv`, just:

```php
\Beebmx\KirbyEnv::overload();
```

## Example

Here's an example of a configuration in `config.php`file:

```php
<?php

\Beebmx\KirbyEnv::load('main/path');

return [
    'debug' => env('KIRBY_DEBUG', false),
    'SECRET' => env('SECRET_KEY'),
    'PUBLIC' => env('PUBLIC_KEY'),
];

```

## Usage note

It is important that you add to your `.gitignore` the `.env` file. 
The `main/path` is where the `.env` file is located.
