<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Assets</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" href="css/style.css" />
    </head>

    <body>
	<nav class="navbar navbar-expand-md">
	<a class="navbar-brand" href="index.php">Assets</a>
	<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle"id="dropdownId" href="" data-toggle="dropdown" aria-haspopup="true"
			aria-expanded="false" >Insurance Types</a>
            
			<div class="dropdown-menu" aria-labelledby="dropdownId">
			<a class="dropdown-item btn-success" href="medical.html" >Medical Insurance</a>
			<a class="dropdown-item btn-success" href="life.html" >Life Insurance</a>
			</div>
			</li>			
			
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="admin/index.php">Login</a>
            </li>
        </ul>
    </div>
	</nav>
	
	<header class="page-header header container-fluid">
	<div class="overlay"></div>

    <div class="description">
        <h1>Welcome to Assests!</h1>
		<p>A reliable contribution to your peace of mind.</p>        
    </header>
	
<section>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<center><h4><b>
				Upload your policy and mobile number, our agents will contact you soon.
			</b></h4></center>
			<?php

			require_once "pdo.php";
			$stmt = $pdo->query("SELECT * FROM seminar");
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			?>
			
			<center>
			<h4 style="color:mediumseagreen;">List of Seminar</h4>
			<div style="color:black;padding:20px;">
				<table border="1">
					<thead>
					<tr>
						<th>TOPIC</th>
						<th>DATE</th>
						<th>TIME</th>
						<th>VENUE</th>
						<th>BANNER IMAGE</th>
					</tr> 
					</thead>
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
						echo("</td><td>");
						}
					?>
					
				</table>
				</div></center>

			<br/>
			
			<hr style="width: 70%;" />
				<form action="insert.php" method="post">
					<div class="form-group">
						
							
							<div class="form-group">
								<label for="inputName">Your name:</label>
								<input
									type="text"
									class="form-control"
									name="name"
									id="inputName" required
									/>
								<small id="NameHelp" class="form-text text-muted">We do not share your name and data..</small>
							</div>

							<div class="form-group">
								<label for="inputMobile">Your Mobile Number:</label>
								<input
									type="tel"
									class="form-control"
									name="mobile"
									id="inputMobile" required
									pattern="[0-9]{3}-[0-9]{7}"
									/>
									<small id="MobileHelp" class="form-text text-muted">Format: 010-1234567</small>
							</div>

							<div class="form-group">
								<label for="inputEmail">Your E-mail:</label>
								<input
									type="email"
									class="form-control"
									name="email"
									id="inputEmail" required
									/>
							</div>
							
							<div class="form-group">
								<label for="inputOccupation">Your Occupation:</label>
								<input
									type="text"
									class="form-control"
									name="occupation"
									id="inputOccupation" required
									/>
							</div>
							
							<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
								<div id="drag_upload_file">
									<p>Drop file(s) here</p>
									<p>or</p>
									<p><input type="button" value="Select File(s)" onclick="file_explorer();" /></p>
									<input type="file" id="selectfile" multiple />
								</div>
							</div><br>

							<p><u><a href="term.html" target="_blank">Terms and conditions:</a></u></p>
							<div class="form-group form-check">
								<input
									type="checkbox"
									class="form-check-input"
									id="PrivatCheck" required/>
								<label class="form-check-label" for="PrivatCheck">I have read and agree with the terms and conditions.</label>
							</div>

							<h5>“Join our FREE seminar and let the experts tell you the truth about your insurance policy “</h5>
							<input style="background-color:#418898; border: none; color: white; padding: 10px 25px;"
									class="button" type="submit" name="submit" value="Submit">
					</div>

 
		
				</form>
		</div>					
	</div>
</section>


<footer style="background-color:lightgray;">
	<div class="social text-center py-2">
		<a href="https://www.facebook.com/"><img src="img/facebook.png" alt="Facebook" width="30" /></a>
		|
		<a href="https://www.instagram.com/"><img src="img/instagram.png" alt="Instagram" width="30" /></a>
	</div>
	<div class="footer-copyright text-center py-3"> © 2022 Copyright and created by Jia Hee & Soo Wei</div>
</footer>

    
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
	<script src="js/custom.js"></script>
	
</body>   
</html>
