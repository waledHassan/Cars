<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\FuelType;
use App\Models\Image;
use App\Models\Origin;
use App\Models\products;
use App\Models\SellerType;
use App\Models\Specifications;
use App\Models\Statu;
use App\Models\Type;
use App\Models\user;
use App\Models\uses;
use App\Models\WheelPosition;
use App\Models\contact;
use App\Models\Wishlist;

use DB;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
                $usertype = Auth::user()->usertype;
                if($usertype == '1')
                {
                    return view('admin.home');
                }
                else
                {
                    $origins = Origin::all();
                    $wheelPositions = WheelPosition::all();
                    $FuelTypes = FuelType::all();
                    $categories = Category::where('id', '!=' , 1)->get();
                    $cars = products::where('category', '=' , 1)->where('approve', '=',1)->limit(4)->get();
                    $Specifications = Specifications::all();
                    $parts = products::where('category' , '=' , 2)->where('approve', '=',1)->limit(4)->get();
                    $electronics = products::where('category' , '=' , 3)->where('approve', '=',1)->limit(4)->get();
                    $estates = products::where('category' , '=' , 4)->where('approve', '=',1)->limit(4)->get();
                    $cars_cat = Category::where('id','=', 1)->get();
                    $types_car = Type::where('category', '=' , 1)->get();
                    $status = Statu::all();
                    $uses = uses::all();
                    $brands = Brand::all();
                    $seller_types = SellerType::all();
                    $sub_categoriesParts = SubCategory::where('category', '=' , 'parts')->get();
                    $sub_categoriesElect = SubCategory::where('category', '=' , 'electronics')->get();
                    $sub_categorieTrailers = SubCategory::where('category', '=' , 'trailers')->get();
                    $sub_categorieYachts = SubCategory::where('category', '=' , 'yachts')->get();
                    $sub_categorieCaravans = SubCategory::where('category', '=' , 'caravans')->get();

                    return view('user.home', compact('origins', 'categories', 'cars', 'Specifications', 'parts', 'electronics', 'estates',
                    'cars_cat', 'types_car', 'status', 'uses', 'brands', 'seller_types', 'sub_categoriesParts', 'sub_categoriesElect',
                    'sub_categorieTrailers', 'sub_categorieYachts', 'sub_categorieCaravans', 'FuelTypes', 'wheelPositions'));   
                }
        }
        else
        { 
            $origins = Origin::all();
            $wheelPositions = WheelPosition::all();
            $FuelTypes = FuelType::all();
            $categories = Category::where('id', '!=' , 1)->get();
            $cars = products::where('category', '=' , 1)->where('approve', '=',1)->limit(4)->get();
            $Specifications = Specifications::all();
            $parts = products::where('category' , '=' , 2)->where('approve', '=',1)->limit(4)->get();
            $electronics = products::where('category' , '=' , 3)->where('approve', '=',1)->limit(4)->get();
            $estates = products::where('category' , '=' , 4)->where('approve', '=',1)->limit(4)->get();
            $cars_cat = Category::where('id','=', 1)->get();
            $types_car = Type::where('category', '=' , 1)->get();
            $status = Statu::all();
            $uses = uses::all();
            $brands = Brand::all();
            $seller_types = SellerType::all();
            $sub_categoriesParts = SubCategory::where('category', '=' , 2)->get();
            $sub_categoriesElect = SubCategory::where('category', '=' , 3)->get();
            $sub_categorieTrailers = SubCategory::where('category', '=' , 5)->get();
            $sub_categorieYachts = SubCategory::where('category', '=' , 6)->get();
            $sub_categorieCaravans = SubCategory::where('category', '=' , 7)->get();
            return view('user.home', compact('origins', 'categories', 'cars', 'Specifications', 'parts', 'electronics', 'estates',
            'cars_cat', 'types_car', 'status', 'uses', 'brands', 'seller_types', 'sub_categoriesParts', 'sub_categoriesElect',
            'sub_categorieTrailers', 'sub_categorieYachts', 'sub_categorieCaravans', 'FuelTypes', 'wheelPositions'));    
        }
    }
