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
							<h4 class="m-sing">${{$arr->discount_price}} <span>${{$arr->price}}</span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
                                <form action="#" method="post">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart">
                                        <input type="hidden" name="add" value="1">
                                        <input type="hidden" name="business" value=" ">
                                        <input type="hidden" name="item_name" value="{{$arr->product_name}}">
                                        <input type="hidden" name="amount" value="{{$arr->price}}">
                                        <input type="hidden" name="discount_amount" value="{{$arr->discount_price}}">
                                        <input type="hidden" name="currency_code" value="USD">
                                        <input type="hidden" name="return" value=" ">
                                        <input type="hidden" name="cancel_return" value=" ">
                                        <input type="submit" name="submit" value="Add to cart" class="button">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</x-layouts>
