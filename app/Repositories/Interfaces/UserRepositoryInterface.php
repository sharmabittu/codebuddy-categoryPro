<?php
namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function paginate($perPage = 15): LengthAwarePaginator;
    public function find($id);
}
