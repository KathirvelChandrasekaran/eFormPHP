<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("Location: login.php");
}
else
{
    $conn = mysqli_connect("localhost", "root", "", "eform") or die(mysqli_errno());
    $db = mysqli_select_db($conn, 'eform') or die("databse error");
    $user=$_SESSION["sess_user"];
    if(!$conn)
        echo 'not connected';
        ?>
<!DOCTYPE html>
<html>
<head>
	<title>eForm - User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  	<a class="navbar-brand" href="../src/index.php">
    <img src="./images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
	<label class="logo">PSG College Of Technology</label>
	</a>
	<h2>Welcome <span class="badge badge-success"><?php echo $user?></span></h2>
	<a class="btn btn-outline-success my-2 my-sm-0" href="../src/logout.php">Logout</a>
</nav>

<div align = "center" class="login">
		<form action="" class="form my-2 my-lg-0" method="post">
			<h2><label class="badge badge-secondary">New Password</label></h2><br>
			<input class="form-control mr-sm-1" type="password" name="pass" placeholder="Password" aria-label="Password"><br>
		<input type="submit" class="btn btn-success" value="Login" name="submit"><br/>
		</form>
</div>
</body>
</html>
<?php

if(isset($_POST["submit"])){
    $password=$_POST['pass'];
    $sql="update login set passwd = '$password' where uname= '$user'";
    if(mysqli_query($conn, $sql)) {
        header("Location:../src/stdHome.php");
    }
}
}
?>