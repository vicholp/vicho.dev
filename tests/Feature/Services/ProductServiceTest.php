<?php

use App\Models\Product;
use App\Services\ProductService;

describe('create product', function () {
    test('when product is created without variations then default variation is attached ', function () {
        $product = Product::factory()->make();

        $variations = [];

        $product = ProductService::create($product, $variations);

        expect($product->variations->count())->toBe(1);
    });
});
