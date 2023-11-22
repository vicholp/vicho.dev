<?php

use App\Models\Region;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    Region::class,
    hasMany: [
        'communes',
    ],
    useFactory: false
);
