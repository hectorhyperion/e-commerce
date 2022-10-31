<x-layouts>
@include('inc.navigation')
<div class="container">
    <h1 class="text-center">{{$title}}</h1>
</div>

<div class="products">

    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories">
                <h2>Categories</h2>
                <ul class="cate">

                        @if (count($data) > 0)
                      @foreach ($data as $item)
                      <li><a href="/prodcut/category/{{$item->category_name}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$item->category_name}}</a></li>
                    @endforeach
                        @else
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i> No Category Found</li>
                        @endif

                </ul>
            </div>
        </div>
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids">
                    <div class="sorting">
                        <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Default sorting</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by popularity</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by average rating</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by price</option>
                        </select>
                    </div>
                    <div class="sorting-left">
                        <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 9</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 18</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 32</option>
                            <option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>All</option>
                        </select>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
@if(count($query) > 0)
@foreach ($query as $item)

<div class="agile_top_brands_grids">
    <div class="col-md-4 top_brand_left">
        <div class="hover14 column">
            <div class="agile_top_brand_left_grid">
                <div class="agile_top_brand_left_grid_pos">
                    <img src="{{url('assets/images/offer.png')}}" alt=" " class="img-responsive">
                </div>
                <div class="agile_top_brand_left_grid1">
                    <figure>
                        <div class="snipcart-item block">
                            <div class="snipcart-thumb">
                                <a href="/product/listings/{{$item->id}}"><img title=" " alt="" height="30px" src="{{$item->image ? asset('storage/'.$item->image): asset('images/no-image.jpg')}}" style="object-fit: cover ; width:50px"></a>
                                <p>{{$item->product_name}}</p>
                                <h4>${{$item->discount_price}} <span>${{$item->price}}</span></h4>
                            </div>
                            <div class="snipcart-details top_brand_home_details">
                                <form action="#" method="post">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart">
                                        <input type="hidden" name="add" value="1">
                                        <input type="hidden" name="business" value=" ">
                                        <input type="hidden" name="item_name" value="{{$item->product_name}}">
                                        <input type="hidden" name="amount" value="{{$item->price}}">
                                        <input type="hidden" name="discount_amount" value="{{$item->discount_price}}">
                                        <input type="hidden" name="currency_code" value="USD">
                                        <input type="hidden" name="return" value=" ">
                                        <input type="hidden" name="cancel_return" value=" ">
                                        <input type="submit" name="submit" value="Add to cart" class="button">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

</div>
@endforeach
@else

<div class="col-md-4 top-brand-left">
    <p>No Product Found</p>
</div>
                @endif

            </div></div>
						<div class="clearfix"> </div>
				</div>

				<nav class="numbering">
					<ul class="pagination paging">
                           {{$query->links()}}
					</ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</x-layouts>
