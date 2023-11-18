<?php

use Tests\Helpers\CreateProductWithVariation;

test('index', function () {
    $this->get(route('store.index'))
        ->assertOk()
        ->assertViewIs('store.index');
});

describe('product view', function () {
    test('it shows', function () {
        $product = CreateProductWithVariation::call();

        $this->get(route('store.product', $product))
        ->assertOk()
        ->assertViewIs('store.product')
        ->assertViewHas('product', $product);
    });
});

describe('search view', function () {
    test('search view with query string', function () {
        CreateProductWithVariation::call(3);

        $this->get(route('store.search', ['query' => 'something']))
        ->assertOk()
        ->assertViewIs('store.products');
    });
});

describe('checkout view', function () {
    test('it renders the checkout view', function () {
        $this->get(route('store.checkout'))
            ->assertStatus(200)
            ->assertViewIs('store.checkout')
            ->assertViewHas('regions')
            ->assertViewHas('communes')
            ->assertViewHas('shippingMethods')
            ->assertViewHas('paymentMethods');
    });
});
