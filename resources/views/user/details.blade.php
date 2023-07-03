@include('user.layouts.head')
@include('user.layouts.header')


<!-- Start Page Banner -->
<div class="page-banner-area item-bg-2">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Vehicle Details</h2>
                    <ul class="pages-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="cars-lists.php">Vehicle</a></li>
                        <li><span>Vehicle Details</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Banner -->


<!-- Start Car Details Area -->
<section class="car-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="car-details-gallery">

                    <div class="car-details-main">
                        <div class="item">
                            <img src="productimage/{{$product->image}}" alt="image">
                        </div>

                        @php
                        $image = DB::table('images')->where('product_id' , '=' , $product->id)->first();
                        $images = explode(",",$image->image);
                        $count = count($images);
                        @endphp

                        @if ($images[0] != '')                            
                            @for ($i = 0; $i < $count ; $i++)
                            <div class="item">
                                <img src="productimage/{{$images[$i]}}">
                            </div>
                            @endfor
                        @endif
                    </div>
                    
                    <div class="car-details-preview">
                        @if ($images[0] != '')                            
                        <div class="item">
                            <img src="productimage/{{$product->image}}" alt="image">
                        </div>
                        @endif

                        @if ($images[0] != '')                            
                            @for ($i = 0; $i < $count ; $i++)
                            <div class="item">
                                <img src="productimage/{{$images[$i]}}">
                            </div>
                            @endfor
                        @endif

                        @if ($images[0] != '')                            
                        <div class="item">
                            <img src="productimage/{{$product->image}}" alt="image">
                        </div>
                        @endif

                        @if ($images[0] != '')                            
                            @for ($i = 0; $i < $count ; $i++)
                            <div class="item">
                                <img src="productimage/{{$images[$i]}}">
                            </div>
                            @endfor
                        @endif

                    </div>
                </div>

                <div class="car-details-desc">
                    <div class="desc-content">
                        <p id="timer"></p>
                        <div class="tag">${{ $product->price }}</div>
                        <div class="tag-favorites"><a href="favorites.php"><i class="flaticon-love"></i></a></div>
                        <h3>{{ $product->name }}</h3>
                        <h6 class="mt-5">Description</h6>
                        <p>{{ $product->{'discription_'.app()->getLocale()} }}</p>
                    </div>

                    <div class="desc-information">
                        <h3>Cars Specification</h3>
                        <ul class="info-list">
                            @if ($Specification->category != null)                                
                            <li>Category </li>
                            <li><span>: 
                                @foreach ($AllCategories as $category)
                                    @if ($category->id == $Specification->category )
                                        {{$category->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->sub_category != null)                                
                            <li>Sub Category </li>
                            <li><span>: 
                                @foreach ($SubCategories as $SubCategory)
                                    @if ($SubCategory->id == $Specification->sub_category )
                                        {{$SubCategory->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->type  != null)                                
                            <li>Type </li>
                            <li><span>: 
                                @foreach ($types as $type)
                                    @if ($type->id == $Specification->type  )
                                        {{$type->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->status != null)                                
                            <li>Status </li>
                            <li><span>: 
                                @foreach ($status as $statu)
                                    @if ($statu->id == $Specification->status )
                                        {{$statu->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->use  != null)                                
                            <li>Uses </li>
                            <li><span>: 
                                @foreach ($uses as $use )
                                    @if ($use->id == $Specification->use )
                                        {{$use->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->brand != null)                                
                            <li>Brands </li>
                            <li><span>: 
                                @foreach ($brands as $brand )
                                    @if ($brand->id == $Specification->brand  )
                                        {{$brand->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->origin != null)                                
                            <li>Origin </li>
                            <li><span>: 
                                @foreach ($origins as $origins )
                                    @if ($origins->id == $Specification->origin  )
                                        {{$origins->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->seller_type != null)                                
                            <li>Seller Type</li>
                            <li><span>: 
                                @foreach ($seller_types as $seller_type )
                                    @if ($seller_type->id == $Specification->seller_type  )
                                        {{$seller_type->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->fuel_type  != null)                                
                            <li>Fuel Type </li>
                            <li><span>: 
                                @foreach ($FuelTypes as $FuelType )
                                    @if ($FuelType->id == $Specification->fuel_type   )
                                        {{$FuelType->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif

                            @if ($Specification->wheel_position != null)                                
                            <li>wheel Position </li>
                            <li><span>: 
                                @foreach ($wheelPositions as $wheelPosition )
                                    @if ($wheelPosition->id == $Specification->wheel_position )
                                        {{$wheelPosition->{'name_'.app()->getLocale()} }}
                                    @endif
                                @endforeach
                            </span></li>
                            @endif


                        </ul>
                    </div>


                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27814.422039668534!2d47.99937637067242!3d29.37606405632665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9c83ce455983%3A0xc3ebaef5af09b90e!2z2YXYr9mK2YbYqSDYp9mE2YPZiNmK2KrYjCDYp9mE2YPZiNmK2KrigI4!5e0!3m2!1sar!2seg!4v1665664561974!5m2!1sar!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="user-profile-information">
                    <div class="profile-title">
                        <img src="assets/images/user-profile/profile-1.jpg" alt="image">
                        <h3>{{$Specification->username}}</h3>
                        <span></span>
                         <p></p>
                    </div>
                    <hr>
                    <ul class="profile-info">
                        <li>
                            <span><i class='bx bx-current-location'></i> Address</span>
                            <a href="#"> {{$Specification->address}} </a>
                        </li>
                        <li>
                            <span><i class='bx bx-envelope'></i> E-mail</span>
                            <a href="mailto:seller@gmail.com">{{$user->email}}</a>
                        </li>

                        <li>
                            <span><i class='bx bx-phone-call'></i> Phone</span>
                            <a href="tel:+9655143214567" class="phone-dir">{{$Specification->phone}}</a>
                        </li>

                        <li>
                            <span><i class='bx bxl-whatsapp'></i> WhatsApp</span>
                            <a href="#" class="phone-dir">{{$Specification->whatsapp}}</a>
                        </li>
                    </ul>
                    <hr>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Car Details Area -->

@include('user.layouts.footer')
@include('user.layouts.script')