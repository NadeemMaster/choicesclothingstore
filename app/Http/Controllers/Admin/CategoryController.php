<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;


class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function active()
    {
        return view('admin.category.active');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function add(CategoryFormRequest $request)
    {
        $validatedinfo = $request->validated();

        $category = new Category();
        $category->name = $validatedinfo['name'];
        $category->slug = Str::slug($validatedinfo['slug']);
        $category->description = $validatedinfo['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $fileext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->status = $request->status == true ? '1' : '0';
        $category->meta_title = $validatedinfo['meta_title'];
        $category->meta_description = $validatedinfo['meta_description'];
        $category->meta_keywords = $validatedinfo['meta_keywords'];
        $category->name = $validatedinfo['name'];
        $category->name = $validatedinfo['name'];
        $save = $category->save();

        if ($save) {
            return redirect()->route('indexcategory')->with('success', 'New Category added successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $request->validate([
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

        $category = Category::findOrFail($category);

        $category->name = $request['name'];
        $category->slug = Str::slug($request['slug']);
        $category->description = $request['description'];

        if ($request->hasFile('image')) {

            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $fileext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $fileext;

            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        } else {
            $category->image = $category->image;
        }

        $category->status = $request->status == true ? '1' : '0';
        $category->meta_title = $request['meta_title'];
        $category->meta_description = $request['meta_description'];
        $category->meta_keywords = $request['meta_keywords'];
        
        $update = $category->update();

        if ($update) {
            return redirect()->route('indexcategory')->with('success', 'Category updated successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }
}
