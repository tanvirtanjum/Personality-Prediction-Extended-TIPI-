@include('SideBars.admin_sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Delivery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <title>Scores</title>
</head>
<body>
  <form method="post">
    <div align="center" class="table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Extraversion</th>
                    <th>Conscientiousness</th>
                    <th>Openness</th>
                    <th>Agreeableness</th>
                    <th>Neuroticism</th>
                    <th>Submitted By</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody id='tab'>
              @foreach($res as $result)
                  <tr>
                    <th>{{$loop->index+1}} </th>
                    <th>{{$result->extraversion_score}}/7</th>
                    <th>{{$result->conscientiousness_score}}/7</th>
                    <th>{{$result->openness_score}}/7</th>
                    <th>{{$result->agreeableness_score}}/7</th>
                    <th>{{$result->neuroticism_score}}/7</th>
                    <th>{{$result->username}}</th>
                    <th>{{$result->submitted_at}}</th>
                  </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </form>
</body>
</html>
