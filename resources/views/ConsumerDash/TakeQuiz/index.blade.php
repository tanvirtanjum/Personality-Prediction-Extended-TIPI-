@include('SideBars.consumer_sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Delivery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <title>Quiz Module</title>
</head>
<body>
  <form method="post">
    <div align="center" class="table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody id='tab'>
              @foreach($ques as $question)
                  <tr>
                    <th>{{$question->id}}</th>
                    <th>{{$question->question}} </th>
                    <th>
                      <select name= 'q{{$question->id}}'>
                      @if($question->type_id == 1)
                        @foreach($ans as $answer)
                            <option value = '{{$answer->remark_standard}}'>{{$answer->ans}}</option>
                        @endforeach
                      @endif
                      @if($question->type_id == 2)
                        @foreach($ans as $answer)
                            <option value = '{{$answer->remark_reverse}}'>{{$answer->ans}}</option>
                        @endforeach
                      @endif
                      </select>
                    </th>
                  </tr>
              @endforeach
              <tr>
                <th colspan="3" align='middle'> <input type='submit' value="SUBMIT"> </th>
              </tr>
            </tbody>
        </table>
    </div>
  </form>
</body>
</html>
