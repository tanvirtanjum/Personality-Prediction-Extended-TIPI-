<html>

  <head>
    <title>Sign In</title>
  </head>

  <body>
    <form method="post">
      <table>
        <tr>
          <td>User Name: </td>
          <td> <input type='text' name="username" placeholder="Type User Name" required> </td>
        </tr>

        <tr>
          <td>Password: </td>
          <td> <input type='password' name="password"> </td>
        </tr>

        <tr>
          <td colspan="2" align="middle"> <input type='submit' name="LOGIN" value="LOGIN" required> </td>
        </tr>
      </table>
      <div align="middle"> <span style="color:red; font-weight: bold;"> {{session('_alert')}} </span> </div> <br>
    </form>
  </body>

</html>
