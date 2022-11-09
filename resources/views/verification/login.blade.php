<x-layouts>

@include('inc.navigation')
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<form action="/verify" method="POST">
    <!-- login -->
    @csrf
	<div class="login">
		<div class="container">
			<h2>Login Form</h2>

			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">

                @error('errors')
                <p class="alert alert-danger">
                   {{$message}}
                </p>
                @enderror
					<input type="email" placeholder="Email Address" name="email" >
                    @error('email')
                    <div class="text text-danger">{{$message}}</div>
                @enderror
					<input type="password" placeholder="Password" name="password" >
                    @error('password')
                        <div class="text text-danger">{{$message}}</div>
                    @enderror
					<div class="forgot">
						<a href="#">Forgot Password?</a>

					<input type="submit" value="Login">

			</div>
			<h4>For New People</h4>
			<p><a href="/Register">Register Here</a> (Or) go back to <a href="/">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
    </div>
</form>
</x-layouts>
