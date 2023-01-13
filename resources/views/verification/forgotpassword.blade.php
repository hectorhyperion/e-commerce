<x-layouts>

    @include('inc.navigation')
    <!-- //navigation -->
    <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Reset Password</li>
                </ol>
            </div>
        </div>
    <!-- //breadcrumbs -->
    <form action="/passwordReset" method="POST">
        <!-- login -->
        @csrf
        <div class="login">
            <div class="container">
                <h2>Forgot Password ?</h2>

                <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                        @error('email')
                  <p class="text-danger">{{$message}}</p>
                        @enderror
                        @if (session()->has('status'))
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('status')}}
                @endif
                        <input type="email" placeholder="Email Address" name="email" >
                        @error('email')
                        <div class="text text-danger">{{$message}}</div>
                    @enderror

                        <div class="forgot">

                        <input type="submit" value="Get Password verification">

                </div>

            </div>
        </div>
    <!-- //login -->
        </div>
    </form>
    </x-layouts>
