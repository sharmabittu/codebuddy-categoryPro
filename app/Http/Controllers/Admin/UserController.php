<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->middleware(['auth','is_admin']);
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->service->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->service->find($id);
        return view('admin.users.show', compact('user'));
    }

    // Admin can open user dashboard (read only)
    public function dashboard($id)
    {
        $user = $this->service->find($id);
        return view('admin.users.dashboard', compact('user'));
    }
}
