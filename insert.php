<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
   <a href="dashboard.php">Dashboard</a> 
|  <a href="insert.php">Insert New Record</a>
|  <a href="view.php">View Records</a>
|  <a href="update.php">Update Records</a>
|  <a href="delete.php">Delete Records</a>
|  <a href="logout.php">Logout</a>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="age" placeholder="Enter Age" required /></p>
<p><input type="text" name="gender" placeholder="Enter Gender" required /></p>
<p><input type="text" name="interest" placeholder="Enter Sports Interested" required /></p>
<p><input type="text" name="level" placeholder="Enter Competition Level" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"></p>
</div>
</div>
</body>
</html>

<?php

#connecting database to php
require_once 'dbconfig.php';

# condition only applies when user click on submit button.

if(isset($_POST['submit']))
{

   # fetching all values from input fields and storing it in variables.
    $playername=$_POST['name'];
    $playerage=$_POST['age'];
    $playergender=$_POST['gender'];
    $playerinterest=$_POST['interest'];
    $playerlevel=$_POST['level'];
                        #(tablecolumn name1, tabecolumn name2.... so on)

                        # querey to insert values in table in phpadmin.
    $sqlInsert="insert into players(playerName,playerAge,gender,sportsName,CompetitionLevel) values('$playername', '$playerage','$playergender','$playerinterest','$playerlevel')";

    # calling connection and query
    $res=mysqli_query($con,$sqlInsert);
    # if everythings work properly it will show record saved.

if($res)
{
    echo "record saved";
}
else
{
    echo "no authorization";
}

}

?>