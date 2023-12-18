# Useful Laravel collection macros

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pulli/collection-macros.svg?style=flat-square)](https://packagist.org/packages/pulli/collection-macros)
![Tests](https://github.com/the-pulli/collection-macros/actions/workflows/ci.yml/badge.svg)

## Installation

You can pull in the package via composer:

``` bash
composer require pulli/collection-macros
```

## Macros

- mapToCollectionFrom
- mapToCollection
- recursiveToArrayFrom
- recursiveToArray

### `mapToCollectionFrom`

Maps all arrays/objects recursively to a collection object of collections, which allow nested function calling.

```php
$collection = Collection::mapToCollectionFrom([['test' => 1],2,3]);

$collection->get(0)->get('test'); // returns 1

// Item has a toArray() public method, then it can be wrapped into a collection like this:
$collection = Collection::mapToCollectionFrom([Item(),Item()], true);
```

### `recursiveToArrayFrom`

Like `mapToCollectionFrom` it maps all arrays/objects recursively to an array.

```php
// Item has a toArray() public method, then it can be wrapped into the collection like this:
$array = Collection::recursiveToArrayFrom(['item1' => Item(), 'item2' => Item()]);
```
