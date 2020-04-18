<?php
ob_start();
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("Location: login.php");
} else {
    $conn = mysqli_connect("localhost", "root", "", "eform") or die(mysqli_errno());
    $db = mysqli_select_db($conn, 'eform') or die("databse error");
    $user = $_SESSION["sess_user"];
    if (!$conn)
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
            <link rel="stylesheet" href="./css/sucess.css">
            <link rel="stylesheet" href="./css/stdHome.css">

        </head>
        <body>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="./index.php">
                    <img src="./images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
                    <label class="logo">PSG College Of Technology</label>
                </a>
                <h2>Welcome <span class="badge badge-success"><?php echo $user ?></span></h2>
                <a class="btn btn-outline-success my-2 my-sm-0" href="./home.php">Home</a>
                <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php">Logout</a>
            </nav>
            <?php
            $sql = "SELECT * FROM std_academic_hsc where  reg='$user'";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="alert alert-success" role="alert">
                                <h1>Details has already entered!!!</h1>
                              </div>';
                    }
                } else {
                    echo '<div class="container">
        <form method="POST" action="">
            <h1>Schooling</h1>
            <span>SSLC</span><br>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="religion">Medium</label>
                    <input type="text" class="form-control" name="sslcmed" id="sslcmed">
                </div>
                <div class="form-group col-md-2">
                    <label for="religion">Year of Passing</label>
                    <input type="text" class="form-control" name="sslcyop" id="sslcyop">
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">School</label>
                    <input type="text" class="form-control" name="schoolsslc" id="schoolsslc">
                </div>
                <div class="form-group col-md-2">
                    <label for="religion">Percentage</label>
                    <input type="text" class="form-control" name="percentsslc" id="percentsslc">
                </div>
            </div>
            <span>HSC</span><br>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="religion">Medium</label>
                    <input type="text" class="form-control" name="hscmed" id="sslcmed">
                </div>
                <div class="form-group col-md-2">
                    <label for="religion">Year of Passing</label>
                    <input type="text" class="form-control" name="hscyop" id="sslcyop">
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">School</label>
                    <input type="text" class="form-control" name="schoolhsc" id="schoolsslc">
                </div>
                <div class="form-group col-md-2">
                    <label for="religion">Percentage</label>
                    <input type="text" class="form-control" name="percenthsc" id="percentsslc">
                </div>
            </div>
            <span>B.Sc / B.E</span><br>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="religion">Medium</label>
                    <input type="text" class="form-control" name="ugmed" id="sslcmed">
                </div>
                <div class="form-group col-md-2">
                    <label for="religion">Year of Passing</label>
                    <input type="text" class="form-control" name="ugyop" id="sslcyop">
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">College</label>
                    <input type="text" class="form-control" name="schoolug" id="schoolsslc">
                </div>
                <div class="form-group col-md-2">
                    <label for="religion">Percentage</label>
                    <input type="text" class="form-control" name="percentug" id="percentsslc">
                </div>
            </div>
            <div class = "form-action">
            <button type="reset" class="btn btn-danger btn-sm" id="btn">Reset</button>
    	<input type="submit" class="btn btn-success btn-sm" id="upload" name="upload" value="Submit">
                </div>
        </form>
    </div>';
                }
            }
            ?>

            <?php
            if (isset($_POST["upload"])) {
                $sslcmed = $_POST["sslcmed"];
                $sslcyop = $_POST["sslcyop"];
                $schoolsslc = $_POST["schoolsslc"];
                $percentsslc = $_POST["percentsslc"];

                $hscmed = $_POST["hscmed"];
                $hscyop = $_POST["hscyop"];
                $schoolhsc = $_POST["schoolhsc"];
                $percenthsc = $_POST["percenthsc"];

                $ugmed = $_POST["ugmed"];
                $ugyop = $_POST["ugyop"];
                $schoolug = $_POST["schoolug"];
                $percentug = $_POST["percentug"];

                mysqli_query($conn, "insert into std_academic_sslc (reg,medium,yop,school,percentage) values ('$user','$sslcmed','$sslcyop','$schoolsslc','$percentsslc')");
                mysqli_query($conn, "insert into std_academic_hsc (reg,medium,yop,school,percentage) values ('$user','$hscmed','$hscyop','$schoolhsc','$percenthsc')");
                mysqli_query($conn, "insert into std_academic_ug (reg,medium,yop,school,percentage) values ('$user','$ugmed','$ugyop','$schoolug','$percentug')");
                header("location: ./success.php", true, 301);  
            }
            ?>


            <?php
            exit();
        }
        ?>
    </body>
</html>