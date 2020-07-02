<?php
 
include 'connection.php';
 error_reporting(0);
  $name = $_POST['Name'];
  $Category = $_POST['Category'];
  
if(!$_POST['submit']){
	
  echo "";
  
}

else {
 
$sql = "INSERT INTO doctors (Name,Category)
VALUES ('$name', '$Category')";

if (mysqli_query($conn, $sql)) {
    echo "<h1><center>New record created successfully</center></h1>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>

<html>
<head>
	<style>
input[type=text] {
    width: 50%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
     }


  input[type=number] {
    width: 50%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
     }   
.add{
	text-align: center;

}
.heading{
          text-align: center;
        }
.main{
		text-align: center;
     }
</style>

</style>
<title>Add Doctor</title>
</head>

<body bgcolor="#D0D0D0">
   <div class="main">
	<div class="heading"><h2>Add Doctors from this menu</h2></div>
		<form action="refer.php" method="POST">
			Name:<br> <input type="text" name="Name" value="" required><br><br>
			Category:<br> <input type="number" name="Category" value="" required><br><br>
			<div class="add"><input type="submit" name="submit" value="add"/></div></center>
			<a href="refer.php">Back</a>
  </div>			
</body>
</html>