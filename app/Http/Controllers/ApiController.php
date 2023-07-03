<?php

namespace App\Http\Controllers;
use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\Specifications;
use App\Models\Category;
use App\Models\User;
use Dotenv\Validator;

class ApiController extends Controller
{
    // use GeneralTrait;

    public function AllProducts()
    {
        $product = Products::with(['specifications'=> function($q){
            $q ->select('*');
        }])->get();

        return response()->json($product);
    }

    public function getProductsByID(Request $request)
    {
        $product = Products::with(['specifications'=> function($q){
            $q ->select('*');
        }])->where('id', $request->id)->get();
        
        if($product)
        {
            return response()->json($product);
        }
    }


    public function updateProduct(Request $request)
    {
        $product = Products::findOrFail($request->id);
        $product->update($request->all());

        $product->update($request->all());


        return response()->json($product);
    }


    public function deleteProduct(Request $request)
    {
        $product = Products::findOrFail($request->id);
        $product->delete();

        $specifications = Specifications::where('product_id',$request->id);
        $specifications->delete();
        
        return "Deleted Successfully";
    }



    // public function getCategories()
    // {
    //     $categories = Category::select('id','name_'.app()->getLocale() .' as name')->get();

    //     return response()->json($categories);
    // }

    // public function getCategoryByID(Request $request)
    // {
    //     $category = Category::where('id', $request->id)->get();
    //     if(!$category)
    //     {
    //         return $this ->returnError(msg: 'This Id Not Found');
    //     }
    //     return $this -> returnData(key:'category',value: $category, msg: 'Hello');
    // }

}