###################### Details #######################
    public function details($slug)
    {
        $product = products::where('slug' , '=' , $slug)->get()->first();
        $Specification = Specifications::where('product_id' , '=' , $product->id)->get()->first();
        $user = user::where('id' , '=', $product->user_id)->get()->first();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::all();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        return view('user.details' , compact('product', 'Specification', 'user', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types'));
    }
######################## Cars List #####################
    public function cars_list()
    {
        $products = products::where('category', '=', 1)->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' , 1)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        return view('user.cars_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types'));
    }
####################### Search Cars ##################
    public function search_cars(Request $request)
    {
        if($request->ajax())
        {
        $category = 1;
        $type_car = $request->type_cars;
        $brand_cars = $request->brand_cars;
        $origin_cars = $request->origin_cars;
        $uses_cars = $request->uses_cars;
        $statuses_cars = $request->statuses_cars;
        $name = $request->name;
        if($request->price1)
        {
            $price1 = $request->price1;
            $price2 = $request->price2;
        }
        else
        {
            $price1 = 0;
            $price2 = 100000;
        }


        $Specification = Specifications::query();

        if($type_car != null){
            $Specification->where('type','=', $type_car);
        }
        if($brand_cars != null){
            $Specification->where('brand','=', $brand_cars);
        }
        if($origin_cars != null){
            $Specification->where('origin','=', $origin_cars);
        }
        if($uses_cars != null){
            $Specification->where('use','=', $uses_cars);
        }
        if($statuses_cars != null){
            $Specification->where('status','=', $statuses_cars);
        }
        
        $Specifications = $Specification->orderBy('id')->get();


        $product = products::query();

        if(!empty($category)){
            $product->where('category', '=', 1);
        }
        if($name != null){
            $product->where('name_en', 'like', "%$name%");
        }
        if(!empty($price1)){
            $product->where('price', '>=', $price1);
        }
        if(!empty($price2)){
            $product->where('price', '<=', $price2);
        }
        $products = $product->orderBy('id')->approve()->get();

        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        return view('user.cars_ajax_rasult', compact('Specifications', 'products', 'wheelPositions', 'FuelTypes', 'seller_types'));
        }
    }
##################### Categories List ###################
    public function categories_list($category)
    {
        $getCat = Category::where('slug','like',"%$category%")->get()->first();
        $products = products::where('category', '=', $getCat->id)->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' , $getCat->id)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        return view('user.categories_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types', 'category'));
    }
####################### Search Cars ##################
    public function search_category(Request $request)
    {
        if($request->ajax())
        {
        $category = $request->category;
        $getCat = Category::where('slug','like',"%$category%")->get()->first();
        $name = $request->name;
        $uses = $request->uses;
        $status = $request->statuses;
        if($request->price1)
        {
            $price1 = $request->price1;
            $price2 = $request->price2;
        }
        else
        {
            $price1 = 0;
            $price2 = 100000;
        }

        $Specification = Specifications::query();

        if($uses != null){
            $Specification->where('use','=', $uses);
        }
        if($status != null){
            $Specification->where('status','=', $status);
        }
        if($category != null){
            $Specification->where('category','=', $getCat->id);
        }

        $Specifications = $Specification->orderBy('id')->get();

        $product = products::query();

        if(!empty($category)){
            $product->where('category', '=', $getCat->id);
        }
        if($name != null){
            $product->where('name_en', 'like', "%$name%");
        }
        if(!empty($price1)){
            $product->where('price', '>=', $price1);
        }
        if(!empty($price2)){
            $product->where('price', '<=', $price2);
        }

        $products = $product->orderBy('id')->approve()->get();

        $status = statu::all();
        $uses = uses::all();
        return view('user.categories_ajax_rasult', compact('Specifications', 'products', 'status', 'uses'));
        }
    }
############### Index Search For Cars ###########
    public function indexSearchCars(Request $request)
    {
        $products = products::where('category', '=' , 1)->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' , 1)->where('type','=',$request->carType)->where('status','=',$request->carStatus)->where('brand','=',$request->carBrand)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        return view('user.cars_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types'));
    }
############### Index Search For Parts ###########
    public function indexSearchParts(Request $request)
    {
        $products = products::where('category', '=' ,2)->where('name_en', 'like', "%$request->nameParts%")->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' ,2)->where('status', '=' , $request->partsStatus)->where('use', '=' , $request->partsUses)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        $category = 'parts';
        return view('user.categories_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types', 'category'));
    }
############### Index Search For Electronics ###########
    public function indexSearchElectronics(Request $request)
    {
        $products = products::where('category', '=' ,3)->where('name_en', 'like', "%$request->nameElect%")->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' ,3)->where('status', '=' , $request->statusElect)->where('sub_category', '=' , $request->subCategoryElect)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        $category = 'electronics';
        return view('user.categories_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types', 'category'));
    }

