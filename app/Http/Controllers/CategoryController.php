<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::all();
        return view('categories.add_category', compact('categories'));
    }

    public function CategoryAdd(CategoryAddRequest $request)
    {
        Category::create($request->validated());
        return back();
    }

    public function CategoryDelete(Category $category)
    {
        $name = $category->category_name;
        $category->delete();
        return back()->with(['delete_category'=>$name]);
    }

    public function CategoryEdit(CategoryEditRequest $request, Category $category)
    {
        $request->validated();
        $name = $category->category_name;
        $category->category_name = $request->input('category_name');
        $category->save();
        return back()->with(['edit_category'=>$name,'old_edit_category'=>$category->category_name]);
    }
}
