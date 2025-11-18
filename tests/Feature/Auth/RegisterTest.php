<?php

use App\Models\User;

it('shows register page', function () {
    $this->get('/register')->assertStatus(200);
});

it('registers a new user', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'user'
    ]);

    $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
});
