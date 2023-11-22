<?php

use App\Classes\Rut;
use App\Models\Client;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    Client::class,
    belongsTo: [
        'user',
    ],
    hasMany: [
        'addresses',
        'orders',
        'statsProductViews',
    ],
);

describe('get rut attribute', function () {
    test('returns a Rut instance', function () {
        $client = Client::factory()->create([
            'rut_number' => '12345678',
            'rut_dv' => '9',
        ]);

        expect($client->rut)->toBeInstanceOf(Rut::class);
        expect($client->rut->getRut())->toBe('12345678');
        expect($client->rut->getDv())->toBe('9');
    });
});
