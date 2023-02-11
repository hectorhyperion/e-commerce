<x-layouts :$data>

    @include('inc.navigation')
    <!-- //navigation -->
    <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Sign Up Page</li>
                </ol>
            </div>
        </div>
    <!-- //breadcrumbs -->
    <form action="/store" method="POST">
        @csrf
        <!-- login -->
        <div class="login">
            <div class="container">
                <h2>Sign up Form</h2>

                <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">

                      <input type="text" placeholder="Name " name="name" >
                      @error('name')
                    <div class="alert text-danger">{{$message}}</div>
                      @enderror

                      <input type="email" placeholder="Email Address" name="email" >
                      @error('email')
                      <div class="alert text-danger">{{$message}}</div>
                        @enderror

                        <input type="text" placeholder="Phone" name="phone">
                        @error('phone')
                        <div class="alert text-danger">{{$message}}</div>
                          @enderror
                          <input type="text" placeholder="Address" name="address">
                          @error('address')
                          <div class="alert text-danger">{{$message}}</div>
                            @enderror
                      <select name="usertype" id="" class="login-form-grid">
                            <option value="">Select Account Type</option>
                            @foreach ($user as $user)
                                  <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                          </select>
                          @error('usertype')
                          <div class="alert text-danger">{{$message}}</div>
                            @enderror
                        <input type="password" placeholder="Password" name="password">
                        @error('password')
                        <div class="alert text-danger">{{$message}}</div>
                          @enderror
                        <input type="password" placeholder="confirm_password" name="password_confirmation">
                        @error('  password_confirmation')
                        <div class="alert text-danger">{{$message}}</div>
                          @enderror
                        <input type="submit" value="Sign up">
                </div>
                <h4>For Old People</h4>
                <p><a href="/Login">Login Here</a> (Or) go back to <a href="/">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
            </div>
        </div>
    <!-- //login -->

    </form>
    </x-layouts>
