<?php

use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => 'admin']);
    $this->user  = User::factory()->create(['role' => 'user']);
});

it('admin can view user list', function () {
    $this->actingAs($this->admin)
        ->get('/admin/users')
        ->assertStatus(200);
});

it('user cannot access admin user list', function () {
    $this->actingAs($this->user)
        ->get('/admin/users')
        ->assertStatus(403);
});

it('admin can view a user detail page', function () {
    $this->actingAs($this->admin)
        ->get('/admin/users/' . $this->user->id)
        ->assertStatus(200);
});

it('admin can access user dashboard impersonation', function () {
    $this->actingAs($this->admin)
        ->get("/admin/users/{$this->user->id}/dashboard")
        ->assertStatus(200);
});

it('user cannot open admin dashboard', function () {
    $this->actingAs($this->user)
        ->get('/admin/dashboard')
        ->assertStatus(403);
});
