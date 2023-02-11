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
                        <th>S/n</th>
                        <th>Item</th>
                        <th>image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                            <th>Cancel Order</th>
                    </tr>

                    @if (count($data)> 0)
                        @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->product_name}}</td>
                    <td> <img id="example" src="{{$item->image ? asset('storage/'.$item->image): asset('images/no-image.jpg')}}" alt=" " class="img-responsive" height="150px" width="150px"></td>
                <td>{{$item->quantity}}</td>
                    <td>${{$item->price}}</td>
                <td>{{$item->payment_status}}</td>
                <td>{{$item->delivery_status}}</td>
                <td>
                    @if($item->delivery_status=='Processing')
                    <a onclick="return confirm('You Are About To Canel This Order')" href="/cancelOrder/{{$item->id}}" class="btn btn-danger">Cancel Order</a>
                    @else
                    <p style="color:red;">NOT ALLOWED</p>
                @endif
                </td>
                </tr>

        @endforeach
                @else
                <p>No Item In Order </p>
            @endif
                </table>
      </div>


        </div>
        {{$data->links()}}
</x-layouts>
