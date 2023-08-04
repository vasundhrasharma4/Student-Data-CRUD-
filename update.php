<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
  <a href="delete.php">Delete the Record</a>
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>

<a href='view.php'>View Updated Record</a>
<p style="color:#FF0000;"></p>
<div>
<form name="form" method="post" action=""> 
<input name="id" type="text" placeholder="Enter the Id:" required/>
<input name="update" type="submit" value="update" />
</form>
</div>
</div>
</body>
</html>

<?php
require_once 'dbconfig.php';

#here user will enter id where they want to change.
if(isset($_POST['update']))
{
    $playerid=$_POST['id'];
    $sqlstmt="select * from players where playerId='$playerid'";
    $resquery=mysqli_query($con,$sqlstmt);
    $row=mysqli_fetch_array($resquery);
    $numberofcustomers=mysqli_num_rows($resquery);
    if($resquery==TRUE && $numberofcustomers==1)
    {
       # fetching all values from input fields and storing it in variables.
    $playername=$row['playerName'];
    $playerage=$row['playerAge'];
    $playergender=$row['gender'];
    $playerinterest=$row['sportsName'];
    $playerlevel=$row['competitionLevel'];
#getting all values from database in the form of input
        echo "<form action='#' method='POST'>";
        echo "Player Id:";
        echo "<input type='text' value='$playerid' readonly name='id'><br>";
        echo "Player Name";
        echo "<input type='text' name='name' value='$playername'><br>";
        echo "Player Age:";
        echo "<input type='text' value='$playerage' name='age'><br><br>";
        echo "Player Gender:";
        echo "<input type='text' value='$playergender' name='gender'><br><br>";
        echo "Player interest of Game:";
        echo "<input type='text' value='$playerinterest' name='interest'><br><br>";
        echo "game level:";
        echo "<input type='text' value='$playerlevel' name='level'><br><br>";
        echo "<input type='submit' value='update' name='update'>";
        echo "</form>";
    }
    else
    {
        echo "User with ".$playerid." does not exist";
    }
    
}

# data user wants to update, hit update button  then this condition will work
if(isset($_POST['update']))
    {
        
        $updatedplayerId=$_POST['id'];
        $updatedplayername=$_POST['name'];
        $updatedplayerage=$_POST['age'];
        $updatedplayergender=$_POST['gender'];
        $updatedplayerinterest=$_POST['interest'];
        $updatedplayerlevel=$_POST['level'];
#update query
        $queryUpdate="Update players set playerName='$updatedplayername',playerAge='$updatedplayerage', gender='$updatedplayergender' ,
                       sportsName='$updatedplayerinterest', competitionLevel='$updatedplayerlevel' where playerId='$updatedplayerId' ";
                                              $resUpdate=mysqli_query($con,$queryUpdate);
          # if everythings work properly it will show record updated.
        if($resUpdate==TRUE)
        {
            echo "Customer record updated";
        }
        else
        {
            echo "Try again later";
        }

    }
    



?>