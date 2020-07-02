<?php
    require_once("../dbconfig/config.php");    
    session_start();

if(isset($_GET['book'])){
        $Userid=$_SESSION['Userid'];   //userid    
        $doctorsid=$_GET['Surgeons'];  //doctor's id
        $date=$newformat = date('Y-m-d',strtotime($_GET['timePick']));


/*
$query = "select * from appointmentsregister  where  Date='$date'";
$query_run = mysqli_query($con,$query);

if($query_run) 
   {
      if(mysqli_num_rows($query_run)>0)
            {
              echo '<script type="text/javascript">alert("Another user has alredy booked at this time...please try another time")</script>';
            }
               else
               {
                  $query = "insert into appointmentsregister  values('$Userid','$doctorsid','$date')";
                  $query_run = mysqli_query($con,$query);


                            if($query_run)
                        {
                          echo '<script type="text/javascript">alert(" You have appointed the doctor..")</script>';
                          header( "Location: ../mainproject/login/profile.php");
                        }
                        else
                            {
                                 echo '<script type="text/javascript">alert(" You got an error")</script>';
                            }




               }
 
       }*/
                         $query = "INSERT INTO `appoinmentsregister`(`UserId`, `DoctorId`, `Date`) VALUES ('$Userid','$doctorsid','$date');";
                  $query_run = mysqli_query($con,$query);


                            if($query_run)
                        {
                          echo '<script type="text/javascript">alert(" You have appointed the doctor..")</script>';
                          //header( "Location: ../mainproject/login/profile.php");
                        }
                        else
                            {
                                 echo '<script type="text/javascript">alert(" You got an error")</script>';
                            }
       exit;
  }
                     
                     
?>
<!doctype html>
<html>
    <head>
       <title>Register To  Appoint A Doctor</title>
  <!-- Meta tag Keywords -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta charset="UTF-8" />
          <meta name="keywords" content="Register To Book A Doctor,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
          />
          <script>
            addEventListener("load", function () {
              setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
              window.scrollTo(0, 1);
            }
          </script>
          <!-- Meta tag Keywords -->
          <!-- css files -->
          <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
          <!-- Style-CSS -->
          <link rel="stylesheet" href="css/font-awesome.css">
          <!-- Font-Awesome-Icons-CSS -->
          <!-- //css files -->
          <!-- web-fonts -->
          <link href="//fonts.googleapis.com/css?family=Bellefair&amp;subset=hebrew,latin-ext" rel="stylesheet">
          <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
          <!-- //web-fonts -->

    </head>
    
<body>

  <h1>
    <span>R</span>egister
    <span>T</span>o
    <span>B</span>ook
    <span>Y</span>our
    <span>A</span>ppointment
  </h1>




<div class="main-content-agile">
    <div class="sub-main-w3">
      <form action="#" method="get">
        <div class="form-style-agile">
          <label>Choose Visit Catagory</label>
          <div class="pom-agile">
            <span class="fa fa-user-o" aria-hidden="true"></span>
                         <select name="catagory" id="Category">

                            <?php

                            $query = "SELECT `ID`, `Category` FROM `doctorcategory`;";

                              if ($result = mysqli_query($con, $query)) {

                                  /* fetch associative array */
                                  while ($row = mysqli_fetch_row($result)) {
                                      //printf ("%s (%s)\n", $row[0], $row[1]);
                                    echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
                                  }

                                  /* free result set */
                                  mysqli_free_result($result);
                              }

                              /* close connection */
                              mysqli_close($link);


                              
                            ?>
                         </select>
            /* <input placeholder="User Name" name="username" type="text" required="">  
          </div>
        </div>

        <div class="form-style-agile">
          <label>Email</label>
          <div class="pom-agile">
            <span class="fa fa-envelope" aria-hidden="true"></span>
            <input placeholder="Email" name="email" type="email" required="">
          </div>
        </div>

        <div class="form-style-agile">
          <label>Password</label>
          <div class="pom-agile">
            <span class="fa fa-key" aria-hidden="true"></span>
            <input placeholder="Password" name="password" type="password" id="password1" required="">
          </div>
        </div>
        <div class="form-style-agile">
          <label>Confirm Password</label>
          <div class="pom-agile">
            <span class="fa fa-key" aria-hidden="true"></span>
            <input placeholder="Confirm Password" name="cpassword" type="password" id="password2" required="">
          </div>
        </div>
        <input type="submit" name="register" value="Register">
        
        <a href= "../login/main.php" >Already have account</a>
        
      </form>
    </div>
  </div>

























      
      <div class="container">
        <div class="left"></div>
        <div class="right">
          
            <form method="GET">
                          <nav  class="navbar">  
                              
                                 <div class="navbar-header" align="center">
                                     Submit day and time of visit
                                     (Refer to Booking Table Below)
                                 </div>
            
                              
                          </nav>

               <div class="row-md-4">
                        <div class="imgBgMethod" >
           <label>choose visit catagory</label><br>
             <select name="catagory" id="Category">

                <?php

                $query = "SELECT `ID`, `Category` FROM `doctorcategory`;";

                  if ($result = mysqli_query($con, $query)) {

                      /* fetch associative array */
                      while ($row = mysqli_fetch_row($result)) {
                          //printf ("%s (%s)\n", $row[0], $row[1]);
                        echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
                      }

                      /* free result set */
                      mysqli_free_result($result);
                  }

                  /* close connection */
                  mysqli_close($link);


                  
                ?>
             </select>
         </div>
