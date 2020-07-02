<?php

	require_once("../dbconfig/config.php"); 
	switch ($_GET['request']){
		case "DoctorCategory":
				echo "<select name=\"Surgeons\">";
                $query = "SELECT * FROM `doctors` WHERE `Category`=".$_GET['CategoryId'];

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
                  echo "</select>";

                
		break;
	}
?>