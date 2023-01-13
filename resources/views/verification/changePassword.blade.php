<x-layouts>
@include('inc.navigation')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Change Password</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<form action="/UpdatePassword" method="POST">
<!-- login -->
@csrf
<div class="login">
    <div class="container">
        <h2>Change Password</h2>

        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            @if (session()->has('change_password'))
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('change_password')}}

            </div>
            @endif
            @error('error')
            <p class="alert alert-danger">
               {{$message}}
            </p>
            @enderror
                <input type="password" placeholder="Old Password" name="oldpassword" >
                @error('oldpassword')
                <div class="text text-danger">{{$message}}</div>
            @enderror
                <input type="password" placeholder="New Password" name="password" >
                @error('password')
                    <div class="text text-danger">{{$message}}</div>
                @enderror
                <div class="forgot">


                <input type="submit" value="Change Password">

        </div>

    </div>
</div>
<!-- //login -->
</div>
</form>
@include('inc.bottombanner')
</x-layouts>
