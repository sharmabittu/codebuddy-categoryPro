<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user()
    {
        $user = auth()->user();
        return view('dashboard.user', compact('user'));
    }

    public function admin()
    {
        // Logged-in user
        $user = auth()->user();

        // Load counts
        $userCount = User::count();
        $categoryCount = Category::count();
        $adminCount = User::where('role', 'admin')->count();

        // Recent Users
        $recentUsers = User::latest()->limit(5)->get();

        // Category Tree (Parent categories with children)
        $categories = Category::whereNull('parent_id')
            ->with('children') // Relation must be defined in Category model
            ->get();

        return view('dashboard.admin', compact(
            'user',
            'userCount',
            'categoryCount',
            'adminCount',
            'recentUsers',
            'categories'
        ));
    }
}
