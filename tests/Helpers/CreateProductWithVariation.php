<?php

namespace Tests\Helpers;

use App\Models\Product;
use Illuminate\Support\Collection;

class CreateProductWithVariation
{
    public static function call(): Product
    {
        return Product::factory()->hasVariations(1)->create();
    }

    /**
     * @return Collection<int, Product>
     */
    public static function callMany(int $count)
    {
        $products = collect();

        for ($i = 0; $i < $count; ++$i) {
            $products->push(self::call());
        }

        return $products;
    }
}
