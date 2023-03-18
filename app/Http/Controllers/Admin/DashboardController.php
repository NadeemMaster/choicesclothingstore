<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $totalorders = Order::count();
        $deliveredorders = Order::where('delivery_status', 'Received')->count();
        $confirmedorders = Order::where([['status', 'confirmed'],['delivery_status', 'in progress'],])->count();
        $pendingorders = Order::where('status', 'pending')->count();
        $totalcustomers = Customer::count();
        $totaladmins = Admin::count();
        $productslow = Product::where([['status', 1],['quantity', '<', '20']])->get();
        $totalproducts = Product::count();
        $activeproducts = Product::where('status', 1)->count();
        $totalcategories = Category::count();
        $activecategories = Category::where('status', 1)->count();
        $totalsubcategories = SubCategory::count();
        $activesubcategories = SubCategory::where('status', 1)->count();

        return view('admin.admin.dashboard', compact('productslow', 'totaladmins', 'totalcustomers', 'totalorders', 'deliveredorders', 'confirmedorders', 'pendingorders', 'totalproducts', 'activeproducts', 'totalcategories', 'activecategories', 'totalsubcategories', 'activesubcategories'));
    }
    
}
