@include('SideBars.admin_sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Delivery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <title>Consumers</title>
</head>
<body>
  <form method="post">
    <div align="center" class="table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Occupation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id='tab'>
              @foreach($res as $result)
                  <tr>
                    <th>{{$loop->index+1}} </th>
                    <th>{{$result->username}}</th>
                    <th>{{$result->name}}</th>
                    <th>{{$result->age}}</th>
                    <th>{{$result->email}}</th>
                    <th>{{$result->occupation}}</th>
                    <th><a href="{{route('admin.consumers.remove', [$result->username])}}">&#128683;</a></th>
                  </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </form>
</body>
</html>
