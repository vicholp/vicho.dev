<?php

use App\Models\Tag;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    Tag::class,
    belongsTo: [
        'tagGroup',
        'parent',
    ],
    hasMany: [
        'children',
    ],
    belongsToMany: [
        'products',
    ],
);
