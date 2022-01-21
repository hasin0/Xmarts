<table class="table shopping-summery">
    <thead>
        <tr class="main-hading">
            <th>PRODUCT</th>
            <th>NAME</th>
            <th class="text-center">UNIT PRICE</th>
            <th class="text-center">QUANTITY</th>
            <th class="text-center">TOTAL</th> 
            <th class="text-center">ADD TO CART</th> 

            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
        </tr>
    </thead>
    <tbody>

        @if (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()>0)
            
     

        @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item )

        
        <tr>
            <td class="image" data-title="No"><img src="{{$item->model->photo}}" alt="#"></td>
            <td class="product-des" data-title="Description">
                <p class="product-name"><a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a></p>
                <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
            </td>
            <td class="price" data-title="Price"><span>${{$item->price}} </span></td>
            <td class="qty" data-title="Qty"><!-- Input Order -->
                <div class="input-group">
                    <div class="button minus">
                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                            <i class="ti-minus"></i>
                        </button>
                    </div>
                    <div class="quantity">

                        <input type="number" name="quantity" class="input-number"  id="qty-input-{{$item->rowId}}" data-id="{{$item->rowId}}" data-min="1" data-max="100" value="{{$item->qty}}">
                           
                        <input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}" >


                    </div>

                    
                    <div class="button plus">
                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                            <i class="ti-plus"></i>
                        </button>
                    </div>
                </div>
                <!--/ End Input Order -->
            </td>
            <td class="total-amount" data-title="Total"><span>${{$item->subtotal()}}</span></td>
            <td><a href="javascript:void(0);" data-id="{{$item->rowId}}"class="move-to-cart btn text-white">Add To Cart</a></td>
            <td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon  delete_wishlist  "   data-id="{{$item->rowId}}"  ></i></a></td>

        </tr>

            
        @endforeach
        @else
        <p>You  don't have any wishlist product!</p>


        @endif








    </tbody>
</table>