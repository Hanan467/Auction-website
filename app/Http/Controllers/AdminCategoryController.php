<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories = Category::where('is_deleted','0')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function createCategory(Request $request){
    $validatedData = $request->validate([
        'category_name' => 'required|string|max:255',
    ]);

    $category = new Category();
    $category->name = $validatedData['category_name'];
    $category->is_deleted = 0; 

    $category->save();

    return redirect()->back()->with('success', 'Category created successfully.');
}


    public function destroyCategory($id){
        $categories = Category::find($id);
        $categories->is_deleted = 2;
        $categories->save();

        return redirect()->back()->with('success', 'categories dismissed successfully.');
    }
}
