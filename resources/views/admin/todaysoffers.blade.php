<x-admin-layouts>
<h1 class="jumbotron text-center">Todays Offers</h1>



@if (session()->has('success'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('success')}}

</div>
@endif
<div class="card card_border py-2 mb-4">
    <div class="card-body">
        <form action="/admin/todayoffer" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Product" class="input__label">Product</label>
                    <input type="text"  value="{{old('product_name')}}" name="product_name"  class="form-control input-style" id="Product"
                        placeholder="Prodcut">
                        @error('product_name')
                        <p class="text-danger">{{$message}}</p>

                        @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="description" class="input__label">Description</label>
                    <input type="text"  value="{{old('description')}}" class="form-control input-style" id="description"
                        placeholder="Description" name="description">
                        @error('description')
                        <p class="text-danger">{{$message}}</p>

                        @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Quantity" class="input__label">Quantity</label>
                    <input type="number"  min="1" class="form-control input-style" name="quantity" id="Quantity">
                    @error('quantity')
                    <p class="text-danger">{{$message}}</p>

                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="Price" class="input__label">Price </label>
                    <input type="number" min="1" class="form-control input-style" name="price" id="Price">
                    @error('price')
                    <p class="text-danger">{{$message}}</p>

                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="discount_price" class="input__label">Discount Price</label>
                    <input type="number" min="1"   name="discount_price" class="form-control input-style" id="discount_price">
                    @error('discount_price')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="custom-file was-validated">
                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" >
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Choose file...</div>
            </div>
            <button type="submit" class="btn btn-primary btn-style mt-4">Create</button>
        </form>
    </div>
</div>
</x-admin-layouts>
