<?php

use App\Enums\ShippingMethod\ShippingMethod;
use App\Models\ClientAddress;

test('label', function () {
    expect(ShippingMethod::STARKEN->label())->toBe('Starken');
    expect(ShippingMethod::CHILEXPRESS->label())->toBe('Chilexpress');
    expect(ShippingMethod::CORREOS_CHILE->label())->toBe('Correos de Chile');
    expect(ShippingMethod::BLUE_EXPRESS->label())->toBe('Blue Express');
    expect(ShippingMethod::UPS->label())->toBe('UPS');
});

describe('shipping cost', function () {
    beforeEach(function () {
        $this->address = ClientAddress::factory()->make();
    });

    test('when shipping method is starken then cost is 0', function () {
        expect(ShippingMethod::STARKEN->getShippingCost($this->address))->toBe(0);
    });

    test('when shipping method is chilexpress then cost is 0', function () {
        expect(ShippingMethod::CHILEXPRESS->getShippingCost($this->address))->toBe(0);
    });

    test('when shipping method is correos de chile then cost is 0', function () {
        expect(ShippingMethod::CORREOS_CHILE->getShippingCost($this->address))->toBe(0);
    });

    test('when shipping method is blue express then cost is 0', function () {
        expect(ShippingMethod::BLUE_EXPRESS->getShippingCost($this->address))->toBe(0);
    });

    test('when shipping method is ups then cost is 0', function () {
        expect(ShippingMethod::UPS->getShippingCost($this->address))->toBe(0);
    });

    test('when shipping method is pickup then cost is 0', function () {
        expect(ShippingMethod::PICKUP->getShippingCost($this->address))->toBe(0);
    });
});
