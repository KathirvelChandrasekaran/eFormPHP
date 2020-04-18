<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("Location: login.php");
} else {
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

            <script>
            </script>  
        </head>
        <body>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="./index.php">
                    <img src="./images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
                    <label class="logo">PSG College Of Technology</label>
                </a>
                <a class="btn btn-outline-success my-2 my-sm-0" href="./logout.php">Logout</a>
            </nav>
            <div class="container personalDetails">
                <h1>Enter the Register number to display the Data!!!</h1>
                <form enctype='multipart/form-data' method="POST" action="">
                    <div class="form-group mx-sm-3 mb-2">
                        <br><br>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name= "reg" placeholder="Register Number">
                        <br>
                    </div>
                    <br><button type="reset" class="btn btn-primary btn-sm" id="btn">Reset</button>
                    <input type="submit" class="btn btn-secondary btn-sm" id="upload" name="upload" value="Submit">
                </form>
            </div>

    <?php
    if (isset($_POST["upload"])) {
        header("Location: display.php?id=" . $reg = $_POST["reg"]);
    }
}
?>