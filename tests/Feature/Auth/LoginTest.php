
<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('shows login page', function () {
    $this->get('/login')->assertStatus(200);
});

it('allows valid login', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password')
    ]);

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'password'
    ])->assertRedirect('/dashboard');
});

it('rejects invalid login', function () {
    $this->post('/login', [
        'email' => 'wrong@example.com',
        'password' => 'invalid'
    ])->assertSessionHasErrors();
});

