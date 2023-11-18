<?php

use App\Classes\Rut;
use App\Enums\PaymentMethod\PaymentMethod;
use App\Enums\ShippingMethod\ShippingMethod;
use App\Models\Client;
use App\Models\ClientAddress;
use App\Models\Order;
use App\Models\States\Order\Confirmed;
use App\Models\States\Order\Processing;
use App\Models\States\Order\WaitingPayment;
use App\Services\DiscountService;
use App\Services\OrderService;
use App\Services\ShippingService;
use Tests\Helpers\CreateValidCart;

describe('place order', function () {
    test('when data is valid then it is stored', function () {
        $cart = CreateValidCart::call();
        $client = Client::factory()->create();
        $address = ClientAddress::factory()->for($client)->create();
        $shippingMethod = fake()->randomElement(ShippingMethod::class);
        $paymentMethod = fake()->randomElement(PaymentMethod::class);
        $extra = fake()->text();

        $shippingService = new ShippingService($address, $shippingMethod);
        $discountService = new DiscountService();

        $order = OrderService::place(
            $client,
            $cart,
            $address,
            $shippingMethod,
            $paymentMethod,
            $extra,
        );

        expect($order->uuid)->toBeString();

        expect($order->client->id)->toBe($client->id);

        expect($order->shipping_amount)->toBe($shippingService->getShippingTotal());
        expect($order->discount_amount)->toBe($discountService->getDiscountTotal());
        expect($order->items_amount)->toBe($cart->getProductsTotal());
        expect($order->total_amount)->toBe(
            $cart->getProductsTotal() +
            $shippingService->getShippingTotal() -
            $discountService->getDiscountTotal()
        );

        expect($order->shipping_address)->toBe($address->fullAddress);
        expect($order->shipping_method)->toBe($shippingMethod);
        expect($order->payment_method)->toBe($paymentMethod);

        expect($order->is_payment_completed)->toBeFalse();

        expect($order->extra)->toBe($extra);

        expect($order->products->pluck('id'))
            ->toBeEqualCollection($cart->getProducts()->pluck('id'));
    });

    test('when payment method is cash then it is confirmed', function () {
        $cart = CreateValidCart::call();
        $client = Client::factory()->create();
        $address = ClientAddress::factory()->for($client)->create();
        $shippingMethod = fake()->randomElement(ShippingMethod::class);
        $paymentMethod = PaymentMethod::CASH;

        $order = OrderService::place(
            $client,
            $cart,
            $address,
            $shippingMethod,
            $paymentMethod,
            null,
        );

        expect($order->status)->toBeInstanceOf(Confirmed::class);
    });
    test('when payment should wait then status is waiting payment', function () {
        $cart = CreateValidCart::call();
        $client = Client::factory()->create();
        $address = ClientAddress::factory()->for($client)->create();
        $shippingMethod = fake()->randomElement(ShippingMethod::class);
        $paymentMethod = PaymentMethod::WEBPAY;

        $order = OrderService::place(
            $client,
            $cart,
            $address,
            $shippingMethod,
            $paymentMethod,
            null,
        );

        expect($order->status)->toBeInstanceOf(WaitingPayment::class);
    });
});

describe('update order state', function () {
    test('when order is processing then it is passed to confirmed', function () {
        $order = Order::factory()->create([
            'status' => Processing::class,
        ]);

        $state = Confirmed::class;

        OrderService::updateState($order, $state);

        expect($order->status)->toBeInstanceOf($state);
    });
});

describe('should be confirmed', function () {
    test('when confirmed status is not allowed it should not be confirmed', function () {
        $order = Order::factory()->create([
            'status' => Confirmed::class,
        ]);

        expect(OrderService::shouldBeConfirmed($order))->toBeFalse();
    });

    test('when payment method is cash it should be confirmed', function () {
        $order = Order::factory()->create([
            'status' => Processing::class,
            'payment_method' => PaymentMethod::CASH,
        ]);

        expect(OrderService::shouldBeConfirmed($order))->toBeTrue();
    });

    test('when payment method is not cash it should not be confirmed', function () {
        $order = Order::factory()->create([
            'status' => Processing::class,
            'payment_method' => PaymentMethod::WEBPAY,
        ]);

        expect(OrderService::shouldBeConfirmed($order))->toBeFalse();
    });
});

describe('handle client', function () {
    test('when client exists then it is updated', function () {
        $client = Client::factory()->create();

        $newClient = OrderService::handleClient($client->rut, 'nombre distinto', 'email distinto', 'telefono');

        expect($newClient->only(['id', 'rut_number', 'rut_dv', 'phone']))->toBe([
            'id' => $client->id,
            'rut_number' => $client->rut_number,
            'rut_dv' => $client->rut_dv,
            'phone' => 'telefono',
        ]);
        expect($newClient->user->only(['name', 'email']))->toBe([
            'name' => 'nombre distinto',
            'email' => 'email distinto',
        ]);
    });

    test('when client does not exist then it is created', function () {
        $rut = Rut::random();

        $newClient = OrderService::handleClient($rut, 'nombre', 'email', 'telefono');

        expect($newClient->only(['rut_number', 'rut_dv', 'phone']))->toBe([
            'rut_number' => $rut->getRut(),
            'rut_dv' => $rut->getDv(),
            'phone' => 'telefono',
        ]);
        expect($newClient->user->only(['name', 'email']))->toBe([
            'name' => 'nombre',
            'email' => 'email',
        ]);
    });
});

describe('handle client addresses', function () {
    //
})->todo();
