@include('SideBars.consumer_sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/alldash.css') }}">
    <title>Consumer Dashboard</title>
</head>
<body>
    <div class="pro">
		<h1>Welcome to Consumer Dashboard</h1>
    <div align="middle"> <span style="color:blue; font-weight: bold;"> {{session('_message')}} </span> </div> <br>
	</div>
</body>
</html>
