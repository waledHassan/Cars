

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
