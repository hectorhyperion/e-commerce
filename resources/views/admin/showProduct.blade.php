<x-admin-layouts>
<h1 class="jumbotron text-center">Products</h1>

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
                <th>Category Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount_price</th>
                <th>Category</th>
                <th>image</th>
                <th>Action</th>
            </tr>
          
              
                @if (count($data) > 0)

                    @foreach ($data as $item)
                <tr class="table-dark">
                <td>{{$no++}}</td>
            <td>{{$item->Product_name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->discount_price}}</td>
            <td>{{$item->category}}</td>
            <td>    <img src="{{$item->image ? asset('storage/'.$item->image): asset('images/no-image.jpg')}}" alt="" style="object-fit: cover; height:100px; width:500px" ></td>
            <td><a href="/product_edit/{{$item->id}}" class="btn btn-primary">Edit</a>  <a href="/product_delete/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This?')">Delete</a></td>
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