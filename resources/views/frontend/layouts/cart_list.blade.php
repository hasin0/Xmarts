






					<div class="row" >

						<div class="col-12" >
							<!-- Shopping Summery -->

							<table class="table shopping-summery">

								<thead>
									<tr class="main-hading">
										<th>PRODUCT</th>
										<th>NAME</th>
										<th class="text-center">UNIT PRICE</th>
										<th class="text-center">QUANTITY</th>
										<th class="text-center">TOTAL</th> 
										<th class="text-center"><i class="ti-trash remove-icon"></i></th>
									</tr>
								</thead>
								<tbody>
		
									@foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item )
		
									
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
										<td class="action"  data-title="Remove"><a href="#"  class="remove   cart_delete" ><i class="ti-trash remove-icon   cart_delete "   data-id="{{$item->rowId}}"></i></a></td>
									</tr>
		
										
									@endforeach
		
		
		
		
		
		
		
		
								</tbody>
							</table>
						
							<!--/ End Shopping Summery -->
						</div>
					</div>
					
					<div class="row">
						<div class="col-12">
							<!-- Total Amount -->
							<div class="total-amount">
								<div class="row">
									<div class="col-lg-8 col-md-5 col-12">
										<div class="left">
											<div class="coupon">
												<form action="{{route('coupon.add')}}" id="coupon-form" method="post">
													@csrf
													<input type="text" class="form-control" name="code" placeholder="Enter Your Coupon">
													<button type="submit" class="coupon-btn btn-primary">Apply</button>
												</form>
											</div>
											<div class="checkbox">
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-7 col-12">
										<div class="right">
											<ul>
		
												<li>Cart Subtotal<span>${{Cart::subtotal()}}</span></li>
												{{--<li>Shipping<span>${{number_format(\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}</span></li>--}}
												@if(session()->has('coupon'))
												<li>You Save<span>${{number_format(Session::get('coupon')['value'],2)}}</span></li>
												@endif
												
		
												@if(session()->has('coupon'))
												<li class="last">You Pay<span>${{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-Session('coupon')['value']}}</span></li>
												 @else
												 <li>Cart Subtotal<span>${{Cart::subtotal()}}</span></li>
		
		
												 @endif
											</ul>
											<div class="button5">
												<a href="{{Route('checkout1')}}" class="btn">Checkout</a>
												<a href="#" class="btn">Continue shopping</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/ End Total Amount -->
						</div>
					</div>

					