<!-- top-brands -->
<div class="top-brands">
<div class="container">
<h2>Top selling offers</h2>
<div class="grid_3 grid_5">
<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
<ul id="myTab" class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
</ul>
<div id="myTabContent" class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
<div class="agile-tp">
<h5>Advertised this week</h5>
<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
</div>
@if (count($todaysoffers) > 0)
@foreach ($todaysoffers as $item)
<div class="agile_top_brands_grids">
<div class="col-md-4 top_brand_left">
<div class="hover14 column">
<div class="agile_top_brand_left_grid">
<div class="agile_top_brand_left_grid_pos">
<img src="{{url('assets/images/offer.png')}}" alt=" " class="img-responsive" />
</div>
<div class="agile_top_brand_left_grid1">
<figure>
<div class="snipcart-item block" >
<div class="snipcart-thumb">
    <a href="products.html"><img id="example" src="{{$item->image ? asset('storage/'.$item->image): asset('images/no-image.jpg')}}" alt=" " class="img-responsive" width="200px"></a>
    <p>{{$item->product_name}}</p>
    <div class="stars">
        <p>left {{$item->quantity}}</p>
    </div>

    <h4>${{$item->price /2 }}<span>${{$item->price}}</span></h4>
</div>
<div class="snipcart-details top_brand_home_details">
    <form action="/addCart/{{$item->id}} " method="post">
        @csrf
            <input type="number" class="col-md-6 text-center" name="quantity" value="1" min="1" style="margin-bottom: 5px ;padding-right:0">

            <input type="hidden" name="product_title" value="{{$item->product_name}}">
            <input type="hidden" name="price" value="{{$item->price}}">
            <input type="hidden" name="discount_price" value="{{$item->discount_price}}">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value=" ">
            <input type="hidden" name="cancel_return" value=" ">
            <input type="submit" name="submit" value="Add to cart" class="button">
    </form>
</div>
</div>
</figure>
</div>
</div>
</div>
</div>
@endforeach
@else
<p>No Offer at the Moment</p>
@endif
<div class="clearfix"> </div>
</div>


<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
<div class="agile-tp">
<h5>This week</h5>
<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
</div>
@if (count($todaysoffers) > 0)
@foreach ($todaysoffers as $item)
<div class="agile_top_brands_grids">
<div class="col-md-4 top_brand_left">
<div class="hover14 column">
<div class="agile_top_brand_left_grid">
<div class="agile_top_brand_left_grid_pos">
    <img src="{{url('assets/images/offer.png')}}" alt=" " class="img-responsive" />
</div>
<div class="agile_top_brand_left_grid1">
<figure>
<div class="snipcart-item block" >
<div class="snipcart-thumb">
    <a href="products.html"><img id="example" src="{{$item->image ? asset('storage/'.$item->image): asset('images/no-image.jpg')}}" alt=" " class="img-responsive" width="200px"></a>
    <p>{{$item->product_name}}</p>
    <div class="stars">
        <p>left {{$item->quantity}}</p>
    </div>

    <h4>${{$item->price /2 }}<span>${{$item->price}}</span></h4>
</div>
<div class="snipcart-details top_brand_home_details">
    <form action="/addCart/{{$item->id}} " method="post">
        @csrf
            <input type="number" class="col-md-6 text-center" name="quantity" value="1" min="1" style="margin-bottom: 5px ;padding-right:0">

            <input type="hidden" name="product_title" value="{{$item->product_name}}">
            <input type="hidden" name="price" value="{{$item->price}}">
            <input type="hidden" name="discount_price" value="{{$item->discount_price}}">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value=" ">
            <input type="hidden" name="cancel_return" value=" ">
            <input type="submit" name="submit" value="Add to cart" class="button">
    </form>
</div>
</div>
</figure>
</div>
</div>
</div>
</div>



</div>
</div>
<div class="clearfix"> </div>
</div>
@endforeach
@else
<p>No Offer Found</p>
@endif

</div>
</div>
</div>
</div>
</div>
</div>
<!-- //top-brands -->
