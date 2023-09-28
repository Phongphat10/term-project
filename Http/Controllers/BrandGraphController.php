<?php
 
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Http\Request;
 
class BrandGraphController extends Controller
{
    public function index2(){
       $brand_total_price = DB::table('brand')
        ->join('products','brand.id','=','products.brand_id')
        ->selectRaw("sum(price*product_stock) AS brand_total_price , brand_name")
        ->groupBy(DB::raw('brand.brand_name'))
        ->pluck('brand_total_price','brand_name');
        $labels = $brand_total_price->keys();
        $data = $brand_total_price->values();
 
        return view('brand.brand_graph',compact('labels','data'));
    }
}
