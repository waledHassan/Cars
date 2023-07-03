<base href="/public">
@include('admin.css')


@include('admin.sidebar')

    <div class="overlay"></div>

    <main class="main-wrapper">

@include('admin.navbar')


        

       <form action="{{url('do_update_product' , $product->id)}}" method='POST' enctype="multipart/form-data">
          @csrf
        <div class="col-lg-10 mt-8" style='margin-left:100px;'>
            <div class="card-style mb-30">
            <h6 class="mb-25">Update Product</h6>

            <div class="input-style-1">
                <label>Product Name</label>
                <input value='{{$product->name_en}}' type="text" name='name' placeholder="Product Name"/>
            </div>

            <div class="input-style-1">
                <label style='text-align:right;'>الاسم</label>
                <input type="text" value="{{$product->name_ar}}" name='name_ar' style='text-align:right;' placeholder="الاسم" required='require'/>
            </div>

            <div class="input-style-1">
                <label>Product Price</label>
                <input value='{{$product->price}}' type="number" name='price' placeholder="Product Price" />
            </div>

            <div class="input-style-1">
                <label>Product Color</label>
                <input type="text" value='{{$specifications->color_en}}' name='color' placeholder="Product Color" />
            </div>

            <div class="input-style-1">
                <label style='text-align:right;'>اللون</label>
                <input type="text" name='color_ar' value='{{$specifications->color_ar}}' style='text-align:right;' placeholder="اللون"/>
            </div>

            <div class="input-style-1">
                <label>Product Description</label>
                <textarea cols="3" rows="5" name='description' placeholder="Product Description" required='require'>{{$product->discription_en}}</textarea>
            </div>

            <div class="input-style-1">
                <label style='text-align:right;'>وصف المنتج</label>
                <textarea cols="3" rows="5" name='description_ar' style='text-align:right;' placeholder="الوصف" required='require'>{{$product->discription_ar}}</textarea>
            </div>

            <div class="input-style-1">
                <label>Phone</label>
                <input type="text" name='phone' value='{{$specifications->phone}}' placeholder="phone" required='require'  />
            </div>

            <div class="input-style-1">
                <label>whatsapp</label>
                <input type="text" name='whatsapp' value='{{$specifications->whatsapp}}' placeholder="whatsapp" required='require'  />
            </div>

            <div class="input-style-1">
                <label>address</label>
                <input type="text" name='address' placeholder="address" value='{{$specifications->address}}' required='require'  />
            </div>

            <div class="input-style-1">
                <label>Product main Image</label>
                <input type="file" name='file'  required='require' />
                <img src="productimage/{{$product->image}}" alt="" style='width:200px;margin-top:20px;'>
            </div>

            <hr>
            <h4>Specifications</h4>

            @if ($images != null)                
            <div class="input-style-1 mt-4">
                <label>Product images (you can add more than one image)</label>
                <input  type="file" name="files[]" class="form-control-file" multiple>

                    @for ($i = 0; $i < $count ; $i++)
                        <img src="productimage/{{$images[$i]}}" style='width:200px;margin-top:20px;'>
                    @endfor
                   
                    
            </div>
            @endif

            @if ($specifications->discount != null)
                <div class="input-style-1 mt-4">
                    <label>Product Discount</label>
                    <input value='{{$specifications->discount}}' type="number" name='discount' placeholder="Product Discount" />
                </div>
            @endif

            @if ($product->category != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Category</label>
            <select class="input-style-1" name="category">
                @foreach ($categories as $category)
                    @if ($product->category==$category->id)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endif  
                @endforeach

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif

            @if ($specifications->sub_category != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Sub Category</label>
            <select class="input-style-1" name="sub_category">
                @foreach ($sub_categories as $sub_category)
                    @if ($specifications->sub_category==$sub_category->id)
                        <option value="{{$sub_category->id}}">{{ $sub_category->name }}</option>
                    @endif  
                @endforeach

                @foreach ($sub_categories as $sub_category)
                    <option value="{{$sub_category->id}}">{{ $sub_category->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif


            @if ($specifications->type != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Type</label>
            <select class="input-style-1" name="type">
                @foreach ($types as $type)
                    @if ($specifications->type==$type->id)
                        <option value="{{$type->id}}">{{ $type->name }}</option>
                    @endif  
                @endforeach

                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{ $type->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif

            @if ($specifications->status != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Status</label>
            <select class="input-style-1" name="status">
                @foreach ($status as $statu)
                    @if ($specifications->status==$statu->id)
                        <option value="{{$statu->id}}">{{ $statu->name }}</option>
                    @endif  
                @endforeach

                @foreach ($status as $statu)
                    <option value="{{$statu->id}}">{{ $statu->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif


            @if ($specifications->use != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Uses</label>
            <select class="input-style-1" name="use">
                @foreach ($uses as $use)
                    @if ($specifications->use==$use->id)
                        <option value="{{$use->id}}">{{ $use->name }}</option>
                    @endif  
                @endforeach

                @foreach ($uses as $use)
                    <option value="{{$use->id}}">{{ $use->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif


            @if ($specifications->brand != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Brand</label>
            <select class="input-style-1" name="brand">
                @foreach ($brands as $brand)
                    @if ($specifications->brand==$brand->id)
                        <option value="{{$brand->id}}">{{ $brand->name }}</option>
                    @endif  
                @endforeach

                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{ $brand->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif


            @if ($specifications->origin != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Origin</label>
            <select class="input-style-1" name="origin">
                @foreach ($origins as $origin)
                    @if ($specifications->origin==$origin->id)
                        <option value="{{$origin->id}}">{{ $origin->name }}</option>
                    @endif  
                @endforeach

                @foreach ($origins as $origin)
                    <option value="{{$origin->id}}">{{ $origin->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif

            @if ($specifications->seller_type != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Seller Type</label>
            <select class="input-style-1" name="Sellertype">
                @foreach ($Sellertypes as $Sellertype)
                    @if ($specifications->seller_type==$Sellertype->id)
                        <option value="{{$Sellertype->id}}">{{ $Sellertype->name }}</option>
                    @endif  
                @endforeach

                @foreach ($Sellertypes as $Sellertype)
                    <option value="{{$Sellertype->id}}">{{ $Sellertype->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif


            @if ($specifications->fuel_type != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Fuel Type</label>
            <select class="input-style-1" name="Fueltype">
                @foreach ($Fueltypes as $Fueltype)
                    @if ($specifications->fuel_type==$Fueltype->id)
                        <option value="{{$Fueltype->id}}">{{ $Fueltype->name }}</option>
                    @endif  
                @endforeach

                @foreach ($Fueltypes as $Fueltype)
                    <option value="{{$Fueltype->id}}">{{ $Fueltype->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif

            @if ($specifications->wheel_position != null)
            <div class="select-style-2">
                <div class="select-position">
                    <label>Wheel Poisition</label>
            <select class="input-style-1" name="wheelPosition">
                @foreach ($wheelPositions as $wheelPosition)
                    @if ($specifications->wheel_position==$wheelPosition->id)
                        <option value="{{$wheelPosition->id}}">{{ $wheelPosition->name }}</option>
                    @endif  
                @endforeach

                @foreach ($wheelPositions as $wheelPosition)
                    <option value="{{$wheelPosition->id}}">{{ $wheelPosition->name }}</option>
                @endforeach
            </select>
                </div>
            </div> 
            @endif







            <div class="input-style-1">
                 <button class='btn btn-primary'>Update</button>
            </div>
         </div>
        </div>
      </form>

@include('admin.footer')