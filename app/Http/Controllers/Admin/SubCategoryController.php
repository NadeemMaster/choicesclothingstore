<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SubCategoryFormRequest;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.subcategory.index');
    }

    public function active()
    {
        return view('admin.subcategory.active');
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function add(SubCategoryFormRequest $request)
    {
        $validatedinfo = $request->validated();

        $category = Category::findOrfail($validatedinfo['category_id']);

        if($request->hasFile('image')){
            $uploadpath = 'uploads/subcategory/'; 

            $file = $request->file('image');
            $fileext = $file->getClientOriginalExtension();
            $filename = time().'.'.$fileext;
            $file->move($uploadpath,$filename);
            
            
            $subcategory = $category->subcategory()->create([
                
                'name' => $validatedinfo['name'],
                'slug' => Str::slug($validatedinfo['slug']),
                'description' => $validatedinfo['description'],
                'image' => $filename,
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validatedinfo['meta_title'],
                'meta_description' => $validatedinfo['meta_description'],
                'meta_keywords' => $validatedinfo['meta_keywords'],
                
            ]);
        }
        
        if ($subcategory) {
            return redirect()->route('indexsubcategory')->with('success', 'New Sub Category added successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $subcategory)
    {
        $validatedinfo = $request->validate([
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'meta_title' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
            'meta_keywords' => [
                'required',
                'string'
            ],
        ]);

        $subcategory = SubCategory::findOrFail($subcategory);

        $subcategory->name = $validatedinfo['name'];
        $subcategory->slug = Str::slug($validatedinfo['slug']);
        $subcategory->description = $validatedinfo['description'];

        if($request->hasFile('image')){

            $path = 'uploads/subcategory/'.$subcategory->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $fileext = $file->getClientOriginalExtension();
            $filename = time().'.'.$fileext;
            
            $file->move('uploads/subcategory/',$filename);
            $subcategory->image = $filename;
        } else {
            $subcategory->image = $request['oldimage'];
        }
        
        $subcategory->status = $request-> status== true ? '1':'0';
        $subcategory->meta_title = $validatedinfo['meta_title'];
        $subcategory->meta_description = $validatedinfo['meta_description'];
        $subcategory->meta_keywords = $validatedinfo['meta_keywords'];
        
        $update = $subcategory->update();

        if ($update) {
            return redirect()->route('indexsubcategory')->with('success', 'Sub Category updated successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

}
