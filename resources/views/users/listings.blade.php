<x-layouts>
    @include('inc.navigation')
    <div class="products">
		<div class="container">
			<div class="agileinfo_single">

				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="{{$arr->image ? asset('storage/'.$arr->image): asset('images/no-image.jpg')}}" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2>{{$arr->product_name}}</h2>

					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{$arr->description}}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
                            <h4>
                                @if ($arr->discount_price!= null)
                           ${{$arr->discount_price}}
                      @else
                      ${{$arr->price}}
                          @endif

                          @if($arr->discount_price == true)
                               <span>${{$arr->price}}</span></h4>
                               @endif
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
                            <form action="/addCart/{{$arr->id}} " method="post">
                                @csrf
                                    <input type="number" class="col-md-6 text-center" name="quantity" value="1" min="1" style="margin-bottom: 5px ;padding-right:0">
                                    <input type="hidden" name="product_title" value="{{$arr->product_name}}">
                                    <input type="hidden" name="price" value="{{$arr->price}}">
                                    <input type="hidden" name="discount_price" value="{{$arr->discount_price}}">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="return" value=" ">
                                    <input type="hidden" name="cancel_return" value=" ">
                                    <input type="submit" name="submit" value="Add to cart" class="button">
                            </form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</x-layouts>
