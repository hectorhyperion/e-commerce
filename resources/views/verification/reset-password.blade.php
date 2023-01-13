<x-layouts>

    <form action="/updatepassword/{{$token}}" method="POST">
        <!-- login -->
        @csrf
        <div class="login">
            <div class="container">
                <h2>Reset Password ?</h2>

                <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
  @error('errors')
               <p class="text-danger">{{$message}}</p>
                    @enderror
                        <input type="email" placeholder="Email Address" name="email" >
                        @error('email')
                        <div class="text text-danger">{{$message}}</div>
                    @enderror
                    <input type="password" placeholder="Passoword" name="password" >
                    @error('password')
                    <div class="text text-danger">{{$message}}</div>
                @enderror
                <input type="password" placeholder="Confirm Passowrd" name="password_confirmation">
                @error('password_confirmation')
                <div class="text text-danger">{{$message}}</div>
            @enderror
            <input type="hidden" value="{{$token}}" placeholder="token" name="token">
            @error('password_confirmation')
            <div class="text text-danger">{{$message}}</div>
        @enderror
                        <div class="forgot">

                        <input type="submit" value="Reset Password">

                </div>

            </div>
        </div>
    <!-- //login -->
        </div>
    </form>

</x-layouts>
