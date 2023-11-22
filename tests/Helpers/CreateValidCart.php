<?php

namespace Tests\Helpers;

use App\Classes\Cart;
use App\Models\ProductVariation;

class CreateValidCart
{
    public static function call(int $count = 4): Cart
    {
        $variations = ProductVariation::factory()->count($count)->create();

        return Cart::createFromArray($variations->map(function ($variation) {
            return [
                'id' => $variation->id,
                'quantity' => 2,
            ];
        })->toArray());
    }
}
