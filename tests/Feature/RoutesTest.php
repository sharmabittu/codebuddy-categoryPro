<?php

use App\Models\User;

it('login route exists', function () {
    expect(Route::has('login'))->toBeTrue();
});

it('dashboard route exists', function () {
    expect(Route::has('dashboard'))->toBeTrue();
});
