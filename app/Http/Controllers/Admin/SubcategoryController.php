<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    //add subcategory
    public function add(){
        $categories = Category::all();
        return view('admin.subcategory.subcategory_add',compact('categories'));
    }//end method


    //store subcategory
    public function store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required|unique:subcategories',
        ],[
            'category_id.required'=>'Category name is required',
            'subcategory_name.required'=>'Subcategory name is required',
            'subcategory_name.unique'=>'This Subcategory name is already exists',
        ]);

        $data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;

        Subcategory::create($data);
        return redirect()->back()->with('message','Subcategory created successfully');
    }//end method


    //subcategory manage(subcategory list)
    public function index(){
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index',compact('subcategories'));
    }//end method


    //subcategory edit
    public function edit($id){
        $categories = Category::all();
        $subcategory = Subcategory::find($id);
        return view('admin.subcategory.subcategory_edit',compact('categories','subcategory'));
    }//end method


    //subcategory update
    public function update(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required|unique:subcategories,subcategory_name,'.$request->id,
        ],[
            'category_id.required'=>'Category name is required',
            'subcategory_name.required'=>'Subcategory name is required',
            'subcategory_name.unique'=>'This Subcategory name is already exists',
        ]);

        $data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;

        Subcategory::find($request->id)->update($data);
        return redirect('/admin/subcategory/manage')->with('message','Subcategory updated successfully');
    }//end method


    //subcategory delete
    public function delete($id){
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect('/admin/subcategory/manage')->with('message','Subcategory deleted successfully');
    }//end method


    //sub category auto select by ajax
    public function subcategoryAutoSelect($category_id){
        $subcategories = Subcategory::where('category_id',$category_id)->get();
        return json_encode($subcategories);
    }//end method
}