############### Index Search For Real Estate ###########
    public function indexSearchEstate(Request $request)
    {
        $products = products::where('category', '=' ,4)->where('name_en', 'like', "%$request->estate_name%")->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' ,4)->where('status', '=' , $request->estateStatus)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        $category = 'real_estate';
        return view('user.categories_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types', 'category'));
    }
############### Index Search For Trailers ###########
    public function indexSearchTrailer(Request $request)
    {
        $products = products::where('category', '=' ,5)->where('name_en', 'like', "%$request->trailer_name%")->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' ,5)->where('status', '=' , $request->trailerStatus)->where('sub_category', '=' , $request->subCatTrailer)->where('use', '=' , $request->trailerUses)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        $category = 'trailers';
        return view('user.categories_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types', 'category'));
    }    
############### Index Search For Yachts ###########
    public function indexSearchYachts(Request $request)
    {
        $products = products::where('category', '=' ,6)->where('name_en', 'like', "%$request->yachts_name%")->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' ,6)->where('status', '=' , $request->YachtsStatus)->where('sub_category', '=' , $request->subCategoryYachts)->where('seller_type', '=' , $request->sellerTypeYacht)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        $category = 'yachts';
        return view('user.categories_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types', 'category'));
    }    
############### Index Search For Caravans ###########
    public function indexSearchCaravans(Request $request)
    {
        $products = products::where('category', '=' ,7)->where('name_en', 'like', "%$request->caravana_name%")->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' ,7)->where('status', '=' , $request->caravansStatus)->where('sub_category', '=' , $request->subCategorycaravans)->where('seller_type', '=' , $request->sellerTypecaravans)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $origins = origin::all();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        $category = 'caravans';
        return view('user.categories_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types', 'category'));
    }   
################### Add To Wish List ##############    
    public function addToWishlist($slug)
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $products = products::where('slug' , 'like' , "%$slug%")->get()->first();
            $product_exist_id = Wishlist::where('product_id' , '=' , $products->id)->where('user_id' , '=' , $userid)->get('id')->first();
            if($product_exist_id)
            {
                Alert::success('Product Already Exist' , 'We Add This Product Before');
            }
            else{
                $wishlist = new Wishlist;
                $wishlist->user_id = $userid;
                $wishlist->product_id = $products->id;
                $wishlist->quantity = 1;
                $wishlist->save();
                Alert::success('Product Added Suuccessfully' , 'We Add This Product To Your Wish List');
            }
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    } 
##################### Show Favorite Page ############
    public function favorite_page()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;

            $wishlists = Wishlist::where('user_id' , '=' , $userid)->get();
            $products = Products::where('approve', '=', '1')->get();
            $Specifications = Specifications::all();
            $categories = Category::where('id', '!=' , 1)->get();
            $origins = Origin::all();
            $wheelPositions = WheelPosition::all();
            $FuelTypes = FuelType::all();
            $seller_types = SellerType::all();
            $status = statu::all();
            $uses = uses::all();
            return view('user.favorite_page', compact('origins', 'wishlists', 'products', 'Specifications', 'categories', 'wheelPositions', 
            'FuelTypes', 'seller_types', 'uses', 'status'));
        }
        else
        {
            return redirect()->back();
        }
    }
##################### Show Add AD Page ################
    public function add_ad_page()
    {
        if(Auth::id())
        {
            $products = products::where('category', '=', 1)->where('approve', '=',1)->get();
            $Specifications = Specifications::where('category', '=' , 1)->get();
            $categories = Category::where('id', '!=' , 1)->get();
            $origins = origin::all();
            $AllCategories = category::all();
            $SubCategories = Subcategory::all();
            $types = Type::where('category', '=', 1)->get();
            $status = statu::all();
            $uses = uses::all();
            $brands = Brand::all();
            $wheelPositions = WheelPosition::all();
            $FuelTypes = FuelType::all();
            $seller_types = SellerType::all();
            return view('user.add_ad_page', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
            'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types'));
        }
        else
        {
            return redirect('login');
        }
    }
