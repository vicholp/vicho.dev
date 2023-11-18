<?php

use App\Models\ProductVariation;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    ProductVariation::class,
    belongsTo: [
        'product',
    ],
);

test('when price is null, price from product is used', function () {
    $variation = ProductVariation::factory()->make([
        'price' => null,
    ]);

    expect($variation->price)->toBe($variation->product->price);
});

test('when price is int, price is used', function () {
    $variation = ProductVariation::factory()->make([
        'price' => 1000,
    ]);

    expect($variation->price)->toBe(1000);
});

test('when is not available, options are used', function () {
    $variation = ProductVariation::factory()->make([
        'name' => null,
        'options' => [
            'size' => 'XL',
            'color' => 'red',
        ],
    ]);

    expect($variation->name)->toBe('XL, red');
});
