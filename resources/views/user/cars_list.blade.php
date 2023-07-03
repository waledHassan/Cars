@include('user.layouts.head')
@include('user.layouts.header')


<!-- Start Page Banner -->
<div class="page-banner-area item-bg-2">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Cars</h2>
                    <ul class="pages-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>Cars</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Car Shop Area -->
<div class="car-shop-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <aside class="widget-area">
                    <div class="widget widget_search">
                        <form class="search-form">
                            <label>
                                <span class="screen-reader-text">Search:</span>
                                <input type="search" id="search" class="search-field" placeholder="Search...">
                            </label>
                            <button type="submit">
                                <i class='bx bx-search-alt'></i>
                            </button>
                        </form>
                    </div>

                    <div class="widget widget_filter_results">
                        <h3 class="widget-title">Filter Results</h3>

                        <form>
                        
                            <div class="form-group">
                                <label>Origin of car</label>
                                <select  name='origincar[Attorneycar][empresacar]' id='origincar'>
                                    <option value="">-----</option>
                                    @foreach ($origins as $origin)
                                        <option value="{{$origin->id}}">{{ $origin->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Vehicle Brand</label>
                                <select name='brandcar[Attorneycar][empresacar]' id='brandcar'>
                                    <option value="">-----</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{ $brand->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Cars Type</label>
                                <select name='typecar[Attorneycar][empresacar]' id='typecar'>
                                    <option value="">-----</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Cars Uses</label>
                                <select name='usescar[Attorneycar][empresacar]' id='usescar'>
                                    <option value="">-----</option>
                                    @foreach ($uses as $use)
                                        <option value="{{ $use->id }}">{{ $use->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Cars statuses</label>
                                <select name='statusescar[Attorneycar][empresacar]' id='statusescar'>
                                    <option value="">-----</option>
                                    @foreach ($status as $status)
                                        <option value="{{ $status->id }}">{{ $status->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="price-range-content">
                                <h4>Price</h4>

                                <div class="price-range-bar" id="range-slider"></div>
                                <div class="price-range-filter">
                                    <div class="price-range-filter-item">
                                        <input type="text" id="price-amount" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </aside>
            </div>



            <div class="col-lg-9 col-md-12">
                <div class="row" id="content">

                    @foreach ($Specifications as $Specification)
                    @foreach ($products as $product)
                    @if ($Specification->product_id == $product->id)

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-car-ranking">
                                <div class="car-ranking-image">
                                    <a href="{{url('details',$product->slug)}}"><img src="productimage/{{$product->image}}" style="width:305px"></a>
                                    <div class="icon">
                                        <a href="{{url('addToWishlist' , $product->slug)}}"><i class="flaticon-love"></i></a>
                                    </div>
                                </div>
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
                            </div>
                        </div>

                        @endif
                    @endforeach
                @endforeach


                 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Car Shop Area -->

@include('user.layouts.footer')
@include('user.layouts.script')
<script>

        $("#search").on("keyup",function(){
        
        var search = $('#search').val();
        var type =  $('#typecar').val();
        var year =  $('#yearcar').val();
        var brand =  $('#brandcar').val();
        var origin =  $('#origincar').val();
        var uses =  $('#usescar').val();
        var status =  $('#statusescar').val();

        $.ajax({
                type : 'get',
                url : '{{URL::to('search_cars')}}',
                data:{'name':search, 'type_cars':type, 'year_cars':year, 'brand_cars':brand, 'origin_cars':origin, 'uses_cars':uses, 'statuses_cars':status},
                success:function(data){
                $('#content').html(data);
                }
                });

        });


        $( "#range-slider" ).slider({

        change: function( event, ui ) {
        
        var value1 = ui.values[0];
        var value2 = ui.values[1];
                
        var search = $('#search').val();
        var type =  $('#typecar').val();
        var brand =  $('#brandcar').val();
        var origin =  $('#origincar').val();
        var uses =  $('#usescar').val();
        var status =  $('#statusescar').val();
        $.ajax({
                type : 'get',
                url : '{{URL::to('search_cars')}}',
                data:{'price1':value1,'price2':value2, 'name':search, 'type_cars':type, 'brand_cars':brand, 'origin_cars':origin, 'uses_cars':uses, 'statuses_cars':status},
                success:function(data){
                $('#content').html(data);
                }
                });
        } 
        });


        $("#typecar").change(function(){
            var type =  $('#typecar').val();
                    
        var search = $('#search').val();
        var brand =  $('#brandcar').val();
        var origin =  $('#origincar').val();
        var uses =  $('#usescar').val();
        var status =  $('#statusescar').val();

            $.ajax({
                type : 'get',
                url : '{{URL::to('search_cars')}}',
                data:{'type_cars':type, 'name':search, 'brand_cars':brand, 'origin_cars':origin, 'uses_cars':uses, 'statuses_cars':status},
                success:function(data){
                $('#content').html(data);
                }
                });
        });


        $("#brandcar").change(function(){
            var brand =  $('#brandcar').val();
                    
        var search = $('#search').val();
        var type =  $('#typecar').val();
        var origin =  $('#origincar').val();
        var uses =  $('#usescar').val();
        var status =  $('#statusescar').val();

            $.ajax({
                type : 'get',
                url : '{{URL::to('search_cars')}}',
                data:{'brand_cars':brand, 'name':search, 'type_cars':type, 'origin_cars':origin, 'uses_cars':uses, 'statuses_cars':status},
                success:function(data){
                $('#content').html(data);
                }
                });
        });


        $("#origincar").change(function(){
            var origin =  $('#origincar').val();
                    
        var search = $('#search').val();
        var type =  $('#typecar').val();
        var brand =  $('#brandcar').val();
        var uses =  $('#usescar').val();
        var status =  $('#statusescar').val();

            $.ajax({
                type : 'get',
                url : '{{URL::to('search_cars')}}',
                data:{'origin_cars':origin, 'name':search, 'type_cars':type, 'brand_cars':brand, 'uses_cars':uses, 'statuses_cars':status},
                success:function(data){
                $('#content').html(data);
                }
                });
        });


        $("#usescar").change(function(){
            var uses =  $('#usescar').val();
                    
        var search = $('#search').val();
        var type =  $('#typecar').val();
        var brand =  $('#brandcar').val();
        var origin =  $('#origincar').val();
        var status =  $('#statusescar').val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('search_cars')}}',
                data:{'uses_cars':uses, 'name':search, 'type_cars':type, 'brand_cars':brand, 'origin_cars':origin, 'statuses_cars':status},
                success:function(data){
                $('#content').html(data);
                }
                });
        });


        $("#statusescar").change(function(){
            var status =  $('#statusescar').val();
        var search = $('#search').val();
        var type =  $('#typecar').val();
        var brand =  $('#brandcar').val();
        var origin =  $('#origincar').val();
        var uses =  $('#usescar').val();

            $.ajax({
                type : 'get',
                url : '{{URL::to('search_cars')}}',
                data:{'statuses_cars':status, 'name':search, 'type_cars':type, 'brand_cars':brand, 'origin_cars':origin, 'uses_cars':uses},
                success:function(data){
                $('#content').html(data);
                }
                });
        });
</script>