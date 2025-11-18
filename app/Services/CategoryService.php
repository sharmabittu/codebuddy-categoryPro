<?php
namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    protected $repo;

    public function __construct(CategoryRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function find($id): Category
    {
        return $this->repo->find($id);
    }

    public function getTree(): Collection
    {
        return $this->repo->getTree();
    }

    public function listPaginated($perPage = 15)
    {
        return $this->repo->paginate($perPage);
    }

    public function create(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            return $this->repo->create($data);
        });
    }

    public function update($id, array $data): Category
    {
        $category = $this->repo->find($id);
        // prevent circular parent:
        if (!empty($data['parent_id'])) {
            $newParent = $this->repo->find($data['parent_id']);
            $p = $newParent;
            while ($p) {
                if ($p->id == $category->id) {
                    throw new \InvalidArgumentException('Invalid parent id (circular).');
                }
                $p = $p->parent;
            }
        }
        return DB::transaction(function () use ($category, $data) {
            return $this->repo->update($category, $data);
        });
    }

    public function delete($id): bool
    {
        $category = $this->repo->find($id);
        return DB::transaction(function () use ($category) {
            return $this->repo->delete($category);
        });
    }

    public function getAll(): Collection
    {
        return $this->repo->getAll();
    }
}
