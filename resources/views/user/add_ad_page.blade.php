@include('user.layouts.head')
@include('user.layouts.header')

<div class="page-banner-area item-bg-2">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Add Ads</h2>

                    <ul class="pages-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>Add Ads</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Dashboard Area -->
<div class="dashboard-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="dashboard-profile">
                    <div class="profile-box">
                        <div class="profile-icon">
                            <img src="assets/images/add.jpg" alt="add" />
                        </div>
                    </div>
                    <div class="profile-info">
                        <ul class="info-list">
                            <li>
                                <a href="#" class="active">Add New Ads</a>
                            </li>
                            <li>
                                <a href="{{url('my_ads')}}">My Ads</a>
                            </li>
                            <li>
                                <a href="{{url('favorite_page')}}">Favorites</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.show') }}">Account details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="dashboard-form">
                    <form enctype="multipart/form-data" method="POST" action="{{url('upload_AD')}}">
                        @csrf
                        <div class="dashboard-title">
                            <h3>Add Ads</h3>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>phone number</label>
                                        <input type="text" class="form-control" name="phone" >
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>WhatsApp number</label>
                                        <input type="text" class="form-control" name="whatsapp" >
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" >
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Name Of Car</label>
                                        <input type="text" placeholder="Mecedes benz E 400" class="form-control" name="product_name" >
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" placeholder="مرسيديس" class="form-control" name="product_name_ar" >
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Ad description</label>
                                        <textarea name="description" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>الوصف</label>
                                        <textarea name="description_ar" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>price</label>
                                        <input type="number" class="form-control" name="price" >
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Discount if !</label>
                                        <input type="number" class="form-control" name="discount">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Product main image</label>
                                        <input type="file" name="file" class="form-control-file" required='require'>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="hr">
                        <hr class="hr">

                        <div class="dashboard-title" id="ad-specifications">
                            <h3>ad specification </h3>
                            <div class="row">

                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Product images (you can add more than one image)</label>
                                        <input  type="file" name="files[]" class="form-control-file" multiple required='require'>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>cars Type</label>
                                        <select name="type">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Cars Status</label>
                                        <select name="status">
                                                @foreach ($status as $statu)
                                                    <option value="{{ $statu->id }}">{{ $statu->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Uses</label>
                                        <select name="uses">
                                                @foreach ($uses as $use)
                                                    <option value="{{ $use->id }}">{{ $use->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select name="brand">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Origin</label>
                                        <select name="origin">
                                                @foreach ($origins as $origin)
                                                <option value="{{ $origin->id }}">{{ $origin->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Seller type</label>
                                        <select name="seller_type">
                                                @foreach ($seller_types as $Sellertype)
                                                    <option value="{{ $Sellertype->id }}">{{ $Sellertype->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Steering wheel position</label>
                                        <select name="wheel_position" >
                                                @foreach ($wheelPositions as $wheelPosition)
                                                    <option value="{{ $wheelPosition->id }}">{{ $wheelPosition->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>fuel type</label>
                                        <select name="fuel_type" >
                                            @foreach ($FuelTypes as $Fueltype)
                                                <option value="{{ $Fueltype->id }}"> {{ $Fueltype->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input type="text" class="form-control" name="color" placeholder="Color" >
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>اللون</label>
                                        <input type="text" class="form-control" name="color_ar" placeholder="اللون" >
                                    </div>
                                </div>


                                <button class="btn btn-primary">Add</button>
                                    {{-- <div class="col-lg-6 col-md-12">
                                        <div class="payment-box">
                                            <h3>payment method</h3>

                                            <div class="payment-method">
                                                <p>
                                                    <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                                    <label for="direct-bank-transfer">Direct Bank Transfer</label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="cash-on-delivery" name="radio-group">
                                                    <label for="cash-on-delivery">Payment via representative</label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="check-payments" name="radio-group">
                                                    <label for="check-payments">Check payment</label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="paypal" name="radio-group">
                                                    <label for="paypal">PayPal</label>
                                                </p>
                                            </div>
                                            <a href="#" class="default-btn">
                                                payment
                                                <span></span>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <hr class="hr">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Dashboard Area -->

@include('user.layouts.footer')
@include('user.layouts.script')