################# Upload AD #################
    public function upload_AD(Request $request)
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $username = Auth::user()->name;

            $data = new products;
            $image = $request->file;
            $imagename = time().'.'.$image->getClientoriginalExtension();
            $request->file->move('productimage' , $imagename);
            $data->image=$imagename;
            $data->user_id=$userid;
            $data->name_en=$request->product_name;
            $data->name_ar=$request->product_name_ar;
            $data->price=$request->price;
            $data->discription=$request->description;
            $data->discription_ar=$request->description_ar;
            $data->category=1;
            $data->approve=0;
            $data->slug = Str::slug($request->product_name);
            $data->save();

            $product_id = $data->id;
            $product_slug = $data->slug;

            $Specifications = new Specifications;
            $Specifications->product_id = $product_id;
            $Specifications->discount = $request->discount;
            $Specifications->username = $username;
            $Specifications->phone = $request->phone;
            $Specifications->whatsapp = $request->whatsapp;
            $Specifications->address = $request->address;
            $Specifications->category = 1;
            $Specifications->type = $request->type;
            $Specifications->status = $request->status;
            $Specifications->use = $request->uses;
            $Specifications->brand = $request->brand;
            $Specifications->origin = $request->origin;
            $Specifications->seller_type = $request->seller_type;
            $Specifications->wheel_position = $request->wheel_position;
            $Specifications->fuel_type = $request->fuel_type;
            $Specifications->color = $request->color;
            $Specifications->color_ar = $request->color_ar;


            $images = $request->file('files');
                if ($request->hasFile('files')) :
                        foreach ($images as $item):
                            $var = date_create();
                            $time = date_format($var, 'YmdHis');
                            $imageName = $time . '-' . $item->getClientOriginalName();
                            $item->move('productimage', $imageName);
                            $arr[] = $imageName;
                        endforeach;
                        $image = implode(",", $arr);
                    else:
                        $image = '';
                endif;

            $images = new Image;
            $images->image = $image;
            $images->product_id = $product_id;

            $images->save();

            $Specifications->save();
            Alert::success('Product Added Successfully' , 'We Add This Product But You Will Wait To Approve');
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
################## Show My Ads Page ##############
    public function my_ads()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;

            $products = Products::where('user_id', '=', $userid)->get();
            $Specifications = Specifications::all();
            $categories = Category::where('id', '!=' , 1)->get();
            $origins = Origin::all();
            $wheelPositions = WheelPosition::all();
            $FuelTypes = FuelType::all();
            $seller_types = SellerType::all();
            $status = statu::all();
            $uses = uses::all();
            return view('user.my_ads', compact('origins', 'products', 'Specifications', 'categories', 'wheelPositions', 
            'FuelTypes', 'seller_types', 'uses', 'status'));
        }
        else
        {
            return redirect()->back();
        }
    }
############### Show Pricing Page #################
    public function pricing()
    {
        $origins = Origin::all();
        $categories = Category::where('id', '!=' , 1)->get();
        return view('user.pricing', compact('categories', 'origins'));
    }
################ Show Cars Show #################
    public function carsShow_details()
    {
        $origins = Origin::all();
        $categories = Category::where('id', '!=' , 1)->get();
        return view('user.carsShow_details', compact('categories', 'origins'));
    }
#################### Show Contact Us Page ###########
    public function contact_us()
    {
        $origins = Origin::all();
        $categories = Category::where('id', '!=' , 1)->get();
        return view('user.contact_us', compact('categories', 'origins'));
    }
################# Upload Contact #################
    public function uploadContact(Request $request)
    {
        $data = new contact;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;

        $data->save();
        Alert::success('Message Added Suuccessfully' , 'We Will Contact You Soon');
        return redirect()->back();
    }
############### Show Cars With Origin ############
    public function carsOrigin($slug)
    {
        $getOrigin = Origin::where('slug', 'like', "%$slug%")->get()->first();
        $products = products::where('category', '=' , 1)->where('approve', '=',1)->get();
        $Specifications = Specifications::where('category', '=' , 1)->where('origin' , '=', $getOrigin->id)->get();
        $categories = Category::where('id', '!=' , 1)->get();
        $AllCategories = category::all();
        $SubCategories = Subcategory::all();
        $types = Type::where('category', '=', 1)->get();
        $status = statu::all();
        $origins = origin::all();
        $uses = uses::all();
        $brands = Brand::all();
        $wheelPositions = WheelPosition::all();
        $FuelTypes = FuelType::all();
        $seller_types = SellerType::all();
        return view('user.cars_list', compact('products', 'Specifications', 'categories', 'origins', 'AllCategories', 'SubCategories', 'types', 
        'status', 'uses', 'brands', 'wheelPositions', 'FuelTypes', 'seller_types'));
    }
}
