<?php

use App\Models\ClientAddress;
use Tests\Expectations\ModelExpectation;

describe('ClientAddress', function () {
    ModelExpectation::hasRelations(
        ClientAddress::class,
        belongsTo: [
            'client',
        ],
    );

    test('get full address', function () {
        $clientAddress = ClientAddress::factory()->create([
            'address' => 'lala',
            ]);

        expect($clientAddress->fullAddress)
        ->toBe("lala, {$clientAddress->commune->name}, {$clientAddress->commune->region->name}");
    });
});
