<?php

use App\Models\StatsProductView;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    StatsProductView::class,
    belongsTo: [
        'client',
        'product',
    ],
);
