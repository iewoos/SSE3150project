<?php
session_start();
require_once "pdo.php";

$stmt = $pdo->query("select participants.name,participants.mobile_number, agents.name, agents.email, agents.status, agents.remark 
from participants join agents on participants.participants_id=agents.participants_id; ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt1 = $pdo->query("SELECT seminar.topic,seminar.date,participants.email,participants.status,participants.remark 
from seminar join participants on participants.seminar_id=seminar.seminar_id;");
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query("SELECT * FROM participants");
$rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Details Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=shadow-multiple">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
h1,h3 {
  font-family: Lobster, sans-serif;
	}
h1{
  font-size: 45px;
  color:#4682B4;
}
h3{
  font-size: 30px;
  color:#191870;	
}


table, td, th {
  border: 1px solid;
  text-align: left;
  padding: 5px;
}

table {
  width: 80%;
  border-collapse: collapse;
}
th {
  font-size:15px;
  background-color: #20B2AA;
  color:white;
}
</style>
</head>

<body>
<center><h1>Details</h1>
<div class="jumbotron">
<div class="container">
<h3>Table of Contacts</h3>

            <table>
			
            <?php
			echo "<tr><th>Partcipants name</th>";
			echo "<th>Partcipants mobile number</th>";
			echo "<th>Agents name</th>";
			echo "<th>Agents email</th>";
			echo "<th>Status</th>";
			echo "<th>Remark</th></tr>";
				
            foreach ( $rows as $row ) {
				
				
                echo "<tr><td>";
				echo($row['name']);
				echo("</td><td>");
                echo($row['mobile_number']);
                echo("</td><td>");
				echo($row['name']);
                echo("</td><td>");
                echo($row['email']);
                echo("</td><td>");
                echo($row['status']);
                echo("</td><td>");
                echo($row['remark']);
                echo("</td></tr>\n");
            }
            ?>
			
            </table><br>
			
		<br><h3>Table of Seminar</h3>	
		<table>		
            <?php
			echo "<tr><th>Seminar topic</th>";
			echo "<th>Seminar date</th>";
			echo "<th>Participants email</th>";
			echo "<th>Status</th>";
			echo "<th>Remark</th></tr>";
				
            foreach ( $rows1 as $row ) {
				
				
                echo "<tr><td>";
				echo($row['topic']);
				echo("</td><td>");
                echo($row['date']);
                echo("</td><td>");
				echo($row['email']);
                echo("</td><td>");
                echo($row['status']);
                echo("</td><td>");
                echo($row['remark']);
                echo("</td></tr>\n");
            }
            ?>	
						
            </table><br>
			
			<h3>Table of Participants</h3>
			 <table>			
            <?php
			echo "<tr><th>Partcipants name</th>";
			echo "<th>Mobile number</th>";
			echo "<th>Email</th>";
			echo "<th>Occupation</th>";
			
            foreach ( $rows2 as $row ) {
                echo "<tr><td>";
                echo($row['name']);
                echo("</td><td>");
                echo($row['mobile_number']);
                echo("</td><td>");
                echo($row['email']);
                echo("</td><td>");
                echo($row['occupation']);
                echo("</td></tr>\n");
            }
            ?>
            </table><br>
			<a class="btn btn-primary"  href="view.php">Back</a>			
			</center></div>
			</div>
			
</body>
</html>