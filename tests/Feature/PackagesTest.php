<?php

use App\Models\Admin;

test('log viewer', function () {
    $admin = Admin::factory()->create();

    $this->actingAs($admin->user)
        ->get(route('admin.logs'))
        ->assertOk()
        ->assertSee('Log Viewer');
});
