<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view("admin.category", compact("categories"));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'string',
            'status' => 'required|numeric|in:0,1',
        ]);
        $category = Category::create($validatedData);
        return redirect()->route('admin.category')->with('success','تم إضافة القسم بنجاح');
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'string',
            'status' => 'required|numeric|in:0,1',
        ]);
        $category->update($validatedData);
        return redirect()->route('admin.category')->with('success', 'تم تعديل القسم بنجاح');

    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category')->with('success', 'تم حذف القسم بنجاح');


    }


}
