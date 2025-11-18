<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->middleware(['auth','is_admin']);
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getTree();
        return view('admin.categories.index', compact('categories'));
    }

    public function listPaginated()
    {
        $paginated = $this->service->listPaginated(15);
        return view('admin.categories.paginated', compact('paginated'));
    }

    public function create()
    {
        $allCategories = $this->service->getAll();
        return view('admin.categories.create', compact('allCategories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('admin.categories.index')->with('success','Category created');
    }

    public function edit($id)
    {
        $category = $this->service->find($id);
        $allCategories = $this->service->getAll()->where('id','!=',$category->id);
        return view('admin.categories.edit', compact('category','allCategories'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('admin.categories.index')->with('success','Category updated');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('admin.categories.index')->with('success','Category deleted');
    }
}
