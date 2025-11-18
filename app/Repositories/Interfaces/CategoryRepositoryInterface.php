<?php
namespace App\Repositories\Interfaces;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function getTree(): Collection;
    public function getAll(): Collection;
    public function paginate($perPage = 15);
    public function find($id): Category;
    public function create(array $data): Category;
    public function update(Category $category, array $data): Category;
    public function delete(Category $category): bool;
}
