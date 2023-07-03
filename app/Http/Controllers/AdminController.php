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

use DB;

class AdminController extends Controller
{

    public function showtableWithSlug($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $tables = DB::table($table)->get();
                return view('admin.showtableWithSlug' , compact('table' , 'tables'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
//////////////////////////////////
      //   Add Page              #
////////////////////////////////                
    public function addIntoTableWithSlug_form($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                    return view('admin.addIntoTableWithSlug_form', compact('table'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
//////////////////////////////////
        //   Upload             #
////////////////////////////////  
    public function uploadIntoTablewithSlug( Request $request, $table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $product_exist_id = DB::table($table)->where('name' , 'like' , "%$request->name_en%")->get('id')->first();
                if($product_exist_id)
                {
                    Alert::Warning('This Already Exist' , 'We Add This Before');
                }
                else
                {
                DB::table($table)->insert(
                    array(
                        'name_en'=>$request->name,
                        'name_ar'=>$request->name_ar,
                        'slug'=>Str::slug($request->name),
                    )
                );
                Alert::success('Data Added Successfully' , 'We Add This data Successfully');
                }
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
//////////////////////////////////
        // Delete               #
////////////////////////////////  
    public function DleteFromTablesWithSlug($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                DB::delete('delete from '.$table.' where id = ?',[$id]);
                Alert::Warning('Deleted Successfully' , 'We Delete This Successfully');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
//////////////////////////////////
        // Update Page          #
////////////////////////////////  
    public function updateFromTableswithslug_form($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                $data = DB::table($table)->where('id',$id)->get()->first();
                return view('admin.updateFromTableswithSlug_form', compact('data' , 'table'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
//////////////////////////////////
        // Update               #
////////////////////////////////  
    public function doUpdateFromTablesWithSlug(Request $request , $table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                $product_exist_id = DB::table($table)->where('name_en' , 'like', "%$request->name%")->where('id','!=', $id)->get('id')->first();
                if($product_exist_id)
                {
                    Alert::Warning('This Already Exist' , 'We Add This Before');
                }
                else
                {
                    DB::table($table)->where('id',$id)->update(array(
                        'name_en'=>$request->name,
                        'name_ar'=>$request->name_ar,
                        'slug'=>STR::slug($request->name),
                    ));
                    Alert::success('Data Updated Successfully' , 'We Update This data Successfully');
                }
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }

#######################################################################################################################################################

    public function showtable($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $tables = DB::table($table)->get();
                return view('admin.showtable' , compact('table' , 'tables'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
    //   Add Page              #
    ////////////////////////////////                
    public function addIntoTable_form($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                    return view('admin.addIntoTable_form', compact('table'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        //   Upload             #
    ////////////////////////////////  
    public function uploadIntoTable( Request $request, $table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $product_exist_id = DB::table($table)->where('name_en' , 'like' , "%$request->name%")->get('id')->first();
                if($product_exist_id)
                {
                    Alert::Warning('This Already Exist' , 'We Add This Before');
                }
                else
                {
                DB::table($table)->insert(
                    array(
                        'name_en'=>$request->name,
                        'name_ar'=>$request->name_ar,
                    )
                );
                Alert::success('Data Added Successfully' , 'We Add This data Successfully');
                }
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Delete               #
    ////////////////////////////////  
    public function DleteFromTable($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                DB::delete('delete from '.$table.' where id = ?',[$id]);
                Alert::Warning('Deleted Successfully' , 'We Delete This Successfully');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Update Page          #
    ////////////////////////////////  
    public function updateFromTable_form($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                $data = DB::table($table)->where('id',$id)->get()->first();
                return view('admin.updateFromTable_form', compact('data' , 'table'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Update               #
    ////////////////////////////////  
    public function doUpdateFromTable(Request $request , $table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                $product_exist_id = DB::table($table)->where('name_en', 'like' , "%$request->name%")->where('id','!=', $id)->get('id')->first();
                if($product_exist_id)
                {
                    Alert::Warning('This Already Exist' , 'We Add This Before');
                }
                else
                {
                    DB::table($table)->where('id',$id)->update(array(
                        'name_en'=>$request->name,
                        'name_ar'=>$request->name_ar,
                    ));
                    Alert::success('Data Updated Successfully' , 'We Update This data Successfully');
                }
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
#######################################################################################################################################################
    public function tables_category($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $tables = DB::table($table)->get();
                $categories = Category::all();
                return view('admin.tables_category' , compact('categories', 'table' , 'tables'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Add Form             #
    ////////////////////////////////  
    public function addIntoTableCategory_form($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $categories = Category::all();
                return view('admin.addIntoTableCategory_form', compact('table', 'categories'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Upload               #
    ////////////////////////////////  
    public function uploadIntoCategoryTable( Request $request, $table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $product_exist_id = DB::table($table)->where('name_en' , '=' , $request->name)->get('id')->first();
                if($product_exist_id)
                {
                    // Alert::Warning('This Already Exist' , 'We Add This Before');
                }
                else
                {
                    DB::table($table)->insert(
                        array(
                            'name_en'=>$request->name,
                            'name_ar'=>$request->name_ar,
                            'category'=>$request->category,
                        )
                    );
                    // Alert::success('Data Added Successfully' , 'We Add This data Successfully');
                }
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Update Form          #
    ////////////////////////////////  
    public function updateFromCategoryTables_form($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                $data = DB::table($table)->where('id',$id)->get()->first();
                $categories = Category::all();
                return view('admin.updateFromCategoryTables_form', compact('data' , 'table', 'categories'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Update               #
    ////////////////////////////////  
    public function doUpdateCategoryTable(Request $request , $table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                $product_exist_id = DB::table($table)->where('name_en' , '=' , $request->name)->where('id','!=', $id)->get('id')->first();
                if($product_exist_id)
                {
                    // Alert::Warning('This Already Exist' , 'We Add This Before');
                }
                else
                {
                    DB::table($table)->where('id',$id)->update(array(
                        'name_en'=>$request->name,
                        'name_ar'=>$request->name_ar,
                        'category'=>$request->category,
                    ));
                }
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Delete               #
    ////////////////////////////////  
    public function DleteFromTables_category($table)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $id = $_GET['id'];
                DB::delete('delete from '.$table.' where id = ?',[$id]);
                // Alert::Warning('Deleted Successfully' , 'We Delete This Successfully');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
#####################################################################################################################################################
    public function showusers()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $users = user::where('usertype', '=' , 0)->get();
                return view('admin.showusers', compact('users'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Delete               #
    //////////////////////////////// 
    public function Delete_user($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $data = user::find($id);
                $data->delete();
                Alert::Warning('This User Already Deleted' , 'We Delete This User Successfully');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
######################################################################################################################################################
    public function messages()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $messages = contact::all();
                return view('admin.messages', compact('messages'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Delete               #
    //////////////////////////////// 
    public function DleteMessage($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $data = contact::find($id);
                $data->delete();
                Alert::warning('message Deleted Successfully' , 'We Delete This Message');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
#######################################################################################################################################################
    public function showproducts()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $products = Products::all();
                $specifications = Specifications::all();
                return view('admin.showproducts', compact('products', 'specifications'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Approve              #
    //////////////////////////////// 
    public function approveproduct($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $products = products::find($id);
                $products->approve = 1;
                $products->save();
                Alert::success('Updated Successfully' , 'We approved This product Successfully');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Delete               #
    //////////////////////////////// 
    public function deleteproduct($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $products = products::find($id);
                $specifications = Specifications::where('product_id', '=', $id);
                $products->delete();
                $specifications->delete();
                Alert::Warning('This Product Already Deleted' , 'We Delete This Product Successfully');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Update Form          #
    //////////////////////////////// 
    public function updateproduct($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $product = products::find($id);
                $specifications = Specifications::where('product_id', '=', $id)->get()->first();
                $brands = brand::all();
                $Fueltypes = FuelType::all();
                $origins = origin::all();
                $Sellertypes = SellerType::all();
                $status = statu::all();
                $types = type::all();
                $uses = uses::all();
                $wheelPositions = WheelPosition::all();
                $categories = Category::all();
                $sub_categories = SubCategory::all();

                $image = DB::table('images')->where('product_id' , '=' , $product->id)->first();
                $images = explode(",",$image->image);
                $count = count($images);
                return view('admin.updateproduct_form' , compact('product', 'specifications', 'brands', 'Fueltypes', 'origins', 'Sellertypes', 'status',
                'types', 'uses', 'wheelPositions', 'categories', 'sub_categories','count', 'images'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Update               #
    //////////////////////////////// 
    public function do_update_product(Request $request, $id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $data = products::find($id);
                $specifications = Specifications::where('product_id', '=', $id)->get()->first();

                $image = $request->file;
                $imagename = time().'.'.$image->getClientoriginalExtension();
                $request->file->move('productimage' , $imagename);
                $data->image=$imagename;
                $data->name_en=$request->name;
                $data->name_ar=$request->name_ar;
                $data->discription_en=$request->description;
                $data->discription_ar=$request->description_ar;
                $data->category=$request->category;
                $data->slug=Str::slug($request->name);
                $data->price=$request->price;

                $specifications->discount = $request->discount;
                $specifications->category = $request->category;
                $specifications->sub_category = $request->sub_category;
                $specifications->type = $request->type;
                $specifications->status = $request->status;
                $specifications->use = $request->use;
                $specifications->brand = $request->brand;
                $specifications->origin = $request->origin;
                $specifications->seller_type = $request->Sellertype;
                $specifications->fuel_type = $request->Fueltype;
                $specifications->wheel_position = $request->wheelPosition;
                $specifications->color_en = $request->color;
                $specifications->color_ar = $request->color_ar;

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

                DB::table('images')->where('product_id',$id)->update(array(
                    'image' => $image,
                    'product_id' => $id,
                ));


                $specifications->save();
                $data->save();
                Alert::success('Updated Successfully' , 'We Update This product Successfully');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Add Form             #
    //////////////////////////////// 
    public function addProduct_form()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $brands = brand::all();
                $Fueltypes = FuelType::all();
                $origins = origin::all();
                $Sellertypes = SellerType::all();
                $statuses = statu::all();
                $types = type::all();
                $uses = uses::all();
                $wheelPositions = WheelPosition::all();
                $categories = Category::all();
                $sub_categories = SubCategory::all();
                return view('admin.addProduct_form' , compact('brands', 'Fueltypes', 'origins', 'Sellertypes', 'statuses',
                'types', 'uses', 'wheelPositions', 'categories', 'sub_categories'));
            }
            else
            {
                return redirect('login');
            }
        }
    }
    //////////////////////////////////
        // Upload               #
    //////////////////////////////// 
    public function upload_product(Request $request)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                $userid = Auth::user()->id;
                $username = Auth::user()->name;

                $data = new products;
                $image = $request->file;
                $imagename = time().'.'.$image->getClientoriginalExtension();
                $request->file->move('productimage' , $imagename);
                $data->image=$imagename;
                $data->user_id=$userid;
                $data->name_en=$request->name;
                $data->name_ar=$request->name_ar;
                $data->price=$request->price;
                $data->discription_en=$request->description;
                $data->discription_ar=$request->description_ar;
                $data->category=$request->category;
                $data->approve=1;
                $data->slug = Str::slug($request->name);
                $data->save();

                $product_id = $data->id;

                $Specifications = new Specifications;
                $Specifications->product_id = $product_id;
                $Specifications->discount = $request->discount;
                $Specifications->username = $username;
                $Specifications->phone = $request->phone;
                $Specifications->whatsapp = $request->whatsapp;
                $Specifications->address = $request->address;
                $Specifications->category = $request->category;
                $Specifications->sub_category = $request->sub_category;
                $Specifications->type = $request->type;
                $Specifications->status = $request->status;
                $Specifications->use = $request->uses;
                $Specifications->brand = $request->brand;
                $Specifications->origin = $request->origin;
                $Specifications->seller_type = $request->seller_type;
                $Specifications->fuel_type = $request->fuel_type;
                $Specifications->wheel_position = $request->wheel_position;
                $Specifications->color_en = $request->color;
                $Specifications->color_ar = $request->color_ar;

                $Specifications->save();

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



                    DB::table('images')->insert(
                    array(
                        'image' => $image,
                        'product_id' => $product_id,
                    )
                );
                Alert::success('Product Added Successfully' , 'We Add This Product But You Will Wait To Approve');
                return redirect()->back();
            }
            else
            {
                return redirect('login');
            }
        }
    }
}
