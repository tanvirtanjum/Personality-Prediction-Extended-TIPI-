@if(Session::get('role') == 1)
    @include('SideBars.admin_sidebar')    
@elseif(Session::get('role') == 2)
    @include('SideBars.consumer_sidebar')
@else
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/about.css') }}">
</head>
<body>
  <div class="box">
    <form method="POST">
        <hr><h1>Profile Info <i class="fas fa-users"></i></h1><hr><br><br>
        <!--<img src="{{URL::to('uploads/')}}" style="height: 50px;width:50px;border-radius:50%"> -->
        <p>Username</p>
        <input type="text" name="username" value="{{$user[0]->username}}" readonly><br><br>
        <p>Full Name</p>
        <input type="text" name="fullname" value="{{$user[0]->name}}" readonly><br><br>
        <p>Occupation</p>
        <input type="text" name="occupation" value="{{$user[0]->occupation}}" readonly><br><br>
        <p>Email<i class="far fa-envelope"></i></p>
        <input type="email" name="email" value="{{$user[0]->email}}" readonly><br><br>
        <p>Age</p>
        <input type="text" name="age" value="{{$user[0]->age}}" readonly><br><br>
    </form>
    <a href='{{route("aboutUser.update")}}'> <input type="submit" value="Edit Profile"> </a>
  </div>
</body>
</html>
