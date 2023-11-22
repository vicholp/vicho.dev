<?php

describe('index view', function () {
    test('it shows', function () {
        $this->get(route('admin.orders.index'))
            ->assertOk()
            ->assertViewIs('admin.orders.index');
    });
})->todo();
