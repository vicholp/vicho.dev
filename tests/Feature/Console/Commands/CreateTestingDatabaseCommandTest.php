<?php

test('create test database if exists', function () {
    DB::shouldReceive('statement')
        ->with('CREATE DATABASE testing')
        ->once();

    $this->artisan('db:testing')
         ->expectsOutput('Database created successfully!')
         ->assertExitCode(0);
});

test('do not create test database if exists', function () {
    DB::shouldReceive('statement')
        ->with('CREATE DATABASE testing')
        ->once()
        ->andThrow(new Exception());

    $this->artisan('db:testing')
         ->expectsOutput('Database already exists!')
         ->assertExitCode(0);
});
