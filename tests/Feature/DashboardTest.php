<?php

use App\Models\User;

it('redirects guest to login when accessing dashboard', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

it('allows authenticated user to access user dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertStatus(200);
});
