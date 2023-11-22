<?php

use App\Models\Admin;
use App\Models\Product;
use Tests\Helpers\CreateProductWithVariation;

describe('index action', function () {
    test('when there are products', function () {
        $admin = Admin::factory()->create();

        CreateProductWithVariation::callMany(10);

        $this->actingAs($admin->user)
            ->get(route('admin.products.index'))
            ->assertOk()
            ->assertViewIs('admin.products.index')
            ->assertViewHas('products');
    });

    test('when there are not products', function () {
        $admin = Admin::factory()->create();

        $this->actingAs($admin->user)
            ->get(route('admin.products.index'))
            ->assertOk()
            ->assertViewIs('admin.products.index')
            ->assertViewHas('products');
    });
});

test('create action', function () {
    $admin = Admin::factory()->create();

    $this->actingAs($admin->user)
        ->get(route('admin.products.create'))
        ->assertOk()
        ->assertViewIs('admin.products.create');
});

test('edit', function () {
    $admin = Admin::factory()->create();

    $product = Product::factory()->create();

    $this->actingAs($admin->user)
        ->get(route('admin.products.edit', $product))
        ->assertOk()
        ->assertViewIs('admin.products.edit')
        ->assertViewHas('product', $product);
});

describe('store product', function () {
    test('with minimal info', function () {
        $admin = Admin::factory()->create();
        $product = Product::factory()->make()->only('name', 'price', 'status');

        $this->actingAs($admin->user)
            ->post(route('admin.products.store'), $product)
            ->assertSessionHasNoErrors();
    });

    test('with all info', function () {
        $admin = Admin::factory()->create();
        $product = Product::factory()->make()->toArray();

        $this->actingAs($admin->user)
            ->post(route('admin.products.store'), $product)
            ->assertSessionHasNoErrors();
    });
});

describe('edit product', function () {
});

test('toggle visible', function () {
    $admin = Admin::factory()->create();

    $product = Product::factory()->create(['is_visible' => false]);

    $this->actingAs($admin->user)
        ->post(route('admin.products.toggle-visible', $product));

    expect($product->fresh()->is_visible)->toBeTrue();
});
