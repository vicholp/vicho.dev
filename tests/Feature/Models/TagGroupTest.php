<?php

use App\Models\TagGroup;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    TagGroup::class,
    hasMany: [
        'tags',
    ]
);
