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
            $sql = "SELECT * FROM placement where  reg='$user'";
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
            <h1>Project</h1>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="religion">Title of Projects</label>
                    <input type="text" class="form-control" required name="proj_title" id="proj_title">
                </div>
                <div class="form-group col-md-3">
                    <label for="religion">Project team members</label>
                    <input type="text" class="form-control" required name="team_mem" id="team_mem">
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">Organisation name ( Optional )</label>
                    <input type="text" class="form-control" required name="organisation" id="organisation">
                </div>
                <div class="form-group col-md-4">
                    <label for="religion">Guides</label>
                    <input type="text" class="form-control" required name="guides" id="guides">
                </div>
                <div class="form-group col-md-4">
                    <label for="religion">CGPA</label>
                    <input type="text" class="form-control" required name="cgpa" id="cgpa">
                </div>
                <div class="form-group col-md-4">
                    <label for="religion">Overall Ranking</label>
                    <input type="text" class="form-control" name="rank" required id="rank">
                </div>
            </div>
            <h2>Placement Details</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="religion">Name of the organisation</label>
                    <input type="text" class="form-control" name="placement_org" required id="placement_org">
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">Address of the orgranisation</label>
                    <input type="text" class="form-control" name="address_org" required id="address_org">
                </div>
            </div>
            <div class = "form-action">
            <button type="reset" class="btn btn-danger btn-sm" id="btn">Reset</button>
    	<input type="submit" class="btn btn-secondary btn-sm" id="upload" name="upload" value="Submit">
                </div>
        </form>
    </div>';
                }
            }
            ?>
            <?php
                if(isset($_POST["upload"])) {
                    $proj_title = $_POST["proj_title"];
                    $team_mem = $_POST["team_mem"];
                    $organisation = $_POST["organisation"];
                    $guides = $_POST["guides"];
                    $cgpa = $_POST["cgpa"];
                    $rank = $_POST["rank"];
                    
                    $placement_org = $_POST["placement_org"];
                    $address_org = $_POST["address_org"];
                    
                    mysqli_query($conn, "insert into project_details (reg,title,team_count,organisation,guide,cgpa,overral_rank) values ('$user', '$proj_title', '$team_mem', '$organisation', '$guides', '$cgpa', '$rank')");
                    mysqli_query($conn, "insert into placement (reg, organisation, address) values ('$user', '$placement_org', '$address_org')");
                    header("location: ./success.php", true, 301);                    
                }
            ?>

            <?php
            exit();
        }
        ?>
    </body>
</html>