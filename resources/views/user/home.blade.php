@include('user.layouts.head')
@include('user.layouts.header')

<!-- Start Main Banner Area -->
<div class="main-banner-with-category">
    <div class="main-banner-item">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="main-slides-content">
                        <h1>{{ __('Spare Website')}}</h1>
                        <p>{{ __('A site')}}</p>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="tab slides-category-list-tab">
                        <ul class="tabs">
                            <li>
                                <a href="#">{{ __('Cars')}} </a>
                            </li>
                            <li>
                                <a href="#">{{ __('Parts')}}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('Electronics')}}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('Real Estate')}}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('Trailers')}}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('yachts')}}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('Caravans')}}</a>
                            </li>
                        </ul>
                        <div class="tab_content">
                            <div class="tabs_item">
                                <form method="POST" action="{{url('indexSearchCars')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Type Of Car')}}</label>
                                                <select name="carType">
                                                    @foreach ($types_car as $type)
                                                        <option value="{{$type->id}}">{{$type->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('vehicle status')}}</label>
                                                <select name="carStatus">
                                                    @foreach ($status as $statue)
                                                    <option value="{{$statue->id}}">{{$statue->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Car Brand')}}</label>
                                                <select name="carBrand">
                                                    @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                
                                    </div>
                                    <div class="main-search-btn">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </div>
                                </form>
                            </div>
{{-- ############################################################################################################ --}}
{{-- ####################################################  Parts  ############################################## --}}
                            <div class="tabs_item">
                                <form method="POST" action="{{url('indexSearchParts')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('status')}}</label>
                                                <select name="partsStatus">
                                                    @foreach ($status as $statue)
                                                    <option value="{{$statue->id}}">{{$statue->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Type Of Use')}}</label>
                                                <select name="partsUses">
                                                    @foreach ($uses as $use)
                                                    <option value="{{$use->id}}">{{$use->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Name')}}</label>
                                                <input type="text" name="nameParts" placeholder="Search" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-search-btn">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </div>
                                </form>
                            </div>
{{-- ################################################################################################################ --}}
{{-- ########################################    Electronics   ################################################## --}}
                            <div class="tabs_item">
                                <form method="POST" action="{{url('indexSearchElectronics')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Categories')}}</label>
                                                <select name="subCategoryElect">
                                                    @foreach ($sub_categoriesElect as $sub_categoryElect)
                                                    <option value="{{$sub_categoryElect->id}}">{{$sub_categoryElect->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('status')}}</label>
                                                <select name="statusElect">
                                                    @foreach ($status as $statue)
                                                    <option value="{{$statue->id}}">{{$statue->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Name')}}</label>
                                                <input type="text" name="nameElect" placeholder="Search" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-search-btn">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </div>
                                </form>
                            </div>
{{-- ################################################################################################################## --}}
{{-- ################################################## Real Estate ################################################## --}}
                            <div class="tabs_item">
                                <form method="POST" action="{{url('indexSearchEstate')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('status')}}</label>
                                                <select name="estateStatus">
                                                    @foreach ($status as $statue)
                                                    <option value="{{$statue->id}}">{{$statue->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Name')}}</label>
                                                <input type="text" name="estate_name" placeholder="Search" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-search-btn">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </div>
                                </form>
                            </div>
{{-- ############################################################################################################### --}}
{{-- ##################################################  Trailers ################################################## --}}
                            <div class="tabs_item">
                                <form  method="POST" action="{{url('indexSearchTrailer')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Categories')}}</label>
                                                <select name="subCatTrailer">
                                                    @foreach ($sub_categorieTrailers as $sub_categorieTrailer)
                                                    <option value="{{$sub_categorieTrailer->id}}">{{$sub_categorieTrailer->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('status')}}</label>
                                                <select name="trailerStatus">
                                                    @foreach ($status as $statue)
                                                    <option value="{{$statue->id}}">{{$statue->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Type Of Use')}}</label>
                                                <select name="trailerUses">
                                                    @foreach ($uses as $use)
                                                    <option value="{{$use->id}}">{{$use->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Name')}}</label>
                                                <input type="text" name="trailer_name" placeholder="Search" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-search-btn">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </div>
                                </form>
                            </div>
{{-- ############################################################################################################### --}}
{{-- ###########################################   Yachts     ###################################################### --}}
                            <div class="tabs_item">
                                <form  method="POST" action="{{url('indexSearchYachts')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Categories')}}</label>
                                                <select name="subCategoryYachts">
                                                    @foreach ($sub_categorieYachts as $sub_categorieYacht)
                                                    <option value="{{$sub_categorieYacht->id}}">{{$sub_categorieYacht->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Seller Type')}}</label>
                                                <select name="sellerTypeYacht">
                                                    @foreach ($seller_types as $seller_type)
                                                    <option value="{{$seller_type->id}}">{{$seller_type->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                           
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('status')}}</label>
                                                <select name="YachtsStatus">
                                                    @foreach ($status as $statue)
                                                    <option value="{{$statue->id}}">{{$statue->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Name')}}</label>
                                                <input type="text" name="yachts_name" placeholder="Search" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-search-btn">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </div>
                                </form>
                            </div>
{{-- ############################################################################################################### --}}
{{-- #######################################   Caravans     ######################################################## --}}
                            <div class="tabs_item">
                                <form method="POST" action="{{url('indexSearchCaravans')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Categories')}}</label>
                                                <select name="subCategorycaravans">
                                                    @foreach ($sub_categorieCaravans as $sub_categorieCaravan)
                                                    <option value="{{$sub_categorieCaravan->id}}">{{$sub_categorieCaravan->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-6">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Seller Type')}}</label>
                                                <select name="sellerTypecaravans">
                                                    @foreach ($seller_types as $seller_type)
                                                    <option value="{{$seller_type->id}}">{{$seller_type->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                           
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('status')}}</label>
                                                <select name="caravansStatus">
                                                    @foreach ($status as $statue)
                                                    <option value="{{$statue->id}}">{{$statue->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md col-sm-6 ">
                                            <div class="form-group">
                                                <label for="" style="font-size: 16px;color:#fff;">{{ __('Name')}}</label>
                                                <input type="text" name="caravana_name" placeholder="Search" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-search-btn">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </div>
                                </form>
                            </div>

                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Banner Area -->

<!-- Start Car Ranking Area -->
<section class="car-ranking-area bg-ffffff pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2> Featured Car Ads</h2>
            <p>Find the best deals for you</p>
            <div class="section-btn">
                <a href="{{url('cars_list')}}" class="default-btn">
                    {{ __('Show more')}}
                    <span></span>
                </a>
            </div>
        </div>

        <div class="row">

            @foreach ($cars  as $product)

            @foreach ($Specifications as $Specification)
                @if ($Specification->product_id == $product->id)
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-car-ranking">
                            <div class="car-ranking-image">
                                <a href="{{url('details',$product->slug)}}"><img src="productimage/{{ $product->image }}" style="width:305px"></a>
                                <div class="icon">
                                    <a href="{{url('addToWishlist' , $product->slug)}}"><i class="flaticon-love"></i></a>
                                </div>
                            </div>
                            <div class="car-ranking-content">
                                <div class="tag">${{ $product->price }}</div>
                                <h3>
                                    <a href="{{url('details',$product->slug)}}">{{ $product->{'name_'.app()->getLocale()}  }}</a>
                                </h3>
                                <p><b>Wheel Position</b>: 
                                    @foreach ($wheelPositions as $wheelPosition)
                                        @if ($wheelPosition->id == $Specification->wheel_position )
                                            {{$wheelPosition->{'name_'.app()->getLocale()} }}
                                        @endif
                                    @endforeach
                                </p>
                                <hr>
                                <ul class="list">
                                    <li>
                                        {{ __('Seller Type')}}
                                        <span>:
                                        @foreach ($seller_types as $seller_type)
                                            @if ($seller_type->id == $Specification->seller_type )
                                                {{$seller_type->{'name_'.app()->getLocale()} }}
                                            @endif
                                        @endforeach
                                        </span>
                                    </li>
                                    <li>
                                        {{ __('Fuel Type')}}
                                        <span>: 
                                            @foreach ($FuelTypes as $FuelType)
                                                @if ($FuelType->id == $Specification->fuel_type )
                                                    {{$FuelType->{'name_'.app()->getLocale()} }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </li>
                                    <li>
                                        {{ __('Discount')}}
                                        <span>: {{ $Specification->discount }} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- End Car Ranking Area -->

<!-- Start Parts Ranking Area -->
<section class="car-ranking-area bg-2a1e02 pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2> Spare parts ads </h2>
            <p>Find the best deals for you</p>
            <div class="section-btn">
                <a href="{{url('categories_list' , $category='parts')}}" class="default-btn">
                    {{ __('Show more')}}
                    <span></span>
                </a>
            </div>
        </div>

        <div class="row">

            @foreach ($parts as $part)
            @foreach ($Specifications as $Specification)
            @if ($Specification->product_id == $part->id)
                
            <div class="col-lg-3 col-sm-6">
                <div class="single-car-ranking">
                    <div class="car-ranking-image">
                        <a href="{{url('details',$part->slug)}}"><img src="productimage/{{ $part->image }}" alt="image"></a>
                        <div class="icon">
                            <a href="{{url('addToWishlist' , $part->slug)}}"><i class="flaticon-love"></i></a>
                        </div>
                    </div>
                    <div class="car-ranking-content">
                        <div class="tag">${{ $part->price }}</div>
                        <h3>
                            <a href="{{url('details',$part->slug)}}">{{ $part->{'name_'.app()->getLocale()}  }}</a>
                        </h3>
                        <hr>
                        <ul class="list">
                            <li>
                                {{ __('Type Of Use')}}
                                <span>: 
                                    @foreach ($uses as $use)
                                        @if ($use->id == $Specification->use )
                                            {{$use->{'name_'.app()->getLocale()} }}
                                        @endif
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                {{ __('status')}}
                                <span>: 
                                    @foreach ($status as $statu)
                                        @if ($statu->id == $Specification->status )
                                            {{$statu->{'name_'.app()->getLocale()} }}
                                        @endif
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                {{ __("Seller Type")}}
                                <span>: {{$Specification->username}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- End Parts Ranking Area -->

<!-- Start ELC Ranking Area -->
<section class="car-ranking-area bg-ffffff pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2> Electronics ads</h2>
            <p>Find the best deals for you</p>
            <div class="section-btn">
                <a href="{{url('categories_list' , $category='Electronics')}}" class="default-btn">
                    {{ __('Show more')}}
                    <span></span>
                </a>
            </div>
        </div>

        <div class="row">

            @foreach ($electronics as $electronic)
            @foreach ($Specifications as $Specification)
            @if ($Specification->product_id == $electronic->id)

            <div class="col-lg-3 col-sm-6">
                <div class="single-car-ranking">
                    <div class="car-ranking-image">
                        <a href="{{url('details',$electronic->slug)}}"><img src="productimage/{{ $electronic->image }}" alt="image"></a>
                        <div class="icon">
                            <a href="{{url('addToWishlist' , $electronic->slug)}}"><i class="flaticon-love"></i></a>
                        </div>
                    </div>
                    <div class="car-ranking-content">
                        <div class="tag">${{ $product->price }}</div>
                        <h3>
                            <a href="{{url('details',$electronic->slug)}}">{{ $electronic->{'name_'.app()->getLocale()} }}</a>
                        </h3>
                        <hr>
                        <ul class="list">
                            <li>
                                {{ __('Type Of Use')}}
                                <span>: 
                                    @foreach ($uses as $use)
                                        @if ($use->id == $Specification->use )
                                            {{$use->{'name_'.app()->getLocale()} }}
                                        @endif
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                {{ __('status')}}
                                <span>: 
                                    @foreach ($status as $statu)
                                        @if ($statu->id == $Specification->status )
                                            {{$statu->{'name_'.app()->getLocale()} }}
                                        @endif
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                {{ __("Seller Type")}}
                                <span>: {{$Specification->username}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            
            @endif
            @endforeach
            @endforeach

        </div>
    </div>
</section>
<!-- End ELC Ranking Area -->

<!-- Start Team Area -->
<section class="team-area pt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-team">
                    <a href="{{url('/')}}">
                        <img src="assets/images/team/team-1.jpg" alt="image">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="single-team">
                    <a href="{{url('/')}}">
                        <img src="assets/images/team/team-2.jpg" alt="image">
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Team Area -->

<!-- Start real estate Ranking Area -->
<section class="car-ranking-area bg-2a1e02 pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2> Real estate ads </h2>
            <p>Find the best deals for you</p>
            <div class="section-btn">
                <a href="{{url('categories_list' , $category='Real_Estate')}}" class="default-btn">
                    {{ __('Show more')}}
                    <span></span>
                </a>
            </div>
        </div>

        <div class="row">

            
            @foreach ($estates as $estate)
            @foreach ($Specifications as $Specification)
            @if ($Specification->product_id == $estate->id)

            <div class="col-lg-3 col-sm-6">
                <div class="single-car-ranking">
                    <div class="car-ranking-image">
                        <a href="{{url('details',$estate->slug)}}"><img src="productimage/{{ $estate->image }}" alt="image"></a>
                        <div class="icon">
                            <a href="{{url('addToWishlist' , $estate->slug)}}"><i class="flaticon-love"></i></a>
                        </div>
                    </div>
                    <div class="car-ranking-content">
                        <div class="tag">${{ $estate->price }}</div>
                        <h3>
                            <a href="{{url('details',$estate->slug)}}">{{ $estate->{'name_'.app()->getLocale()}  }}</a>
                        </h3>
                        <hr>
                        <ul class="list">
                            <li>
                                {{ __('Type Of Use')}}
                                <span>: 
                                    @foreach ($uses as $use)
                                        @if ($use->id == $Specification->use )
                                            {{$use->{'name_'.app()->getLocale()} }}
                                        @endif
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                {{ __('status')}}
                                <span>: 
                                    @foreach ($status as $statu)
                                        @if ($statu->id == $Specification->status )
                                            {{$statu->{'name_'.app()->getLocale()} }}
                                        @endif
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                {{ __("Seller Type")}}
                                <span>: {{ $Specification->username }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @endif
            @endforeach
            @endforeach

        </div>
    </div>
</section>
<!-- End real estate Ranking Area -->

<!-- Start Blog Area -->
<section class="blog-area bg-ffffff pt-100 pb-70">
 
</section>
<!-- End Blog Area -->

<!-- Start Newsletter Area -->
<div class="newsletter-area">
  
</div>
<!-- End Newsletter Area -->

@include('user.layouts.footer')
@include('user.layouts.script')