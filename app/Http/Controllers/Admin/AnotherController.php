<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
class AnotherController extends Controller
{
    public function category(){
        $categories = Category::get();
        return Inertia::render('Admin/product/ListView',[
            'categories'=>$categories,
        ]);
    }


    public function brand(){
        $brands = Brand::get();
        return Inertia::render('Admin/product/ListView',[
            'brands'=>$brands,
        ]);
    }
}
