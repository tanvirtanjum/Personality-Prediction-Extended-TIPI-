<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/signup.css') }}">
	<script src="assets/js/validSignup.js"></script>
</head>

<body>
	<div class="wrap">
		<h2>Sign Up</h2>
		<form method="post" name="myForm">
			@csrf
			<input type="text" name="username" placeholder="Username" value="" required>
			@foreach($errors->get('username') as $err)
        	<span style="color: red">{{$err}}</span> <br>
       		@endforeach
			<input type="Password" name="password" placeholder="Password" required><br>
			@foreach($errors->get('password') as $err)
        	<span style="color: red">{{$err}}</span> <br>
       		@endforeach
			<input type="Password" name="confirmpassword" placeholder="Confirm Password" required><br>
			@foreach($errors->get('confirmpassword') as $err)
        	<span style="color: red">{{$err}}</span> <br>
        	@endforeach
			<input type="text" name="fullname" placeholder="Full Name" value="" required>
			@foreach($errors->get('fullname') as $err)
        	<span style="color: red">{{$err}}</span> <br>
       		@endforeach
      		<input type="number" name="age" placeholder="Age" min="12" value="" required>
			@foreach($errors->get('age') as $err)
        	<span style="color: red">{{$err}}</span> <br>
       		@endforeach
			<input type="text" name="design" placeholder="Occupation" value="" required>
			@foreach($errors->get('design') as $err)
        	<span style="color: red">{{$err}}</span> <br>
        	@endforeach
			<input type="email" name="email" placeholder="Email" value="" required>
			@foreach($errors->get('email') as $err)
        	<span style="color: red">{{$err}}</span> <br>
        	@endforeach
			<input type="submit" name="REGISTER" value="REGISTER"><br><br>

      <div align='middle' style="color:red;">{{session('msg')}}</div>

			<p><b>Or Sign In <a href="{{route('signin')}}">here</a></b></p>
		</form>
	</div>
</body>

</html>
