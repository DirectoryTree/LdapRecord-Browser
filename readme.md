<p align="center">
    <img src="https://ldaprecord.com/logo.svg" width="400">
</p>

<p align="center">
    An LDAP browser for your <strong>Laravel</strong> application or development workflow.
</p>

<p align="center">
    <a href="https://laravel.com"><img src="https://img.shields.io/badge/Built_for-Laravel-green.svg?style=flat-square"></a>
    <a href="https://packagist.org/packages/directorytree/ldaprecord-browser"><img src="https://img.shields.io/packagist/dt/directorytree/ldaprecord-browser.svg?style=flat-square"></a>
    <a href="https://packagist.org/packages/directorytree/ldaprecord-browser"><img src="https://img.shields.io/packagist/v/directorytree/ldaprecord-browser.svg?style=flat-square"></a>
    <a href="https://packagist.org/packages/directorytree/ldaprecord-browser"><img src="https://img.shields.io/packagist/l/directorytree/ldaprecord-browser.svg?style=flat-square"></a>
</p>

## Requirements

-   Laravel >= 8.0
-   LdapRecord-Laravel >= 2.0

## Installation

Before installing LdapRecord-Browser, [configure your LDAP connections](https://ldaprecord.com/docs/laravel/v2/configuration).

After configuring your connections, install LdapRecord-Browser via composer:

```bash
composer require directorytree/ldaprecord-browser
```

Then, inside of your `routes/web.php` file, register Browser's routes via:

```php
// routes/web.php

Route::prefix('/ldap')->group(function () {
    \LdapRecord\Browser\Browser::routes();
});
```

Since Browser has an index route (`/`), it's recommended to wrap it inside of a group
with a prefix so it does not collide with your applications root index page.

## Usage

After you've registered Browser's routes, you're ready to start navigating your directory.

Visit your application at (if running `php artisan serve`) [http://127.0.0.1:8000/ldap](http://127.0.0.1:8000/ldap).

You will see a list of connections you have configured:

<p align="center">
    <img src="https://github.com/DirectoryTree/LdapRecord-Browser/blob/master/screenshots/connections.png" title="Browser connections view">
</p>

Click one of the connections and you will be taken to a view of
your entire directory, where you may search and view all
objects visible by your configured user account:

<p align="center">
    <img src="https://github.com/DirectoryTree/LdapRecord-Browser/blob/master/screenshots/browser.png" title="Browser object view">
</p>

## Configuration

LdapRecord-Browser is configured out of the box for use with Active Directory LDAP servers.

If you're connecting to a different LDAP server, such as OpenLDAP, you may alter the LdapRecord model references Browser utilizes.

To update these references, call `LdapRecord\Browser\Browser::models()` inside of your `AppServiceProvider::boot()` method:

```php
use LdapRecord\Browser\Browser;
use LdapRecord\Browser\ModelType;

public function boot()
{
    Browser::models([
        ModelType::USER => \LdapRecord\Models\OpenLDAP\User::class,
        ModelType::GROUP => \LdapRecord\Models\OpenLDAP\Group::class,
        ModelType::DEFAULT => \LdapRecord\Models\OpenLDAP\Entry::class,
        ModelType::UNKNOWN => \LdapRecord\Models\OpenLDAP\Entry::class,
        ModelType::COMPUTER => \LdapRecord\Models\OpenLDAP\Entry::class,
        ModelType::CONTAINER => \LdapRecord\Models\OpenLDAP\OrganizationalUnit::class,
    ]);
}
```

> **Note**: If you've created your own LdapRecord models, feel free to update these references to those instead.
