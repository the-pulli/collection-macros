# Useful Laravel collection macros

[![release](https://img.shields.io/github/release/the-pulli/collection-macros.svg?style=flat-square)](https://github.com/the-pulli/collection-macros/releases)
[![packagist](https://img.shields.io/packagist/v/pulli/collection-macros.svg?style=flat-square)](https://packagist.org/packages/pulli/collection-macros)
[![license](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/the-pulli/collection-macros/blob/main/LICENSE.md)
[![downloads](https://img.shields.io/packagist/dt/pulli/collection-macros.svg?style=flat-square)](https://packagist.org/packages/pulli/collection-macros)
![tests](https://github.com/the-pulli/collection-macros/actions/workflows/ci.yml/badge.svg)

## Installation

You can pull in the package via composer:

``` bash
composer require pulli/collection-macros
```

## Macros

- mapToCollectionFrom
- mapToCollection
- positive
- recursiveToArrayFrom
- recursiveToArray

### `mapToCollectionFrom`

Static method: Maps all arrays/objects recursively to a collection object of collections, which allow nested function calling.

```php
$collection = Collection::mapToCollectionFrom([['test' => 1], 2, 3]);

$collection->get(0)->get('test'); // returns 1

// Item has a toArray() public method, then it can be wrapped into a collection like this:
$collection = Collection::mapToCollectionFrom([Item(), Item()], true);
```

### `positive`

Returns a boolean value, if the collection contains elements or not.

```php
Collection::make([1, 2, 3])->positive() // returns true
Collection::make()->positive() // returns false
```

### `recursiveToArrayFrom`

Static method: Like `mapToCollectionFrom` it maps all arrays/objects recursively to an array.

```php
// Item has a toArray() public method, then it can be wrapped into the collection like this:
$array = Collection::recursiveToArrayFrom(['item1' => Item(), 'item2' => Item()]);
```
