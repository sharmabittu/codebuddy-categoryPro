<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function paginate($perPage = 15): LengthAwarePaginator
    {
        return User::orderBy('id','desc')->paginate($perPage);
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }
}
