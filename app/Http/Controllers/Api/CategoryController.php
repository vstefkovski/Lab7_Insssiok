<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->all();
        return CategoryResource::collection($categories);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryRepo->create($request->validated());
        return new CategoryResource($category);
    }

    public function show($id)
    {
        $category = $this->categoryRepo->find($id);
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryRepo->find($id);
        $category = $this->categoryRepo->update($category, $request->validated());
        return new CategoryResource($category);
    }

    public function destroy($id)
    {
        $category = $this->categoryRepo->find($id);
        $this->categoryRepo->delete($category);
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
