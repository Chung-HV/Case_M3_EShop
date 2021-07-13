<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('parent_id',0)->get();
        $categoriesLimit = Category::where('parent_id',0)->take(3)->get();
        $products = Product::where('category_id', $request->id)->paginate(3);
        return view('product.category.list', compact('categoriesLimit', 'products', 'categories'));
    }

}
