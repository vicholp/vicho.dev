<?php

use App\Models\Order;
use App\Models\States\Order\OrderStatus;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    Order::class,
    belongsTo: [
        'client',
    ],
    belongsToMany: [
        'products',
    ],
);

it('has factory', function () {
    $order = Order::factory()->create();

    expect($order)->toBeInstanceOf(Order::class);
});

it('has a status', function () {
    $order = Order::factory()->create();

    expect($order->status)->toBeInstanceOf(OrderStatus::class);
});
