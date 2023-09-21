<?php

use Illuminate\Support\Collection;
use Pulli\CollectionMacros\Test\Data\ChildObject;
use Pulli\CollectionMacros\Test\Data\OtherObject;
use Pulli\CollectionMacros\Test\Data\ParentObject;

describe('recursiveToArray macro', function () {
    it('wraps nested collection and objects into array', function () {
       $data = Collection::recursiveToArray([
           new ParentObject(
               name: 'parent1',
               children: Collection::make([new ChildObject(name: 'child1')]),
               other: Collection::make([new OtherObject(value: 'other1')]),
           ),
           new ParentObject(
               name: 'parent2',
               children: Collection::make([new ChildObject(name: 'child2')]),
               other: Collection::make([new OtherObject(value: 'other2')]),
           ),
       ], true);

       expect($data)->toEqual([
           [
               'name' => 'parent1',
               'children' => [
                   ['name' => 'child1'],
               ],
               'other' => [
                   ['value' => 'other1'],
               ],
           ],
           [
               'name' => 'parent2',
               'children' => [
                   ['name' => 'child2'],
               ],
               'other' => [
                   ['value' => 'other2'],
               ],
           ],
       ]);
    });
});
