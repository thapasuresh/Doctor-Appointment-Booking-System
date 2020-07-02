<?php

	require_once("../dbconfig/config.php"); 
	switch ($_GET['request']){
		case "DoctorCategory":
  $doctors = array();
  $count = 0;
				//echo "<select name=\"Surgeons\" id=\"Surgeons\">";
                $query = "SELECT * FROM `doctors` WHERE `Category`=".$_GET['CategoryId'];

                  if ($result = mysqli_query($con, $query)) {

                      /* fetch associative array */
                      while ($row = mysqli_fetch_row($result)) {
                          //printf ("%s (%s)\n", $row[0], $row[1]);
                        //echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
                        $count+=1;
                        array_push($doctors,array($row[0],$row[1]));
                      }
                      array_splice( $doctors, 0, 0, $count );
                      /* free result set */
                      mysqli_free_result($result);
                  }

                  /* close connection */
                  //mysqli_close($result);
                  //echo "</select>";
                  
                  echo json_encode($doctors);

                
		break;

    case "DoctorTime":
    $doctorstime = array();
        $sql = array();
        array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 09:59' && Date>='".$_GET['Datepick']." 09:00'");
        array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 10:59' && Date>='".$_GET['Datepick']." 10:00'");
        array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 11:59' && Date>='".$_GET['Datepick']." 11:00'");
        array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 12:59' && Date>='".$_GET['Datepick']." 12:00'");
        //array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 13:59' && Date>'".$_GET['Datepick']." 13:00'");
        array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 14:59' && Date>='".$_GET['Datepick']." 14:00'");
        array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 15:59' && Date>='".$_GET['Datepick']." 15:00'");
        array_push($sql, "SELECT * FROM `appoinmentsregister` WHERE Date<'".$_GET['Datepick']." 16:59' && Date>='".$_GET['Datepick']." 16:00'");
        for ($cunt=0;$cunt<7;$cunt++){
                  if ($result = mysqli_query($con, $sql[$cunt] )) {
                      $yes = mysqli_num_rows($result)==0?false:true;
                      /* free result set */
                      array_push($doctorstime, $yes);
                      mysqli_free_result($result);
                  }  
        }
  

                  echo json_encode($doctorstime);
    break;  
	}
?>