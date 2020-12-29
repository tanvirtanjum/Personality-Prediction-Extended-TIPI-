@if(Session::get('role') == 1)
    @include('SideBars.admin_sidebar')    
@elseif(Session::get('role') == 2)
    @include('SideBars.consumner_sidebar')
@else
@endif

<!DOCTYPE html>
<html>

<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/changepassword.css') }}">
</head>

<body>
	<div class="loginbox">
		<h1>Password Change</h1>
		<form method="POST" name="myForm">
			<p>Old Password</p>
			<input type="password" name="oldpassword" placeholder="Enter Old Password" value=""><br>
			<p>New Password</p>
			<input type="password" name="newpassword" placeholder="Enter New password" value=""><br>
			<span id="err"></span>
			<p>Confirm New Password</p>
			<input type="password" name="confirmnewpassword" placeholder="Confirm New password" value=""><br>
			<div align='middle'> <span id="err1">{{Session::get('err')}}</span> </div> <br>
			<input type="submit" name="PROCEED" value="Proceed"><span></span>
		</form>
	</div>
</body>
</html>