<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('create user', function () {
    $this->artisan('make:user')
         ->expectsQuestion('What is your name?', 'Taylor Otwell')
         ->expectsQuestion('What is your email?', 'taylor@laravel.com')
         ->expectsQuestion('What is your password?', 'password')
         ->expectsOutput('User created successfully!')
         ->assertExitCode(0);

    expect(User::count())->toBe(1);

    $user = User::first();

    expect($user->name)->toBe('Taylor Otwell');
    expect($user->email)->toBe('taylor@laravel.com');
    expect(Hash::check('password', $user->password))->toBeTrue();
});

test('create default user', function () {
    $this->artisan('make:user --default')
        ->expectsOutput('User created successfully!')
        ->assertExitCode(0);

    expect(User::count())->toBe(1);

    $user = User::first();

    expect($user->name)->toBe('Admin');
    expect($user->email)->toBe('admin@example.com');
    expect(Hash::check('password', $user->password))->toBeTrue();
});

test('create default admin', function () {
    $this->artisan('make:user --default --admin')
        ->expectsOutput('User created successfully!')
        ->assertExitCode(0);

    expect(User::count())->toBe(1);

    $user = User::first();

    expect($user->name)->toBe('Admin');
    expect($user->email)->toBe('admin@example.com');
    expect(Hash::check('password', $user->password))->toBeTrue();
    expect($user->admin)->not()->toBeNull();
});
