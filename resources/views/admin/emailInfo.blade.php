<x-admin-layouts>

<h1 class="jumbotron">Send Email To {{$order->email}}</h1>



        <div class="card card_border py-2 mb-4">
            <div class="card-body">
                <form action="/sendUserEmail{{$order->id}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gretting" class="input__label">Gretting</label>
                            <input type="text" name="gretting" class="form-control input-style" id="gretting"
                                placeholder="Gretting">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstline" class="input__label">First Line</label>
                            <input type="text" name="firstline" class="form-control input-style" id="firstline"
                                placeholder="FirstLine">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="input__label">Message</label>
                        <input type="text" name="body" class="form-control input-style" id="body"
                            placeholder="Add Message">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="button" class="input__label">Button</label>
                            <input type="text" name="button" class="form-control input-style" id="button">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="url" class="input__label">Url</label>
                            <input type="text" name="url" class="form-control input-style" id="url">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="lastline" class="input__label">Lastline</label>
                            <input type="text" name="lastline" class="form-control input-style" id="lastline">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-style mt-4">Send Email</button>
                    <a href="/admin/order" class="btn btn-primary btn-style mt-4" style="float: right">Back</a>
                </form>
            </div>
        </div>

</form>
</x-admin-layouts>
