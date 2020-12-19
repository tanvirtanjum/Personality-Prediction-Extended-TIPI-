<html>

  <head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/signin.css') }}">
  </head>

  <body>
  	<div class="loginbox">
  		<img src="{{ URL::to('css/images/user.png') }}" class="avatar">
  		<h1>Sign In Here</h1>
  		<form method="post" name="login">
  			<p>Username</p>
  			<input type="text" name="username" id="username" placeholder="Enter Username" required><br>
  			<p>Password</p>
  			<input type="password" name="password" id="password" placeholder="Enter Password" required><br>
  			<div align="middle">
          <span style="color:red; font-weight: bold;">{{session('_alert')}}</span>
          <span style="color:white; font-weight: bold;">{{session('success')}}</span>
        </div> <br>
  			<input type='submit' name="LOGIN" value="LOGIN">
  			<a href="#" target="_blank">Forget password?</a><br>
  			<a href="{{route('signup')}}">Don't have an account?</a>
  		</form>
  	</div>
  </body>
</html>
