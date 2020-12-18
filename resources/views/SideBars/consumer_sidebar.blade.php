
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
				<header>Consumer Dashboard</header>
				<ul class="pop">
					<li><a><i class="fas fa-user-circle"></i>Profile<span class="sub_arrow"></span></a>
						<ul>
							<li><a href="#"><i class="fas fa-address-card"></i>About {{session('LID')}}</a></li>
							<li><a href="#" target='_blank'><i class="fas fa-key"></i>Change Password</a></li>
							<li><a href="{{route('signout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="fab fa-product-hunt"></i>Order Products</a></li>
					<li><a><i class="fas fa-cart-arrow-down"></i>Order List<span class="sub_arrow"></span></a>
						<ul>
							<li><a href="#"><i class="fas fa-shopping-cart"></i>Pending Orders</a></li>
							<li><a href="#"><i class="fas fa-check-circle"></i>Confirmed Orders</a></li>
							<li><a href="#"><i class="fas fa-history"></i>Records</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="fas fa-comment-dots"></i>Complain Box</a></li>
					<li><a href="#"><i class="fas fa-envelope"></i>Chatbox</a></li>


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
