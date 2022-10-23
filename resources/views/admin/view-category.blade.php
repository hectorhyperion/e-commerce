<x-admin-layouts>
<h1 class="jumbotron text-center">CATEGORY</h1>
@if (session()->has('status'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('status')}}
   
</div>
@endif
<div class="card card_border py-2 mb-4">
    <div class="cards__heading">
        <h3>ADD NEW CATEGORY<span></span></h3>
    </div>
    <div class="card-body">
        <form action="/add-category" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="input__label">Category</label>
                <input type="text" class="form-control input-style" id="exampleInputEmail1" placeholder="Enter Category" name="category_name">
                @error('category_name')
              <p class="text-danger"> {{$message}}</p>    
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-style mt-4 ">Submit</button>
        </form>
    </div>
</div>

<div class="card card_border py-2 mb-4">
    <div class="cards__heading">
        <table class="table table-hover shadow-lg p-3 mb-5 bg-body rounded">
            <tr class=" table-primary">
                <th>S/n</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
          
              
                @if (count($data) > 0)

                    @foreach ($data as $item)
                <tr class="table-dark">
                <td>{{$no++}}</td>
            <td>{{$item->category_name}}</td>
            <td><a href="/category_edit/{{$item->id}}" class="btn btn-primary">Edit</a>  <a href="/category_delete/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This?')">Delete</a></td>
                 </tr>
                 @endforeach

            @else
            <tr>
                <td> <span style="text-transform: capitalize"> no data found</span>  </td>
            </tr>
                 
                @endif
            
           
        </table>
    </div>
</div>



</x-admin-layouts>