<?php

use Illuminate\Support\Collection;
use Pulli\CollectionMacros\Test\Data\ChildObject;
use Pulli\CollectionMacros\Test\Data\OtherObject;
use Pulli\CollectionMacros\Test\Data\ParentObject;
use Pulli\CollectionMacros\Test\Data\TestObject;

describe('mapToCollection macro', function () {
    it('wraps all arrays into collection objects', function () {
        $data = Collection::mapToCollection([
            ['test' => ['test' => '1.1']],
            ['test' => ['test' => '1.2']],
            ['test' => ['test' => ['test' => '1.3.1']]],
        ]);

        expect($data[0])->toBeInstanceOf(Collection::class)
            ->and($data[1])->toBeInstanceOf(Collection::class)
            ->and($data[0]['test'])->toBeInstanceOf(Collection::class)
            ->and($data[1]['test'])->toBeInstanceOf(Collection::class)
            ->and($data->get(0)->get('test')->get('test'))->toBe('1.1')
            ->and($data->get(1)->get('test')->get('test'))->toBe('1.2')
            ->and($data->get(2)->get('test')->get('test')->get('test'))->toBe('1.3.1');
    });

    it('wraps data objects into collection objects', function () {
        $data = Collection::mapToCollection([
            new TestObject('John Doe', 'Programmer'),
            new TestObject('Jane Doe', 'Designer'),
        ], true);

        expect($data[0])->toBeInstanceOf(Collection::class)
            ->and($data[1])->toBeInstanceOf(Collection::class)
            ->and($data->get(0))->toEqual(new Collection([
                'name' => 'John Doe',
                'job' => 'Programmer',
            ]))
            ->and($data->get(1))->toEqual(new Collection([
                'name' => 'Jane Doe',
                'job' => 'Designer',
            ]));
    });

    it('wraps nested data objects into collection objects', function () {
        $data = Collection::mapToCollection([
            ['first' => new TestObject('John Doe', 'Programmer')],
            ['second' => new TestObject('Jane Doe', 'Designer')],
        ], true);

        expect($data[0])->toBeInstanceOf(Collection::class)
            ->and($data[1])->toBeInstanceOf(Collection::class)
            ->and($data->get(0)->get('first'))->toEqual(new Collection([
                'name' => 'John Doe',
                'job' => 'Programmer',
            ]))
            ->and($data->get(1)->get('second'))->toEqual(new Collection([
                'name' => 'Jane Doe',
                'job' => 'Designer',
            ]));
    });

    it('wraps nested arrays and objects into collection objects', function () {
       $data = Collection::mapToCollection([
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

       expect($data->toArray())->toEqual([
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
