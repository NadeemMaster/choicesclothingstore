<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function active()
    {
        return view('admin.product.active');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function add(ProductFormRequest $request)
    {
        $validatedinfo = $request->validated();
        $category = Category::findOrfail($validatedinfo['category_id']);

        $product = $category->product()->create([
            'category_id' => $validatedinfo['category_id'],
            'subcategory_id' => $validatedinfo['subcategory_id'],
            'name' => $validatedinfo['name'],
            'slug' => Str::slug($validatedinfo['slug']),
            'sku' => $validatedinfo['sku'],
            'small_description' => $validatedinfo['small_description'],
            'description' => $validatedinfo['description'],
            'cost_price' => $validatedinfo['cost_price'],
            'selling_price' => $validatedinfo['selling_price'],
            'discounted_price' => $validatedinfo['discounted_price'],
            'discount_percent' => $validatedinfo['discount_percent'],
            'quantity' => $validatedinfo['quantity'],
            'status' => $request->status == true ? '1' : '0',
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0',
            'new_arrivals' => $request->new_arrivals == true ? '1' : '0',
            'meta_title' => $validatedinfo['meta_title'],
            'meta_description' => $validatedinfo['meta_description'],
            'meta_keywords' => $validatedinfo['meta_keywords'],
        ]);

        if ($request->hasFile('image')) {
            $uploadpath = 'uploads/product/';

            $i = 1;
            foreach ($request->file('image') as $image) {
                $imageext = $image->getClientOriginalExtension();
                $imagename = time() . '_' . $i++ . '.' . $imageext;
                $image->move($uploadpath, $imagename);
                $imagePathName = $uploadpath . $imagename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $imagePathName,
                ]);
            }
        }


        if ($product) {
            return redirect()->route('indexproduct')->with('success', 'Product added successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function edit(Product $product)
    {
        // $categories = Category::where('status', '1')->get();
        // $subcategories = SubCategory::all();
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $product)
    {
        $validatedinfo = $request->validate([
            'category_id' => [
                'required',
                'integer'
            ],
            'subcategory_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'sku' => [
                'required',
                'string'
            ],
            'small_description' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'image' => [
                'nullable',
            ],
            'cost_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer'
            ],
            'discounted_price' => [
                'nullable',
                'integer'
            ],
            'discount_percent' => [
                'nullable',
                'integer'
            ],
            'quantity' => [
                'required',
                'integer'
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

        $product = Category::findOrfail($validatedinfo['category_id'])->product()->where('id', $product)->first();

        $product->update([
            'category_id' => $validatedinfo['category_id'],
            'subcategory_id' => $validatedinfo['subcategory_id'],
            'name' => $validatedinfo['name'],
            'slug' => Str::slug($validatedinfo['slug']),
            'sku' => $validatedinfo['sku'],
            'small_description' => $validatedinfo['small_description'],
            'description' => $validatedinfo['description'],
            'cost_price' => $validatedinfo['cost_price'],
            'selling_price' => $validatedinfo['selling_price'],
            'discounted_price' => $validatedinfo['discounted_price'],
            'discount_percent' => $validatedinfo['discount_percent'],
            'quantity' => $validatedinfo['quantity'],
            'status' => $request->status == true ? '1' : '0',
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0',
            'new_arrivals' => $request->new_arrivals == true ? '1' : '0',
            'meta_title' => $validatedinfo['meta_title'],
            'meta_description' => $validatedinfo['meta_description'],
            'meta_keywords' => $validatedinfo['meta_keywords'],
        ]);

        if ($request->hasFile('image')) {
            $uploadpath = 'uploads/product/';

            $i = 1;
            foreach ($request->file('image') as $image) {
                $imageext = $image->getClientOriginalExtension();
                $imagename = time() . '_' . $i++ . '.' . $imageext;
                $image->move($uploadpath, $imagename);
                $imagePathName = $uploadpath . $imagename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $imagePathName,
                ]);
            }
        }

        if ($product) {
            return redirect()->route('indexproduct')->with('success', 'Product Updated successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function deleteimage($productimage_id)
    {
        $productimage = ProductImage::findOrfail($productimage_id);
         if(File::exists($productimage->image)){
            File::delete($productimage->image);
         }
         $productimage->delete();
         return redirect()->back()->with('success', 'Product Image deleted Successfully!');
    }
}
