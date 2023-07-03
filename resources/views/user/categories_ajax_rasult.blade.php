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
                    <a href="{{url('categories_detail', $product->slug)}}">{{ $product->{'name_'.app()->getLocale()} }}</a>
                </h3>
                <p><b>Category</b>: {{$Specification->sub_category_slug}} </p>
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
                            @foreach ($status as $statue)
                                @if ($statue->id == $Specification->status )
                                    {{$statue->{'name_'.app()->getLocale()} }}
                                @endif
                            @endforeach
                        </span>
                    </li>
                    <li>
                        Seller
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