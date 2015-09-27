# rtransat/hearthstone-api #

Hearthstone API provide a Laravel wrapper for [hearthstoneapi.com](http://hearthstoneapi.com/)

# Table of Contents
* [Requirements](#requirements)
* [Getting Started](#getting-started)
* [Example](#example)
* [Documentation](#documentation)
* [Improvements](#improvements)
* [Contribution Guidelines](#contribution-guidelines)
 
# <a name="requirements"></a>Requirements

* This package requires PHP 5.4+

# <a name="getting-started"></a>Getting Started

1. Require the package in your `composer.json` and update your dependency with `composer update`:

```
"require": {
    ...
    "rtransat/hearthstone-api": "dev-master",
},
```

2. Add the package to your application service providers in `config/app.php`.

```php
'providers' => [
    ...
    Rtransat\Hearthstone\Providers\ApiServiceProvider::class,
],
```

3. Add the package to your application aliases in `config/app.php`.

```php
'aliases' => [
    ...
    'Cards' =>  Rtransat\Hearthstone\Facades\Api::class,
],
```

4. Publish the package configuration to your application.

```
$ php artisan vendor:publish
```

5. Get your API key on [mashape.com](https://market.mashape.com/dashboard) and add it in `config/hearthstone-api.php`


# <a name="example"></a>Example

```php
Route::group(['prefix' => 'api'], function()
{
    Route::get('/cards', function()
    {
        return Cards::all();
    });

    Route::get('/search/{name}', function($name)
    {
        return Cards::search($name, ['locale' => 'frFR']);
    });
});
```

# <a name="documentation"></a>Documentation

## Available locales ##

enUS, enGB, deDE, esES, esMX, frFR, itIT, koKR, plPL, ptBR, ruRU, zhCN, zhTW

## Method available ##

### `all(array $parameters)` ###
Returns all available Hearthstone cards including non collectible cards.
```php
$parameters = [
    'attack' => NUMBER,
    'collectible' => NUMBER, // 1 only return collectible cards
    'cost' => NUMBER,
    'durability' => NUMBER,
    'health' => NUMBER,
    'locale' => STRING
];
Cards::all($parameters)
```

### `get($name, array $parameters)` ###
Returns cards by partial name.
```php
$name = 'Ysera';
$parameters = [
    'collectible' => NUMBER
    'locale' => STRING
];
Cards::get($name, $parameters)
```

### `backs(array $parameters)` ###
Return a list of all the card backs.
```php
$parameters = [
    'locale' => STRING
];
Cards::backs($parameters)
```

### `search($name, array $parameters)` ###
Returns cards by partial name.
```php
$name = 'gnome';
$parameters = [
    'collectible' => NUMBER
    'locale' => STRING
];
Cards::search($name, $parameters)
```

### `set($set, array $parameters)` ###
Returns all cards in a set. Example values: Blackrock Mountain, Classic.
```php
$set = 'Classic';
$parameters = [
    'attack' => NUMBER,
    'collectible' => NUMBER,
    'cost' => NUMBER,
    'durability' => NUMBER,
    'health' => NUMBER,
    'locale' => STRING
];
Cards::set($set, $parameters)
```

### `hero($hero, array $parameters)` ###
Returns all the cards of a class. Example values: Mage, Paladin.
```php
$hero = 'Mage';
$parameters = [
    'attack' => NUMBER,
    'collectible' => NUMBER,
    'cost' => NUMBER,
    'durability' => NUMBER,
    'health' => NUMBER,
    'locale' => STRING
];
Cards::hero($hero, $parameters)
```

### `faction($faction, array $parameters)` ###
Returns all the cards of a certain faction. Example values: Horde, Neutral.
```php
$faction = 'Neutral';
$parameters = [
    'attack' => NUMBER,
    'collectible' => NUMBER,
    'cost' => NUMBER,
    'durability' => NUMBER,
    'health' => NUMBER,
    'locale' => STRING
];
Cards::faction($faction, $parameters)
```

### `quality($quality, array $parameters)` ###
Returns all the cards of a certain quality. Example values: Legendary, Common.
```php
$quality = 'Lengendary';
$parameters = [
    'attack' => NUMBER,
    'collectible' => NUMBER,
    'cost' => NUMBER,
    'durability' => NUMBER,
    'health' => NUMBER,
    'locale' => STRING
];
Cards::quality($quality, $parameters)
```

### `race($race, array $parameters)` ###
Returns all the cards of a certain race. Example values: Mech, Murloc.
```php
$race = 'Murloc';
$parameters = [
    'attack' => NUMBER,
    'collectible' => NUMBER,
    'cost' => NUMBER,
    'durability' => NUMBER,
    'health' => NUMBER,
    'locale' => STRING
];
Cards::quality($race, $parameters)
```

### `type($type, array $parameters)` ###
Returns all the cards of a certain type. Example values: Spell, Weapon.
```php
$type = 'Spell';
$parameters = [
    'attack' => NUMBER,
    'collectible' => NUMBER,
    'cost' => NUMBER,
    'durability' => NUMBER,
    'health' => NUMBER,
    'locale' => STRING
];
Cards::type($type, $parameters)
```

### `info(array $parameters)` ###
Returns a list of current patch, classes, sets, types, factions, qualities, races and locales.
```php
$parameters = [
    'locale' => STRING
];
Cards::info($parameters)
```

# <a name="improvements"></a>Improvements

* [ ] Refactoring the source code.
* [ ] Adding cache.
* [ ] Adding tests.

# <a name="contribution-guidelines"></a>Contribution Guidelines

Support follows PSR-2 PHP coding standards.

Please report any issue you find in the issues page.
Feel free to pull requests. There are welcome :)