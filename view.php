<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Home</a> 
| <a href="insert.php">Insert New Record</a>
  <a href="update.php">Update the Record</a> 
  <a href="delete.php">Delete the Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Records</h2>

</div>
</body>
</html>

<?php
#connection with database
require_once 'dbconfig.php';
#sql qyery
$sqlSelect ="Select * from players";

#exceute query or result
$resultSelect= mysqli_query($con,$sqlSelect);

#representing result on browser

echo "<table border='1' border-collapse='collapse'>";

echo  "<tr><th>Player Id</th> <th>Player Name</th> <th>Player Age</th> <th>Gender </th><th>Sports</th><th>competition Level</th></tr>";


$PlayerDetail=mysqli_num_rows($resultSelect);
#row is fetching data from database.
while($row=mysqli_fetch_array($resultSelect))
{
#fetching data 
  $playerid=$row['playerId'];
  $playername=$row['playerName'];
  $playerage=$row['playerAge'];
  $playergender=$row['gender'];
  $playerinterest=$row['sportsName'];
  $playerlevel=$row['competitionLevel'];
#presenting data in table on server.
    echo  "<tr><th>$playerid</th> <th>$playername</th> <th>$playerage</th><th>$playergender</th><th>$playerinterest</th><th>$playerlevel</th></tr>";
}
echo "</table>";

echo "<br>";
echo "total no of players are: ".$PlayerDetail;








?>