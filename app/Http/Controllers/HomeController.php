<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Settings;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $inbudgetprice = Settings::first('inbudget_price');
        $sliders = Slider::where('status', '1')->inRandomOrder()->get();
        $featured = Product::where([['status', '1'], ['featured', '1'],])->inRandomOrder()->latest()->take(20)->get();
        $trending = Product::where([['status', '1'], ['trending', '1'],])->inRandomOrder()->latest()->take(20)->get();
        $newarrivals = Product::where([['status', '1'], ['new_arrivals', '1'],])->inRandomOrder()->latest()->take(20)->get();
        $inbudget = Product::where([['status', '1'], ['selling_price', "<=", $inbudgetprice->inbudget_price ],])->orWhere([['status', '1'], ['discounted_price', "<=", $inbudgetprice->inbudget_price ],])->inRandomOrder()->latest()->take(20)->get();
        return view('pages.home', compact('sliders', 'featured', 'trending', 'newarrivals', 'inbudget'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function privacy()
    {
        return view('pages.privacypolicy');
    }

    public function search(Request $request)
    {
        if ($request->searchbar) {
            $products = Product::where([['status', '1'], ['name', 'LIKE', '%' . $request->searchbar . '%'],])->latest()->paginate(15);
            return view('collections.products.search', compact('products'));
        }
    }
    
    public function categories()
    {
        return view('collections.categories.index');
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        return view('collections.products.index', compact('category'));
    }
    
    public function viewproduct($category_slug, $product_slug )
    {
        $category = Category::where('slug', $category_slug)->first();
        $product = $category->product()->where([['status', '1'], ['slug', $product_slug],])->first();

        return view('collections.products.view', compact('product', 'category'));        
    }
}
