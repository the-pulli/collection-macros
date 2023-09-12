# Useful Laravel collection macros

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
