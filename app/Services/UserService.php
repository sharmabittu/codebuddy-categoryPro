<?php
namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function paginate($perPage = 15)
    {
        return $this->repo->paginate($perPage);
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }
}
