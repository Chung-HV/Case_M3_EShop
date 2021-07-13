<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id',0)->get();
        $products = Product::latest()->take(6)->get();
        $productsRecommends = Product::latest('view_count')->take(12)->get();
        $categoriesLimit = Category::where('parent_id',0)->take(3)->get();

        return view('home.home', compact('sliders', 'categories', 'products', 'productsRecommends','categoriesLimit'));
    }
    public function addToCart($id)
    {
        $cart=session()->get('cart');
        $product=Product::find($id);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name'=>$product->name,
                'price'=>$product->price,
                'image'=>$product->feature_image_path,
                'quantity'=>1

            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code'=> 200,
            'message'=>'success'
        ], 200);
    }

    public function showCart()
    {
        $carts = session()->get('cart');
        $categoriesLimit = Category::where('parent_id',0)->take(3)->get();

        return view('product.cart.cart', compact('carts', 'categoriesLimit'));
    }

    public function updateCart(Request $request)
    {
       if($request->id && $request->quantity){
           $carts = session()->get('cart');
           $carts[$request->id]['quantity'] = $request->quantity;
           session()->put('cart', $carts);
           $carts = session()->get('cart');
           $cartComponent = view('product/cart_component', compact('carts'))->render();
           return response()->json(['cart_component'=>$cartComponent, 'code'=>200], 200);

       }
    }

    public function deleteCart(Request $request)
    {
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('product/cart_component', compact('carts'))->render();
            return response()->json(['cart_component'=>$cartComponent, 'code'=>200], 200);

        }

    }

    public function searchProduct(Request $request)
    {
        $products = Product::Where('name', 'like', '%'.$request->search.'%')->paginate(5);
        return view('product.search', compact('products'));
    }
}
