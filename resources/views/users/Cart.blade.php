<x-layouts :$data>
    @include('inc.navigation')

            <div class="container">
                @if (session()->has('status'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('status')}}

</div>
@endif
                <div class="shadow-lg p-3 mb-5 bg-body rounded">


                <table class="table table-striped table-hover table-secondary ">

                    <tr class="">
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                    @php
                        $totalprice=0;
     @endphp
                    @if (count($arr)> 0)
                        @foreach ($arr as $item)
                <tr>
                    <td>{{$item->product_title}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>${{$item->price}}</td>
                    <td> <img id="example" src="{{$item->image ? asset('storage/'.$item->image): asset('images/no-image.jpg')}}" alt=" " class="img-responsive" height="150px" width="150px"></td>
                    <td> <a href="/remove/cart/{{$item->id}}" class="btn btn-primary" onclick="return confirm('Do You Want To Remove This Product?')">Remove</a> </td>
                </tr>

                    @php
                $totalprice=$totalprice + $item->price
                    @endphp

        @endforeach

                @else
                <p>No Item Cart</p>
            @endif
                </table>
      </div>

      <p class="center"> ${{$totalprice}}</p>
<div class="margin">
    @if (count($arr) > 0)
  <h1>Place Order</h1>
        <a href="/cashOrder" class="btn btn-danger">Pay On Delivery</a>
        <a href="/payWithCard/{{$totalprice}}" class="btn btn-danger">Pay Using Card</a>
    @else

    @endif


</div>


        </div>
</x-layouts>
