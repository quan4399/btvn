<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list',compact('categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }


    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    function update(CreateCategoryRequest $request, $id) {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function delete(Request $request){
        try {
            $categoryId = $request->categoryId;
            Category::destroy($categoryId);
            $data = [
                'status' => 'success',
                'message' => 'Xoá thành công!'
            ];
        }catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'Lỗi hệ thống!'
            ];
        }

        return response()->json($data);
    }
}
