<?php

use Illuminate\Support\Collection;
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
});
