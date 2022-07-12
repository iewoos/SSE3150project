<?php
session_start();
require_once "pdo.php";

if ( isset($_POST['topic']) && isset($_POST['date'])
      && isset($_POST['time']) && isset($_POST['venue']) && addslashes(file_get_contents ($_FILES['image']['tmp_name']))) {
    $sql = "INSERT INTO seminar (topic, date, time, venue, image)
               VALUES (:topic, :date, :time, :venue, :image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':topic' => $_POST['topic'],
        ':date' => $_POST['date'],
        ':time' => $_POST['time'],
        ':venue' => $_POST['venue'],
        ':image' => file_get_contents ($_FILES['image']['tmp_name'])));
}

$stmt = $pdo->query("SELECT * FROM seminar");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title>Seminar Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=shadow-multiple">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
h1{
  font-family: Lobster, sans-serif;
  font-size: 45px;
  color:#4682B4;
}
</style>
<body>
 <br>
    <center><h1>Register New Seminar</h1></center>
    <center><div class="jumbotron">

        
        <div class="container">
        <table border="1">
            <?php
            foreach ( $rows as $row ) {
                echo "<tr><td>";
                echo($row['topic']);
                echo("</td><td>");
                echo($row['date']);
                echo("</td><td>");
                echo($row['time']);
                echo("</td><td>");
                echo($row['venue']);
                echo("</td><td>");
                echo '<img src="data:image/png;base64,'.base64_encode($row['image']).'" alt="Image" style="width:200px; height:150px;" />';
                echo("</td></tr>\n");
            }
            ?>
            </table><br>
            
            <form method="post" action="" enctype='multipart/form-data'>
            <p>Topic:<input type="text" name="topic" required></p>
            <p>Date:<input type="text" name="date" required></p>
            <p>Time:<input type="text" name="time" required></p>
            <p>Venue:<input type="text" name="venue" required></p>
            <p>Image:<input type="file" name="image" required></p>
            <p><input type="submit" value="Register" name="register"/></p>
			<a class="btn btn-primary"  href="view.php"   >Back</a>
			
            </form>
        </div>
    </div>
	</center>
    </div>       
	


</body>

</html>