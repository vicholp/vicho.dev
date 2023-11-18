<?php

use App\Models\Commune;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    Commune::class,
    belongsTo: [
        'region',
    ],
    hasMany: [
        'clientAddresses',
    ],
    useFactory: false
);
