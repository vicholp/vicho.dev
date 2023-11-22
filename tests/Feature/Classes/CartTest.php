<?php

use App\Classes\Cart;
use App\Models\ProductVariation;

describe('append an item', function () {
    test('when item is valid then it is appended', function () {
        $cart = new Cart([]);

        $variation = ProductVariation::factory()->create();

        $cart->append($variation, 2);

        expect($cart->getProducts()->toArray())->toBe([
            $variation->id => [
                'id' => $variation->id,
                'quantity' => 2,
            ],
        ]);
    });

    test('when item does not exist then it throw exception', function () {
        expect(fn () => Cart::createFromArray([
            ['id' => 0, 'quantity' => 2],
            ]))->toThrow(\Exception::class, 'Invalid cart item');
    });

    test('when item is in cart then quantity is added', function () {
        $cart = new Cart([]);

        $variation = ProductVariation::factory()->create();

        $cart->append($variation, 2);
        $cart->append($variation, 2);

        expect($cart->getProducts()->toArray())->toBe([
            $variation->id => [
                'id' => $variation->id,
                'quantity' => 4,
            ],
        ]);
    });
});

describe('remove item', function () {
    test('when removing an added item then its removed', function () {
        $cart = new Cart([]);

        $variations = ProductVariation::factory()->count(2)->create();

        $cart->append($variations[0], 2);
        $cart->append($variations[1], 3);

        $cart->remove($variations[0]);

        expect($cart->getProducts()->toArray())->toBe([
            $variations[1]->id => [
                'id' => $variations[1]->id,
                'quantity' => 3,
            ],
        ]);
    });

    test('remove an item that does not exist', function () {
        $cart = new Cart([]);

        $cart->remove(ProductVariation::factory()->create());

        expect($cart->getProducts()->toArray())->toBe([]);
    });
});

test('products', function () {
    $variations = ProductVariation::factory()->count(5)->create();

    $cart = $variations->mapWithKeys(function ($variation) {
        return [$variation->id => [
            'id' => $variation->id,
            'quantity' => 2,
        ]];
    });

    $cartObject = new Cart($cart->toArray());

    expect($cartObject->getProducts()->count())->toBe(5);
    expect($cartObject->getProducts()->first()['id'])->toBe($variations[0]->id);
    expect($cartObject->getProducts()->first()['quantity'])->toBe(2);
});

test('get products total', function () {
    $variations = ProductVariation::factory()->count(5)->create();

    $cart = $variations->mapWithKeys(function ($variation) {
        return [$variation->id => [
            'id' => $variation->id,
            'quantity' => random_int(1, 4),
        ]];
    });

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['quantity'] * $variations->find($item['id'])->price;
    }

    $cartObject = new Cart($cart->toArray());

    expect($cartObject->getProductsTotal())->toBe($total);
});