<br>
         <div class="imgBgMethod">
           <label>choose Surgeon</label><br>
           <div  id="DoctorsDiv"></div>
             <!--<select name="Surgeons" id="Doctors">
             <option value="General consultant">Dr.Bikash(MBBS)</option>
             <option value="Dermatology">Dr.Suresh(Md)</option>
             <option value="Heart Specialist">Dr.Roshan</option>
             <option value="psycology">Dr.Sachin</option>
             </select>-->
<select name="Surgeons" id="Surgeons">

</select>
            </div><br>




         <label class="part1">Choose apointment Date:</label><br>
           <input type="date" id="datepick" name="datePick"><br>

           <label>Choose apointment Time:</label><br>
         <input type="text"  id="timepick" name="timePick"><br>
         <div>
            <input type="button" value="9:00am-10:00a" class="dtime" name="dotortime" data-index="0">
            <input type="button" value="10:00-11:00" class="dtime" name="dotortime" data-index="1">
            <input type="button" value="11:00-12:00" class="dtime" name="dotortime" data-index="2">
            <input type="button" value="12:00-1:00" class="dtime" name="dotortime" data-index="3">
            <input type="button" value="2:00-3:00" class="dtime" name="dotortime" data-index="4">
            <input type="button" value="3:00-4:00" class="dtime" name="dotortime" data-index="5">
            <input type="button" value="4:00-5:00" class="dtime" name="dotortime" data-index="6">
         </div><br>
         </div>
       






            Write message(optional)<br>
            <textarea name="message" rows="5" column="30">
              Write your message
            </textarea>
           
<script type="text/javascript">
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
         doctorsinoption(response);
        }
      };
      xhttp.open("GET", "dataservi.php/?request=DoctorCategory&CategoryId="+document.getElementById("Category").value, true);
      xhttp.send();
document.getElementById("Category").addEventListener("change", function(){

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         var response = this.responseText;
          doctorsinoption(response);
        }
      };
      xhttp.open("GET", "dataservi.php/?request=DoctorCategory&CategoryId="+document.getElementById("Category").value, true);
      xhttp.send();
});

function doctorsinoption(responsetext){
  var obj = JSON.parse(responsetext);
  var s = document.getElementById("Surgeons");
  s.innerHTML="";
  //alert("count is "+obj[0]);
  for (var count=1; count<=obj[0]; count++){
     var op = document.createElement("option")
     op.value = obj[count][0];
     op.text = obj[count][1];
      
     //optionnode = document.createTextNode("<option value="+obj[count][0]+">"+obj[count][1]+"</option>");
     s.appendChild(op); 
     //alert(optionnode);    
  }

}



document.getElementById("datepick").addEventListener("change", function(){

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         var response = this.responseText;
         alert(response);
          timemgmt(response);
          //doctorsinoption(response);
        }
      };
      xhttp.open("GET", "dataservi.php/?request=DoctorTime&DoctorId="+document.getElementById("Surgeons").value+"&Datepick="+document.getElementById("datepick").value, true);
      xhttp.send();
});

function timemgmt(resp){
    var obj = JSON.parse(resp);
    for (var i=0;i<7;i++){
      document.getElementsByName("dotortime")[i].disabled=obj[i];
      if (obj[i]){
        document.getElementsByName("dotortime")[i].style="border-color:#ff0000;";
      }else{
        document.getElementsByName("dotortime")[i].style=" ";
      }
    }
}
var times = [9,10,11,12,2,3,4];

for (var cnt = 0; cnt <7; cnt++){
  document.getElementsByName("dotortime")[cnt].addEventListener("click", function(event){
      var data = new Date(document.getElementById("datepick").value);
      document.getElementById("timepick").value = new Date(1900+data.getYear(), 1+data.getMonth(), data.getDate(), parseInt(times[event.target.getAttribute("data-index")]), 00, 00, 00);
  });
}

</script>     



         




         <div class="button">
     <input type="submit" name="book"  value="Submit">
   </div>


            </form>
         

        </div>
      
    </div>


</body>


</html>




