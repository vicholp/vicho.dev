<?php

use App\Models\Product;

test('index', function () {
    Product::factory()->count(3)->create();

    $this->get(route('api.store.products.index'))
        ->assertOk()
        ->assertJsonCount(3, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ],
            ],
        ]);
});
