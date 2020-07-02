<?php
    require_once("../dbconfig/config.php");    
?>
<!doctype html>
<html>
    <head>
      <style>
       input[type=text]{
       width:100%;
       padding: 5px;
       font-size: 17px;
      </style> 
}


      <meta chatset="utf-8">
      <title>Apointment Page</title>
      <link rel="stylesheet" href="style1.css">
    </head>
<body>
  <div class="title">
      <h1>Appoint the Doctor</h1>
    </div>
      
      <div class="container">
        <div class="left"></div>
        <div class="right">
          
            <form method="post">
                          <nav  class="navbar">  
                              
                                 <div class="navbar-header" align="center">
                                     Submit day and time of visit
                                     (Refer to Booking Table Below)
                                 </div>
            
                              
                          </nav>

               <div class="row-md-4">
         <label class="part1" name="date">Choose apointment Date:</label><br>
           <input type="date"><br>

           <label name="time">Choose apointment Time:</label><br>
         <input type="time"><br>
         </div>
       


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

<script type="text/javascript">
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("DoctorsDiv").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "dataservi.php/?request=DoctorCategory&CategoryId="+document.getElementById("Category").value, true);
      xhttp.send();
document.getElementById("Category").addEventListener("change", function(){

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("DoctorsDiv").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "dataservi.php/?request=DoctorCategory&CategoryId="+document.getElementById("Category").value, true);
      xhttp.send();
});
</script>


<br>
         <div class="imgBgMethod">
           <label name="Surgeon">choose Surgeon</label><br>
           <div  id="DoctorsDiv"></div>
             <!--<select name="Surgeons" id="Doctors">
             <option value="General consultant">Dr.Bikash(MBBS)</option>
             <option value="Dermatology">Dr.Suresh(Md)</option>
             <option value="Heart Specialist">Dr.Roshan</option>
             <option value="psycology">Dr.Sachin</option>
             </select>-->

            </div><br>



            Write message(optional)<br>
            <textarea name="message" rows="5" column="30">
              Write your message
            </textarea>
           
     



                       
              <div class="button">
                   <button type="submit" form="nameform" name="submit" value="Submit">BOOK</button>
             </div>

            </form>
         

        </div>
      
    </div>


    <?php
      if(isset($_POST['submit']))
      { 
        @$date = $_POST('date');
        @$time=$_POST['time'];
        
        
        
        {
          
          //echo $query;
        $query_run = mysqli_query($con,$query);
        //echo mysql_num_rows($query_run); 
        if($query_run)
          {
            
            
            {
              $query = "insert into appoinmentsregister values('$date','$time')";
              $query_run = mysqli_query($con,$query);
              if($query_run)
              {
                echo '<script type="text/javascript">alert("Doctor apointed....  Note down your appointment date and time")</script>';
               
                header( "Location: ../login/profile.php");
              }
              else
              {
                echo '<p class="bg-danger msg-block"> Unsuccessful due to server error. Please try later</p>';
              }
            }
          }
          else
          {
            echo '<script type="text/javascript">alert("DB error")</script>';
          }
        }
        
        
      }
      else
      {
      }
    ?>





    

</body>


</html>