<?php

use App\Enums\ProductStatus\ProductStatus;

test('label', function () {
    expect(ProductStatus::OUT_OF_STOCK->label())->toBe('Out of stock');
    expect(ProductStatus::IN_STOCK->label())->toBe('In stock');
    expect(ProductStatus::DISCONTINUED->label())->toBe('Discontinued');
    expect(ProductStatus::PREORDER->label())->toBe('Preorder');
});
