<!-- readme.md -->

<p align="center">
    <img src="https://ldaprecord.com/logo.svg" width="400">
</p>

<p align="center">
    An LDAP browser for your **Laravel** application or development workflow.
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

This will register the below three (3) routes:

```php
Route::get('/', Connections::class)->name('ldap::connections');
Route::get('/{connection}', Browse::class)->name('ldap::browse');
Route::get('/{connection}/{guid}', Browse::class)->name('ldap::show');
```

Since Browser has an index route (`/`), it's recommended to wrap it inside of a group
with a prefix so it does not collide with your applications root index page.

## Usage

After you've registered Browser's routes, you're ready to start navigating your directory.

Visit your application at (if running `artisan serve`) [http://127.0.0.1:8000/ldap](http://127.0.0.1:8000/ldap).

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
