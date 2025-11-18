<?php

use App\Models\User;
use App\Models\Category;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => 'admin']);
});

it('admin can see category list', function () {
    $this->actingAs($this->admin)
        ->get('/admin/categories')
        ->assertStatus(200);
});

it('admin can create a category', function () {
    $response = $this->actingAs($this->admin)
        ->post('/admin/categories', [
            'name' => 'New Category',
            'parent_id' => null
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('categories', [
        'name' => 'New Category',
    ]);
});

it('admin can update a category', function () {
    $category = Category::factory()->create();

    $this->actingAs($this->admin)
        ->put("/admin/categories/{$category->id}", [
            'name' => 'Updated Category',
            'parent_id' => null
        ])->assertRedirect();

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Updated Category'
    ]);
});

it('admin can delete a category', function () {
    $category = Category::factory()->create();

    $this->actingAs($this->admin)
        ->delete("/admin/categories/{$category->id}")
        ->assertRedirect();

    $this->assertDatabaseMissing('categories', [
        'id' => $category->id
    ]);
});
