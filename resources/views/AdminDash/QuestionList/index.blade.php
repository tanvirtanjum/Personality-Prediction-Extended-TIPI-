@include('SideBars.admin_sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Delivery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <title>Question Management</title>
</head>
<body>
  <form method="post">
    <div align="center" class="table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Question</th>
                    <th>Trait</th>
                    <th>Set</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id='tab'>
              @foreach($res as $result)
                  <tr>
                    <th>{{$loop->index+1}} </th>
                    <th>{{Str::limit($result->question, 40)}}</th>
                    <th>{{$result->trait_name}}</th>
                    <th>{{$result->set_name}}</th>
                    <th>{{$result->type_name}}</th>
                    <th><a href="{{route('admin.questions.edit', [$result->id])}}">&#9997;</a></th>
                  </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </form>
</body>
</html>
