<?php
  session_start();
  require_once('dbconfig/config.php');
  //phpinfo();
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="Main.css"/>
 <script src="jquerry-1.10.2.min.js"></script>
<script src="JQUERRY%20Main.js"></script>
</head>
<body bgcolor=" #0005fa">
<div  id ="main">
<form action="main.php" method="post">
<table border="0" cellspacing="10">
   <tr>
     <td>
          <div id="title"> SIGN IN </div> 
          <hr size="1px" width="100px" color="black"/>
      </td>
    </tr>

    <tr>
      <td>
      <input type ="text" name="username" placeholder="USER_ID" required>
      </td>
    </tr>  

    <tr>
      <td>
      <input type ="password" name="password" placeholder="PASSWORD" required>
      </td>
    </tr>  


    <tr>
       <td align="right">
         <div id="frt">FORGOT PASSWORD </div> 
      </td>
    </tr>

    <tr>
        <td align="center">
          <button value="SIGN IN" id="SIGNINBUTTON" name="login" type="submit">Login</button>
        </td>
    </tr>

    <tr>
       <td align="center">
       <div id="signUpMsg"><a href="../signup/signup.php" id="flipToSignUP">DONT HAVE AN ACCOUNT YET</a> </div>


       </td>
    </tr>
</table>





    </form>
</div>
</body>
</html>

<?php
      if(isset($_POST['login']))
      {
        @$username=$_POST['username'];
        @$password=$_POST['password'];
        $query = "select * from users where username='$username' and password='$password' ";
        //echo $query;
        $query_run = mysqli_query($con,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
        {
          if(mysqli_num_rows($query_run)>0)
          {
          $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
          $Userid = $row['Userid'];
          $_SESSION['username'] = $username;

          $_SESSION['Userid']=$Userid;
          
          header( "Location:profile.php");
          }
          else
          {
            echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
          }
        }
        else
        {
          echo '<script type="text/javascript">alert("Database Error")</script>';
        }
      }
      else
      {
      }
    ?>
    













