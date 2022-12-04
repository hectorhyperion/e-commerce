<x-admin-layouts>
<h1 class="jumbotron text-center">Pending Order</h1>

<form action="/admin/order" method="GET">
        <!-- notification menu start -->
        <div class="menu-right">
          <div class="navbar user-panel-top">
            <div class="search-box">

                <input class="search-input" placeholder="Search Here..." type="text" name="search" id="search">
                <button class="search-submit" value=""><span class="fa fa-search"></span></button>

            </div>
              </div>
            </div>
  </form>
@if (session()->has('product'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('product')}}
</div>
@endif
<div class="card card_border py-2 mb-4">
    <div class="cards__heading">
        <table class="table table-hover shadow-lg p-3 mb-5 bg-body rounded">
            <tr class=" table-primary">
                <th>S/n</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product_name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Action</th>
                <th>Print PDF</th>
                <th>Send Email</th>
            </tr>


                @if (count($data) > 0)

                    @foreach ($data as $item)
                <tr class="table-dark fit" >
                <td>{{$no++}}</td>
            <td>{{$item->user_name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->product_name}}</td>
            <td>${{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->payment_status}}</td>
            <td>{{$item->delivery_status}}</td>
            <td>   <img id="example" src="{{$item->image ? asset('storage/'.$item->image): asset('images/no-image.jpg')}}" alt=" " class="img-responsive" height="100px" width="300px"></td>
            <td>
                @if($item->delivery_status =='Processing')
                <a href="/delivered/{{$item->id}}" onclick="return confirm('Are You Sure This Product Is Delivered')" class="btn btn-secondary">Delivered</a>
                @else
                <p class="text-center  " style="color: green"> Delivered</p>
                @endif
            </td>
            <td> <a href="/printpdf{{$item->id}}" class=' btn btn-primary'>Print pdf</a></td>
               <td>
                <a href="/SendEmail{{$item->id}}" class="btn btn-info">Send Mail</a>
               </td>
                 </tr>


                 @endforeach

            @else
            <tr>
                <td> <span style="text-transform: capitalize"> no data found</span>  </td>
            </tr>

                @endif


        </table>

        <div class="mt-6 p-4">
            {{$data->links()}}
        </div>
    </div>
</div>
</x-admin-layouts>
