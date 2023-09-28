<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\SaleDetail;
use App\Models\Sale;
use App\Models\Category;
use App\Models\Brand;
use Session;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
    public function productRecommend()
    {
        $product = Product::orderBy('id')->paginate(8);

        return view('dashboard', compact('product'));
    }
    function orderAdd(Request $req)
    {
        $data = Product::all();
        return view('orderadd', ['products'=>$data]);
    }
    function orderPlace(Request $req)
    {
        $cartUser = auth()->user()->id;
        $cartItems = SaleDetail::where('user_id', $cartUser)->get();
        foreach($cartItems as $item){
            $order = Order::create([
                'product_id' => $item->pro_id,
                'user_id' => $item->user_id,
                'status' => "รอดำเนินการ",
                'payment_method' => $req->payment,
                'payment_status' => "รอดำเนินการ",
                'ctm_name' => $req->name,
                'address' => $req->address,
                'tel' => $req->tel,
            ]);
        };
        $req->input();
        return redirect()->route('products.list');
    }
    function myOrders()
    {
        $cartUser = auth()->user()->id;
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $cartUser)
        ->get();

        return view('myorders', ['orders'=> $orders]);
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create', compact('categories','brands'));
    }
    public function store(Request $request){
        $request->validate([
            'product_stock' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
        ]);
        Product::create($request->post());

        return redirect()->route('products.list')->with('success','Product has been added');
    }
    public function show(Product $product){
        return view('products.show',compact('product'));
    }
    public function edit(Product $product){
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit',compact('product','categories','brands'));
    }
    public function update(Request $request,Product $product){
        $request->validate([
            'product_stock' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
        ]);
        $product->fill($request->post())->save();

        return redirect()->route('products.list')->with('success','Product has been updated');
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.list')->with('success','Category has been deleted');
    }
}