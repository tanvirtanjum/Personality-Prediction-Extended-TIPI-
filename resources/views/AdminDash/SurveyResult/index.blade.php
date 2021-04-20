@include('SideBars.admin_sidebar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Delivery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <title>Scores</title>
    <script>
      function savePDF()
        {
            var sTable = document.getElementById('hide').innerHTML;
            var style = "<style>";
            style = style + "table{width: 100%;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse: collapse;font-style: bold;}";
            style = style + "table th {border: 2px solid #000000;}";
            style = style + "table td{border: 2px solid #000000;padding: 8px;}";
            //style = style + "table tr:nth-child(even) {background-color: #f2f2f2;}";
            //style = style + "table tr:nth-child(odd) {background-color: #E6E6FA;}";
            style = style + "table th {padding-top: 8px;padding-bottom: 8px;text-align: center;background-color: #000000;color: white;}";
            style = style + "</style>";


            // CREATE A WINDOW OBJECT.
            var win = window.open('', '', 'height=700,width=700');

            win.document.write('<html><head>');
            win.document.write('<title>PDF</title>');   // <title> FOR PDF HEADER.
            win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
            win.document.write('</body></html>');

            win.document.close(); 	// CLOSE THE CURRENT WINDOW.

            win.print();    // PRINT THE CONTENTS.

            //$("#hide").attr("hidden", "hidden"); 
        }
    </script>
</head>
<body>
  <form method="">
    <div align="center" class="table" id="hide" style="width:80%; height:95%">
    <!-- <input type="submit" id-"btnprint" onclick="savePDF()" value="PRINT"> -->
        <table class="content-table">
            <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Extraversion</th>
                    <th>Extraversion (TIPI)</th>
                    <th>Conscientiousness</th>
                    <th>Conscientiousness (TIPI)</th>
                    <th>Openness</th>
                    <th>Openness (TIPI)</th>
                    <th>Agreeableness</th>
                    <th>Agreeableness (TIPI)</th>
                    <th>Neuroticism</th>
                    <th>Neuroticism (TIPI)</th>
                    <th>Submitted By</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody id='tab'>
              @foreach($res as $result)
                  <tr>
                    <th>{{$loop->index+1}} </th>
                    <th>{{$result->extraversion_score}}/7</th>
                    <th>{{$result->tipi_extraversion_score}}/7</th>
                    <th>{{$result->conscientiousness_score}}/7</th>
                    <th>{{$result->tipi_conscientiousness_score}}/7</th>
                    <th>{{$result->openness_score}}/7</th>
                    <th>{{$result->tipi_openness_score}}/7</th>
                    <th>{{$result->agreeableness_score}}/7</th>
                    <th>{{$result->tipi_agreeableness_score}}/7</th>
                    <th>{{$result->neuroticism_score}}/7</th>
                    <th>{{$result->tipi_neuroticism_score}}/7</th>
                    <th>{{$result->username}}</th>
                    <th>{{$result->submitted_at}}</th>
                  </tr>
                  <!-- <tr>
                    <th>{{$loop->index+1}} </th>
                    <th>{{number_format($result->extraversion_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->tipi_extraversion_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->conscientiousness_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->tipi_conscientiousness_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->openness_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->tipi_openness_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->agreeableness_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->tipi_agreeableness_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->neuroticism_score*100/7, 2)}}% </th>
                    <th>{{number_format($result->tipi_neuroticism_score*100/7, 2)}}% </th>
                    <th>{{$result->username}}</th>
                    <th>{{$result->submitted_at}} </th>
                  </tr> -->
              @endforeach
            </tbody>
        </table>
    </div>
  </form>
</body>
</html>
