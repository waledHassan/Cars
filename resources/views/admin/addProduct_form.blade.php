<base href="/public">
@include('admin.css')


@include('admin.sidebar')

    <div class="overlay"></div>

    <main class="main-wrapper">

@include('admin.navbar')


        

       <form action="{{url('upload_product')}}" method='POST' enctype="multipart/form-data">
          @csrf
        <div class="col-lg-10 mt-8" style='margin-left:100px;'>
            <div class="card-style mb-30">
            <h6 class="mb-25">Add Product</h6>

            <div class="input-style-1">
                <label>Product Name</label>
                <input type="text" name='name' placeholder="Product Name" required='require' />
            </div>

            <div class="input-style-1">
                <label style='text-align:right;'>الاسم</label>
                <input type="text" name='name_ar' style='text-align:right;' placeholder="الاسم" required='require'/>
            </div>

            <div class="input-style-1">
                <label>Product Price</label>
                <input type="number" name='price' placeholder="Product Price" required='require'  />
            </div>

            <div class="input-style-1">
                <label>Product Color</label>
                <input type="text" name='color' placeholder="Product Color" />
            </div>

            <div class="input-style-1">
                <label style='text-align:right;'>اللون</label>
                <input type="text" name='color_ar' style='text-align:right;' placeholder="اللون"/>
            </div>

            <div class="input-style-1">
                <label>Product Description</label>
                <textarea name='description' placeholder="Product Description" required='require'></textarea>
            </div>

            <div class="input-style-1">
                <label style='text-align:right;'>وصف المنتج</label>
                <textarea name='description_ar' style='text-align:right;' placeholder="الوصف" required='require'></textarea>
            </div>

            <div class="input-style-1">
                <label>Phone</label>
                <input type="text" name='phone' placeholder="phone" required='require'  />
            </div>

            <div class="input-style-1">
                <label>whatsapp</label>
                <input type="text" name='whatsapp' placeholder="whatsapp" required='require'  />
            </div>

            <div class="input-style-1">
                <label>address</label>
                <input type="text" name='address' placeholder="address" required='require'  />
            </div>


            <div class="input-style-1">
                <label>Product main Image</label>
                <input type="file" name='file'  required='require' />
            </div>

            <hr>
            <h4>Specifications</h4>

            <div class="input-style-1 mt-4">
            <label>Product images (you can add more than one image)</label>
            <input  type="file" name="files[]" class="form-control-file" multiple>
            </div>

                <div class="input-style-1 mt-4">
                    <label>Product Discount</label>
                    <input  type="number" name='discount' placeholder="Product Discount" />
                </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Category</label>
                <select name="category" required='require'>
                    <option value="">------</option>
                    @foreach ($categories as $category)
                       <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Sub Category</label>
                <select name="sub_category">
                    <option value="">------</option>
                    @foreach ($sub_categories as $sub_category)
                       <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Type</label>
                <select name="type">
                    <option value="">------</option>
                    @foreach ($types as $type)
                       <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="" required='require'>Status</label>
                <select name="status">
                    <option value="" >------</option>
                    @foreach ($statuses as $status)
                       <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="" required='require'>Uses</label>
                <select name="uses" >
                    <option value="">------</option>
                    @foreach ($uses as $use)
                       <option value="{{$use->id}}">{{$use->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Brand</label>
                <select name="brand">
                    <option value="">------</option>
                    @foreach ($brands as $brand)
                       <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Origin</label>
                <select name="origin">
                    <option value="">------</option>
                    @foreach ($origins as $origin)
                       <option value="{{$origin->id}}">{{$origin->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Seller Type</label>
                <select name="seller_type">
                    <option value="">------</option>
                    @foreach ($Sellertypes as $Sellertype)
                       <option value="{{$Sellertype->id}}">{{$Sellertype->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Wheel Position</label>
                <select name="wheel_position">
                    <option value="">------</option>
                    @foreach ($wheelPositions as $wheelPosition)
                       <option value="{{$wheelPosition->id}}">{{$wheelPosition->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="select-style-2">
                <div class="select-position">
                    <label for="">Fuel Type</label>
                <select name="fuel_type">
                    <option value="">------</option>
                    @foreach ($Fueltypes as $Fueltype)
                       <option value="{{$Fueltype->id}}">{{$Fueltype->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>






            <div class="input-style-1">
                 <button class='btn btn-primary'>Add</button>
            </div>
         </div>
        </div>
      </form>

@include('admin.footer')