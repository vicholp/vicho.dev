<?php

use App\Models\StatsSiteView;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    StatsSiteView::class,
    belongsTo: [
        'client',
    ],
);
