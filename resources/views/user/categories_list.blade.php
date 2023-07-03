@include('user.layouts.head')
@include('user.layouts.header')


<!-- Start Page Banner -->
<div class="page-banner-area item-bg-2">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>{{ $category }}</h2>
                    <ul class="pages-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>{{ $category }}</span></li>
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
                                <label>Uses</label>
                                <select name='usesCat[AttorneyCat][empresaCat]' id='usesCat'>
                                    <option value="">-----</option>
                                    @foreach ($uses as $use)
                                        <option value="{{ $use->id }}">{{ $use->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>


                <input type="hidden" name="category" id="category" value="{{$category}}">
                
                            <div class="form-group">
                                <label>statuses</label>
                                <select name='statusesCat[AttorneyCat][empresaCat]' id='statusesCat'>
                                    <option value="">-----</option>
                                    @foreach ($status as $statu)
                                        <option value="{{ $statu->id }}">{{ $statu->{'name_'.app()->getLocale()} }}</option>
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
                                <a href="{{url('categories_detail', $product->slug)}}"><img src="productimage/{{ $product->image }}" alt="image"></a>
                                <div class="icon">
                                    <a href="{{url('addToWishlist', $product->slig)}}"><i class="flaticon-love"></i></a>
                                </div>
                            </div>
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
        var uses =  $('#usesCat').val();
        var status =  $('#statusesCat').val();
        var category =  $('#category').val();
        
        
        $.ajax({
                type : 'get',
                url : '{{URL::to('search_category')}}',
                data:{'name':search, 'uses':uses, 'statuses':status, 'category':category},
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
        var uses =  $('#usesCat').val();
        var status =  $('#statusesCat').val();
        var category =  $('#category').val();

        
        
        $.ajax({
                type : 'get',
                url : '{{URL::to('search_category')}}',
                data:{'price1':value1,'price2':value2, 'name':search, 'uses':uses, 'statuses':status, 'category':category},
                success:function(data){
                $('#content').html(data);
                }
                });
        } 
        });

        $("#usesCat").change(function(){
            var uses =  $('#usesCat').val();
            var search = $('#search').val();
            var status =  $('#statusesCat').val();
            var category =  $('#category').val();

                $.ajax({
                type : 'get',
                url : '{{URL::to('search_category')}}',
                data:{'name':search, 'uses':uses, 'statuses':status, 'category':category},
                success:function(data){
                $('#content').html(data);
                }
                });
        });


        $("#statusesCat").change(function(){
            var status =  $('#statusesCat').val();
            var search = $('#search').val();
            var uses =  $('#usesCat').val();
            var category =  $('#category').val();

            
            $.ajax({
                type : 'get',
                url : '{{URL::to('search_category')}}',
                data:{'name':search, 'uses':uses, 'statuses':status, 'category':category},
                success:function(data){
                $('#content').html(data);
                }
                });
        });
</script>