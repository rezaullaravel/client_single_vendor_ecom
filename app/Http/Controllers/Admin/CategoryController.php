<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //add category
    public function addCategory(){
        return view('admin.category.category_add');
    }//end method


    //store category
    public function storeCategory(Request $request){

        $request->validate([
            'category_name'=>'required|unique:categories'
        ],[
            'category_name.required'=>'Category name is required',
            'category_name.unique'=>'The category name is already exists',
        ]);

       $category = new Category();
       $category->category_name = $request->category_name;
       $category->category_description = $request->category_description;
       $category->save();

       return redirect()->back()->with('info','Category added Successfully');
    }//end method



    //manage category
    public function manageCategory(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.category_manage',compact('categories'));
    }//end method


    //delete category
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->subcategories()->delete();
        $category->childcategories()->delete();
        $category->delete();
        return redirect()->back()->with('info','Category deleted Successfully');
    }//end method


    //edit category
    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.category_edit',compact('category'));
    }//end method


    //update category
    public function updateCategory(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories,category_name,'.$request->id,
        ],[
            'category_name.required'=>'Category name is required',
            'category_name.unique'=>'The category name is already exists',
        ]);

        Category::find($request->id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);

        return redirect('/admin/category/manage')->with('info','Category updated Successfully');
    }//end method











}//end class
