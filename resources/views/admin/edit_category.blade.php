<x-admin-layouts>
    <div class="card card_border py-2 mb-4">
        <div class="cards__heading">
            <h3>ADD NEW CATEGORY<span></span></h3>
        </div>
        <div class="card-body">
            <form action="/storeCategory/{{$data->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="input__label">Category</label>
                    <input type="text" class="form-control input-style" value="{{$data->category_name}}" id="exampleInputEmail1" placeholder="Enter Category" name="category_name">
                    @error('category_name')
                  <p class="text-danger"> {{$message}}</p>    
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary btn-style mt-4 ">Update</button>
            </form>
        </div>
    </div>
</x-admin-layouts>