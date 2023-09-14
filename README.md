# Useful Laravel collection macros

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pulli/collection-macros.svg?style=flat-square)](https://packagist.org/packages/pulli/collection-macros)
![Tests](https://github.com/the-pulli/collection-macros/actions/workflows/ci.yml/badge.svg)

## Installation

You can pull in the package via composer:

``` bash
composer require pulli/collection-macros
```

## Macros

- mapToCollection

### `mapToCollection`

Maps all arrays recursively to a collection.

```php
$collection = Collection::mapToCollection([['test' => 1],2,3]);

$collection->get(0)->get('test'); // return 1;

// Item has a toArray() public method, then it can be wrapped into a collection like this:
$collection = Collection::mapToCollection([Item(),Item()], true);
```
