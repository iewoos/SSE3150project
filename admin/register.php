<?php
require_once "pdo.php";
DATE_DEFAULT_TIMEZONE_SET('AFRICA/DAR_ES_SALAAM');
require("dbconnect.php");
error_reporting(~E_NOTICE);
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['sub']))
{
$name=trim($_POST['name']);
$name=htmlspecialchars($_POST['name']);
$email=trim($_POST['email']);
$email=htmlspecialchars($_POST['email']);

$password=trim($_POST['password']);
$password=htmlspecialchars($_POST['password']);
$user_status='ofline';
$time_joined =date("Y-m-d H:i:s",strtotime("now"));
$date_joined =date("Y-m-d", strtotime("now"));

$encrypt = password_hash($password,PASSWORD_DEFAULT);
$sth=$conn->prepare("INSERT into  users(name,email,password,user_status,time_joined,date_joined)VALUES(?,?,?,?,?,?)");
$sth->bindparam(1,$name,PDO::PARAM_STR);
$sth->bindparam(2,$email,PDO::PARAM_STR);
$sth->bindparam(3,$encrypt,PDO::PARAM_STR);
$sth->bindparam(4,$user_status,PDO::PARAM_STR);
$sth->bindparam(5,$time_joined,PDO::PARAM_STR);
$sth->bindparam(6,$date_joined,PDO::PARAM_STR);
if($sth->execute())
{
$_SESSION['msg']="You are now the member of this Network.....";
header("refresh:1;index.php");
                                }
                     }
          }
		  
$stmt = $pdo->query("SELECT name, email, password, user_id FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);		  
?>
<!DOCTYPE html>

<head>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=shadow-multiple">
<script src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.validate.min.js"></script>
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

body{
    background:#F6F6F6;   
}

#ww{
  position:relative;
  width:1400px;
  max-width:100%;
  height:350px;
  bottom:30px;
}

table, td, th { 
  color:#663399;
  border: 1px solid;
  text-align: left;
  padding: 5px;
}

table {
  width: 60%;
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
<center>
<h1>Admin Page</h1>
<br>
<div class="jumbotron" >
<!----container --->
<div class="container">
<div class="row">
<h3>Add New Admin</h3>
<div class="col-md-18 col-md-push-3">
<div class="panel panel-default">
<div class="panel-body">

<form method="POST" id="register-form">
  <div class="form-group">
<label class="control-label" for="name">FULL NAME</label>
<input class="form-control input-sm" type="text" name="name" />
</div>
<div class="form-group">
<label class="control-label" for="email">E- MAIL ADRESS</label>
<input class="form-control input-sm" type="email" name="email" id="email" />
</div>
<div class="form-group">
<label class="control-label" for="password">PASSWORD</label>
<input class="form-control input-sm" type="password" name="password" />
</div>


<!----submit button---->
<div class="form-group">
<button type="submit"  class="btn btn-default btn-lg" name="sub">
<span class="glyphicon glyphicon-log-in"></span> Save</button>

</div>
</div><!----container--->
</div><!----row--->
</div><!----column--->
</div><!----panel default--->
</div><!----panel body--->

		
       
    <h3>Edit Admin</h3>
    <table>
            <?php
			echo "<tr><th>Admin name</th>";	
			echo "<th>Email</th>";
			echo "<th>Encrypted password</th>";
			echo "<th>Delete</th>";
			echo "<th>Edit</th></tr>";
			
            foreach ( $rows as $row ) {
                echo "<tr><td>";
                echo($row['name']);
                echo("</td><td>");
                echo($row['email']);
                echo("</td><td>");
                echo($row['password']);
                echo("</td><td>");
                echo('<a href="delete.php?user_id='.$row['user_id'].'">Delete</a> ');
                /*echo('<form method="post"><input type="hidden" ');
                echo('name="user_id" value="'.$row['user_id'].'">'."\n");
                echo('<input type="submit" value="Del" name="delete">');
                echo("\n</form>\n");*/
                echo("</td><td>");
                echo('<a href="edit.php?user_id='.$row['user_id'].'">Edit</a> ');
                echo("</td></tr>\n");
            }
            ?>
			
    </table><br>
	<a class="btn btn-primary"  href="view.php">Back</a>
	</center></div>
	</div>
			
			
<script type="text/javascript">
$('document').ready(function()
{
$("#register-form").validate(
{
rules:{
name:{
required:true,
minlength:8
},
email:{
required:true,
email:true
},
url:{
required:true,
url:true
},
password:{
required:true,
minlength:8
},
/*repassword: {
					required: true,
					equalTo: '#password'
				},
				*/
		   },
		   messages:{
		   name:{
		   //required:'<p class="text-primary">'+"ENTER YOUR FULL NAME"+'</p>',
		   required:'<span class="glyphicon glyphicon-user text-primary">'+"ENTER YOUR FULL NAME"+'</span>',
		   minlength:'<span class="glyphicon glyphicon-remove text-danger">'+"ENTER VALID LENGTH OF 8 CHARACTERS"+'</span>',
		   },
		  
		   email:'<span class="glyphicon glyphicon-envelope text-danger">'+"ENTER YOUR EMAIL ADRESS"+'</span>',
		   
		
		  
		  password:{
		   required:'<span class="glyphicon glyphicon-lock text-primary">'+"ENTER YOUR PASSWORD"+'</span>',
		   minlength:'<span class="glyphicon glyphicon-eye-open text-danger">'+"ENTER REQUIRED LENGTH OF 8 CHARACTERS LONG"+'</span>',
		   },
		   /*repassword:{
		   required:'<span class="glyphicon glyphicon-lock text-primary">'+"RE TYPE YOUR PASSWORD"+'</span>',
	equalTo:'<span class="glyphicon glyphicon-ban-circle text-danger">'+"PASSWORD DID NOT MATCH"+'</span>'
	},
	*/
	},
submitHandler:function(form)
{
form.submit()
}
});
});


</script>
</body>
</html>