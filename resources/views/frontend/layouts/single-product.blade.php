


      @foreach ($product as $item)
          
      
    <div class="col-lg-4 col-md-6 col-12">
        <div class="single-product">
            <div class="product-img">
                {{-- product image--}}
            
                <a href="product-details.html">
                    @php
                    $photo=explode(',',$item->photo);
                    @endphp
                    <img class="default-img" src="{{$photo[0]}}" alt="#">
                    {{--<img class="hover-img" src="{{$photo[1]}}" alt="#">--}}
                    <span class="new">{{$item->condition}}</span>
                </a>
                <div class="button-head">
                    <div class="product-action">
                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                    </div>
                    <div class="product-action-2">
                        <a title="Add to cart" href="#">Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <h3><a href="{{route('product.detail',$item->slug)}}">{{$item->title}}</a></h3>
                  <p>{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
                <div class="product-price">
                    <span>${{number_format($item->offer_price,2)}} <small><del class="text-danger ">${{number_format($item->price,2)}}</del></small></span>
                </div>
            </div>
        </div>
    </div>
      @endforeach
  