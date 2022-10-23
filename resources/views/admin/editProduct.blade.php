<x-admin-layouts>
    <h1 class="jumbotron text-center">EDIT PRODUCTS</h1>

    @if (session()->has('success'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('success')}}
       
    </div>
    @endif
    <div class="card card_border py-2 mb-4">
        <div class="card-body">
            <form action="/storeEditProducts/{{$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Product" class="input__label">Product</label>
                        <input type="text" name="product_name"  value="{{$data->Product_name}}" class="form-control input-style" id="Product"
                            placeholder="Prodcut">
                            @error('product_name')
                            <p class="text-danger">{{$message}}</p>
                                
                            @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description" class="input__label">Description</label>
                        <input type="text" class="form-control input-style" id="description"
                            placeholder="Description" value="{{$data->description}}" name="description">
                            @error('description')
                            <p class="text-danger">{{$message}}</p>
                                
                            @enderror
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Quantity" class="input__label">Quantity</label>
                        <input type="number"   value="{{$data->quantity}}" class="form-control input-style" name="quantity" id="Quantity">
                        @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                            
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Price" class="input__label">Price </label>
                        <input type="number" value="{{$data->price}}" class="form-control input-style" name="price" id="Price">
                        @error('price')
                        <p class="text-danger">{{$message}}</p>
                            
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="discount_price" class="input__label">Discount Price</label>
                        <input type="number"  name="discount_price" value="{{$data->discount_price}}" class="form-control input-style" id="discount_price">
                        @error('discount_price')
                        <p class="text-danger">{{$message}}</p>
                            
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="input__label"> Select Category</label>
                    <select class="custom-select input-style"  name="category">
                                      <option value=" {{$data->discount_price}}"> {{$data->category}}</option>
                                      @if(count($arr)> 0)
                                      @foreach ($arr as $item)
                                            <option value="{{$item->category_name}}">{{$item->category_name}}</option>
                                              @endforeach
                                              @else
                                              No Category Found
                                              @endif              
                    </select>
                    @error('category')
                    <p class="text-danger">{{$message}}</p>
                        
                    @enderror
                </div>
 
                        <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" >
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                  <img src="{{$data->image ? asset('storage/'.$data->image): asset('images/no-image.jpg')}}" alt="" style="object-fit: cover; height:100px; width:150px" >
                  <br>
                  <button type="submit" class="btn btn-primary btn-style mt-4">Update</button>
            </form>
        </div>
    </div>
</x-admin-layouts>