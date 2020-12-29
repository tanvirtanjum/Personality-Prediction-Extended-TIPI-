@include('SideBars.admin_sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Delivery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <title> Edit Question </title>
</head>
<body>
  <form method="post">
    <div align="left" class="table">
        <br><br>
        <hr>
        <h3>
        <p style="color: white;">Trait: {{$result[0]->trait_name}}</P>
        <p style="color: white;">Set: {{$result[0]->set_name}}</P>
        <p style="color: white;">Type: {{$result[0]->type_name}}</P>
        </h3>
        <hr><br><br>
        <textarea name="ques" cols="80" rows="28" placeholder="Write your blogs here..." style="width:100%;overflow:auto;resize:none" required>{{$result[0]->question}}</textarea>  
        <br><br>
        <center>
            <input type="submit">
        </center>
    </div>
  </form>
</body>
</html>
