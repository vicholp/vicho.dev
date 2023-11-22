<?php

use App\Enums\PaymentMethod\PaymentMethod;

test('label', function () {
    expect(PaymentMethod::WIRE_TRANSFER->label())->toBe('Wire Transfer');
    expect(PaymentMethod::WEBPAY->label())->toBe('Webpay');
    expect(PaymentMethod::PAYPAL->label())->toBe('Paypal');
});

describe('should wait payment', function () {
    test('when payment method is wire transfer then it should wait payment', function () {
        expect(PaymentMethod::WIRE_TRANSFER->shouldWaitPayment())->toBeTrue();
    });

    test('when payment method is webpay then it should wait payment', function () {
        expect(PaymentMethod::WEBPAY->shouldWaitPayment())->toBeTrue();
    });

    test('when payment method is paypal then it should wait payment', function () {
        expect(PaymentMethod::PAYPAL->shouldWaitPayment())->toBeTrue();
    });

    test('when payment method is cash then it should not wait payment', function () {
        expect(PaymentMethod::CASH->shouldWaitPayment())->toBeFalse();
    });
});
