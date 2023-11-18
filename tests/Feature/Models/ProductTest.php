<?php

use App\Models\Product;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    Product::class,
    hasMany: [
        'variations',
        'statsProductViews',
    ],
);

it('has searchable array', function () {
    $product = Product::factory()->create();

    expect($product->toSearchableArray())->toHaveKeys(['name']);
});
