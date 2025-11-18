<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getTree(): Collection
    {
        return Category::with('childrenRecursive')->whereNull('parent_id')->orderBy('name')->get();
    }

    public function getAll(): Collection
    {
        return Category::orderBy('name')->get();
    }

    public function paginate($perPage = 15)
    {
        return Category::orderBy('id','desc')->paginate($perPage);
    }

    public function find($id): Category
    {
        return Category::findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): Category
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category): bool
    {
        return (bool) $category->delete();
    }
}
