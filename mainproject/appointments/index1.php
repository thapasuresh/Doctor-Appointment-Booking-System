<?php
    require_once("../dbconfig/config.php");    
    session_start();

if(isset($_GET['book'])){
        $Userid=$_SESSION['Userid'];   //userid    
        $doctorsid=$_GET['Surgeons'];  //doctor's id
        $date=$newformat = date('Y-m-d',strtotime($_GET['timePick']));
        $time = $_GET['timePick'];




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
          $query = "INSERT INTO `appoinmentsregister` (`UserId`,`DoctorId`,`Date`) VALUES (".$Userid.", ".$doctorsid.", DATE_FORMAT(concat(\"".$date."\",\" \",\"".$time."\"),'%Y/%m/%d %T'));";
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
      <style>
       input[type=text]{
       width:100%;
       padding: 5px;
       font-size: 17px;
     }
      </style> 


      <meta chatset="utf-8">
      <title>Apointment Page</title>
      <link rel="stylesheet" href="style5.css">
    </head>
<body>
  <div class="title">
      <h1>Appoint the Doctor</h1>
    </div>
      
      <div class="container">
        <div class="left"></div>
        <div class="right">
          
            <form action="index1.php" method="GET">
                          <nav  class="navbar">  
                              
                                 <div class="navbar-header" align="center">
                                     Submit day and time of visit
                                     (Refer to Booking Table Below)
                                 </div>
            
                              
                          </nav>

               <div class="row-md-4">
                        <div class="imgBgMethod" >
           <label>Choose catagory</label><br>
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
           <label>Choose Surgeon</label><br>
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




         <label class="part1">Select Apointment Date:</label><br>
           <input type="date" id="datepick" name="datePick"><br>

           <label>Choose apointment Time:</label><br>
         <input type="text"  id="timepick" name="timePick"><br>
         <label></label>
         <div>
            <input type="button" id="time" value="9:00-10:00am" class="dtime" name="dotortime" data-index="0">
            <input type="button" id="time" value="10:00-11:00" class="dtime" name="dotortime" data-index="1">
            <input type="button" id="time" value="11:00-12:00" class="dtime" name="dotortime" data-index="2">
            <input type="button" id="time" value="12:00-1:00" class="dtime" name="dotortime" data-index="3">
            <input type="button" id="time" value="2:00-3:00" class="dtime" name="dotortime" data-index="4">
            <input type="button" id="time" value="3:00-4:00" class="dtime" name="dotortime" data-index="5">
           <!-- <input type="button" id="time" value="4:00-5:00" class="dtime" name="dotortime" data-index="6"> -->
         </div><br>
         </div>
       

 




           <label></label><br>
            <input placeholder="Write message(optional)" class="heighttext" id="times"><br>
             
         
            
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
      document.getElementById("timepick").value = parseInt(times[event.target.getAttribute("data-index")])+":00";
      //new Date(1900+data.getYear(), 1+data.getMonth(), data.getDate(), parseInt(times[event.target.getAttribute("data-index")]), 00, 00, 00);
  });
}

</script>     



         



           <label></label><br>
         
     <input type="submit" name="book" id="button" value="Submit" class="button">
   


            </form>
         

        </div>
      
    </div>


</body>


</html>




