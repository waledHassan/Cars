@include('user.layouts.head')
@include('user.layouts.header')


<!-- Start Page Banner -->
<div class="page-banner-area item-bg-2">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Favorite Page</h2>
                    <ul class="pages-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>Favorite cars</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Dashboard Area -->
<div class="dashboard-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="dashboard-profile">
                    <div class="profile-box">
                        <div class="profile-icon">
                                <i class='bx bxs-user'></i>
                        </div>
                    </div>

                     <div class="profile-info">
                        <ul class="info-list">
                            <li>
                                <a href="{{url('add_ad_page')}}">Add New Ads</a>
                            </li>
                            <li>
                                <a href="{{url('my_ads')}}">My Ads</a>
                            </li>
                            <li>
                                <a href="#" class="active">Favorites</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.show') }}">Account details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="dashboard-title">
                    <h3>Favorites</h3>
                </div>

                <div class="row">

                    @foreach ($wishlists as $wishlist)
                        @foreach ($products as $product)
                            @if ($product->id == $wishlist->product_id)
                                @foreach ($Specifications as $Specification)
                                    @if ($Specification->product_id == $wishlist->product_id)

                                        <div class="col-lg-4 col-sm-6">
                                            <div class="single-car-ranking">
                                                <div class="car-ranking-image">
                                                    <a href="{{url('details',$product->slug)}}"><img src="productimage/{{ $product->image }}" style="width:305px"></a>
                                                    <div class="icon">
                                                        <a href="{{url('addToWishlist' , $product->slug)}}"><i class="flaticon-love"></i></a>
                                                    </div>
                                                </div>
                                                @if ($product->category == 1)
                                                <div class="car-ranking-content">
                                                    <div class="tag">${{$product->price}}</div>
                                                    <h3>
                                                        <a href="{{url('details',$product->slug)}}">{{$product->{'name_'.app()->getLocale()} }}</a>
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
                                                            Seller Type
                                                            <span>:
                                                            @foreach ($seller_types as $seller_type)
                                                                @if ($seller_type->id == $Specification->seller_type )
                                                                    {{$seller_type->{'name_'.app()->getLocale()} }}
                                                                @endif
                                                            @endforeach
                                                            </span>
                                                        </li>
                                                        <li>
                                                            Fuel Type
                                                            <span>: 
                                                                @foreach ($FuelTypes as $FuelType)
                                                                    @if ($FuelType->id == $Specification->fuel_type )
                                                                        {{$FuelType->{'name_'.app()->getLocale()} }}
                                                                    @endif
                                                                @endforeach
                                                            </span>
                                                        </li>
                                                        <li>
                                                            Discount
                                                            <span>: {{ $Specification->discount }} </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                    
                                                @else
                                                <div class="car-ranking-content">
                                                    <div class="tag">${{ $product->price }}</div>
                                                    <h3>
                                                        <a href="{{url('details',$product->slug)}}">{{ $product->{'name_'.app()->getLocale()}  }}</a>
                                                    </h3>
                                                    <hr>
                                                    <ul class="list">
                                                        <li>
                                                            use
                                                            <span>: 
                                                                @foreach ($uses as $use)
                                                                    @if ($use->id == $Specification->use )
                                                                        {{$use->{'name_'.app()->getLocale()} }}
                                                                    @endif
                                                                @endforeach
                                                            </span>
                                                        </li>
                                                        <li>
                                                            Status
                                                            <span>: 
                                                                @foreach ($status as $statu)
                                                                    @if ($statu->id == $Specification->status )
                                                                        {{$statu->{'name_'.app()->getLocale()} }}
                                                                    @endif
                                                                @endforeach
                                                            </span>
                                                        </li>
                                                        <li>
                                                            Seller
                                                            <span>: {{$Specification->username}}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endforeach

                    {{-- <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            <a href="#" class="prev page-numbers">
                                <i class='flaticon-left-arrow'></i>
                            </a>
                            <span class="page-numbers current" aria-current="page">1</span>
                            <a href="#" class="page-numbers">2</a>
                            <a href="#" class="page-numbers">3</a>
                            <a href="#" class="next page-numbers">
                                <i class='flaticon-right-arrow'></i>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--Start Dashboard Area -->

@include('user.layouts.footer')
@include('user.layouts.script')