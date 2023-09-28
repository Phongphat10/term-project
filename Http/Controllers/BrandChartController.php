<?php
 
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Http\Request;
 
class BrandChartController extends Controller
{
    public function index(){
       $brand_count = DB::table('brand')
        ->join('products','brand.id','=','products.brand_id')
        ->select(DB::raw('count(*) as brand_count,brand.brand_name'))
        ->groupBy(DB::raw('brand.brand_name'))
        ->pluck('brand_count','brand_name');
        $labels = $brand_count->keys();
        $data = $brand_count->values();
 
        return view('brand.brand_chart',compact('labels','data'));
    }
}
