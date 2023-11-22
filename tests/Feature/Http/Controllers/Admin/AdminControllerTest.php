<?php

use App\Models\Admin;

test('index', function () {
    $admin = Admin::factory()->create();

    $this->actingAs($admin->user)
        ->get(route('admin.index'))
        ->assertOk()
        ->assertViewIs('admin.index');
});
