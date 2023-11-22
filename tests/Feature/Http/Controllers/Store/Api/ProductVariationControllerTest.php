<?php

use App\Models\ProductVariation;

test('show', function () {
    $productVariation = ProductVariation::factory()->create();

    $this->get(route('api.store.product-variations.show', $productVariation))
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
            ],
        ]);
});
