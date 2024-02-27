<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProducdtImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category','brand','product_image')->get();
        $categories = Category::get();
        $brands = Brand::get();
        return Inertia::render('Admin/product/ListView',[
            'products'=>$products,
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }

    public function store(Request $request){


        $product = new Product();
        $product->title = $request->title;
        $product->slug = Str::slug($request->slug);
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();
        
        
        if($request->hasFile('product_image')){
            $productImages = $request->file('product_image');
            foreach($productImages as $image){
            $imageName = time().'-'.Str::random(10).'.'.$image->getClientOriginalName();
            $image->move('product_image',$imageName);
             ProducdtImage::create([
              'product_id'=>$product->id,
               'image'=>'productImages/'.$imageName,
             ]);
            };
        }
        

        return redirect()->route('product.index')->with('success','product create has been succesful');
    }


}
