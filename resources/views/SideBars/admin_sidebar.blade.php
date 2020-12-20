
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<body>
		<form method='post'>
			<input type="checkbox" id="check">
			<label for="check">
			<i class="fas fa-bars" id="btn"></i>
			<i class="fas fa-times" id="cancel"></i>
			</label>
			<nav class="sidebar">
				<header>Admin Dashboard</header>
				<ul class="pop">
					<li><a><i class="fas fa-user-circle"></i>Profile<span class="sub_arrow"></span></a>
						<ul>
							<li><a href="#"><i class="fas fa-address-card"></i>{{session('user')}}</a></li>
							<li><a href="#"><i class="fas fa-key"></i>Change Password</a></li>
							<li><a href="{{route('signout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
						</ul>
					</li>
					<li><a><i class="fas fa-tasks"></i>Management<span class="sub_arrow"></span></a>
						<ul>
							<li><a href="#"><i class="fas fa-user-circle"></i>Employee Management</a></li>
							<li><a href="#"><i class="fas fa-users"></i>Customer Management</a></li>
							<li><a href="#"><i class="fab fa-product-hunt"></i>Product Management</a></li>
							<li><a href="#"><i class="fas fa-registered"></i>Pending Registrations</a></li>
							<li><a href="#"><i class="fas fa-flag"></i>Notice Manage</a></li>
						</ul>
					</li>
					<li><a><i class="fas fa-history"></i>Result<span class="sub_arrow"></span></a>
						<ul>
							<li><a href="{{route('admin.score')}}"><i class="far fa-clipboard"></i>Survey Results</a></li>
						</ul>
					</li>
				</ul>

				<div class="social_media">
					<a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
					<a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
				</div>
			</nav>
		</form>
	</body>
</html>
