<?php

use App\Models\User;
use App\Services\RoleService;
use Tests\Expectations\ModelExpectation;

ModelExpectation::hasRelations(
    User::class,
    hasOne: [
        'client',
        'admin',
    ],
);

it('have a role', function () {
    $user = User::factory()->create();

    expect($user->role())->toBeInstanceOf(RoleService::class);
});
