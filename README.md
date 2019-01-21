# Kirby Env

Kirby Env use the `vlucas/phpdotenv` package and enable their features for Kirby.
This package should be used if you want to store your project credentials or variables in a separate place from your code or if you want to have development and production access in different places.

## Installation

### Installation with composer

```ssh
composer require beebmx/kirby-env
```

## Usage

In your `index.php` add **before** `render()`:

```php
(new \Beebmx\KirbyEnv\Env('main/path'))->load();
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
$env = new \Beebmx\KirbyEnv;
$env->load();
```

If you require the immutability provides by `vlucas/phpdotenv`, just:

```php
$env = new \Beebmx\KirbyEnv;
$env->overload();
```



## Usage note

It is important that you add to your `.gitignore` the `.env` file.
