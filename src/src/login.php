
<!DOCTYPE html>
<html>
<head>
	<title>eForm - Login</title>
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
</nav>
<div align = "center" class="login">
		<form action="" class="form my-2 my-lg-0" method="post">
			<h2><label class="badge badge-secondary">Username</label></h2><br>
			<input class="form-control mr-sm-1" type="text" name="user" placeholder="Register Number" aria-label="Register Number"><br>
			<h2><label class="badge badge-secondary">Password</label></h2><br>
			<input class="form-control mr-sm-1" type="password" name="pass" placeholder="Password" aria-label="Password"><br>
		<input type="submit" class="btn btn-success" value="Login" name="submit"><br/>
		</form>
</div>
<!-- php -->
<?php
if(isset($_POST["submit"])){
    if(!empty($_POST['user']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        //DB Connection
        $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
        //Select DB From database
        $db = mysqli_select_db($conn, 'eform') or die("databse error");
        //Selecting database
        $query1 = mysqli_query($conn, "SELECT * FROM login WHERE uname='".$user."' AND passwd='".$pass."'");
        $numrows = mysqli_num_rows($query1);
        $query2 = mysqli_query($conn, "SELECT * FROM loginstaff WHERE unamestaff='".$user."' AND passwd='".$pass."'");
        $numrows1 = mysqli_num_rows($query2);
        $pswd="password";
        if($numrows !=0 || $numrows1 != 0) {
            while($row = mysqli_fetch_assoc($query1)) {
                $dbusername1=$row['uname'];
                $dbpassword1=$row['passwd'];
            }
            if($user == $dbusername1 && $pass == $dbpassword1) {
                session_start();
                if($pass==$pswd) {
                    $_SESSION['sess_user']=$user;
                    header("Location: changePassword.php");
                } else {
                $_SESSION['sess_user']=$user;
                //Redirect Browser
                header("Location:../src/stdHome.php");
                }
            }
            while($row1 = mysqli_fetch_assoc($query2)) {
                $dbusername2=$row1['unamestaff'];
                $dbpassword2=$row1['passwd'];
            }
            if ($user == $dbusername2 && $pass == $dbpassword2) {
                session_start();
                $_SESSION['sess_user']=$user;
                //Redirect Browser
                header("Location:../src/staffHome.php");
            }
           
        }
        else {
            echo '<center><div class="alert alert-danger login" role="alert">
        Invalid Username or Password!!!
                </div></center>';
        }
    }
    else {
        echo '<center><div class="alert alert-danger login" role="alert">
        Required all fields!!!
                </div></center>';
    }
}

?>

</body>
</html>