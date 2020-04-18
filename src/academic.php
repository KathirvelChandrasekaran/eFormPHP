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
            $sql = "SELECT * FROM academic_progress_sem1 where  reg='$user'";
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
            <h1>Academic</h1>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Semester</th>
                        <th scope="col">Residential Status</th>
                        <th scope="col">Tutor Name</th>
                        <th scope="col">No. of arrears</th>
                        <th scope="col">No. of redo courses</th>
                        <th scope="col">CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem1_res" id="sem1_res">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem1_tutor" id="sem1_tutor">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="sem1_arrears" id="sem1_arrears">
                        <td>
                            <input type="text" class="form-control" value="0" name="sem1_redo" id="sem1_redo">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="cgpa1" id="cgpa1">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem2_res" id="sem2_res">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem2_tutor" id="sem2_tutor">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="sem2_arrears" id="sem2_arrears">
                        <td>
                            <input type="text" class="form-control" value="0" name="sem2_redo" id="sem2_redo">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="cgpa2" id="cgpa2">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem3_res" id="sem3_res">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem3_tutor" id="sem3_tutor">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="sem3_arrears" id="sem3_arrears">
                        <td>
                            <input type="text" class="form-control" value="0" name="sem3_redo" id="sem3_redo">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="cgpa3" id="cgpa3">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem4_res" id="sem4_res">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem4_tutor" id="sem4_tutor">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="sem4_arrears" id="sem4_arrears">
                        <td>
                            <input type="text" class="form-control" value="0" name="sem4_redo" id="sem4_redo">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="cgpa4" id="cgpa4">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem5_res" id="sem5_res">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem5_tutor" id="sem5_tutor">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="sem5_arrears" id="sem5_arrears">
                        <td>
                            <input type="text" class="form-control" value="0" name="sem5_redo" id="sem5_redo">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="cgpa5" id="cgpa5">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem6_res" id="sem6_res">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="Nill" name="sem6_tutor" id="sem6_tutor">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="sem6_arrears" id="sem6_arrears">
                        <td>
                            <input type="text" class="form-control" value="0" name="sem6_redo" id="sem6_redo">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="0" name="cgpa6" id="cgpa6">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="reset" class="btn btn-danger btn-sm" id="btn">Reset</button>
    	<input type="submit" class="btn btn-secondary btn-sm" id="upload" name="upload" value="Submit">
        </form>
    </div>';
                }
            }
            ?>
            <?php
            if (isset($_POST["upload"])) {
                $cgpa1 = $_POST["cgpa1"];
                $cgpa2 = $_POST["cgpa2"];
                $cgpa3 = $_POST["cgpa3"];
                $cgpa4 = $_POST["cgpa4"];
                $cgpa5 = $_POST["cgpa5"];
                $cgpa6 = $_POST["cgpa6"];
                $sem1_res = $_POST["sem1_res"];
                $sem2_res = $_POST["sem2_res"];
                $sem3_res = $_POST["sem3_res"];
                $sem4_res = $_POST["sem4_res"];
                $sem5_res = $_POST["sem5_res"];
                $sem6_res = $_POST["sem6_res"];
                $sem1_tutor = $_POST["sem1_tutor"];
                $sem2_tutor = $_POST["sem2_tutor"];
                $sem3_tutor = $_POST["sem3_tutor"];
                $sem4_tutor = $_POST["sem4_tutor"];
                $sem5_tutor = $_POST["sem5_tutor"];
                $sem6_tutor = $_POST["sem6_tutor"];
                $sem1_arrears = $_POST["sem1_arrears"];
                $sem2_arrears = $_POST["sem2_arrears"];
                $sem3_arrears = $_POST["sem3_arrears"];
                $sem4_arrears = $_POST["sem4_arrears"];
                $sem5_arrears = $_POST["sem5_arrears"];
                $sem6_arrears = $_POST["sem6_arrears"];
                $sem1_redo = $_POST["sem1_redo"];
                $sem2_redo = $_POST["sem2_redo"];
                $sem3_redo = $_POST["sem3_redo"];
                $sem4_redo = $_POST["sem4_redo"];
                $sem5_redo = $_POST["sem5_redo"];
                $sem6_redo = $_POST["sem6_redo"];

                mysqli_query($conn, "insert into academic_progress_sem1 (reg, sem_no, res_status, tutor_name, arrear_count, redo_count, cgpa) values ('$user', '1', '$sem1_res', '$sem1_tutor', '$sem1_arrears', '$sem1_redo', '$cgpa1')");
                mysqli_query($conn, "insert into academic_progress_sem2 (reg, sem_no, res_status, tutor_name, arrear_count, redo_count, cgpa) values ('$user', '2', '$sem2_res', '$sem2_tutor', '$sem2_arrears', '$sem2_redo', '$cgpa2')");
                mysqli_query($conn, "insert into academic_progress_sem3 (reg, sem_no, res_status, tutor_name, arrear_count, redo_count, cgpa) values ('$user', '3', '$sem3_res', '$sem3_tutor', '$sem3_arrears', '$sem3_redo', '$cgpa3')");
                mysqli_query($conn, "insert into academic_progress_sem4 (reg, sem_no, res_status, tutor_name, arrear_count, redo_count, cgpa) values ('$user', '4', '$sem4_res', '$sem4_tutor', '$sem4_arrears', '$sem4_redo', '$cgpa4')");
                mysqli_query($conn, "insert into academic_progress_sem5 (reg, sem_no, res_status, tutor_name, arrear_count, redo_count, cgpa) values ('$user', '5', '$sem5_res', '$sem5_tutor', '$sem5_arrears', '$sem5_redo', '$cgpa5')");
                mysqli_query($conn, "insert into academic_progress_sem6 (reg, sem_no, res_status, tutor_name, arrear_count, redo_count, cgpa) values ('$user', '6', '$sem6_res', '$sem6_tutor', '$sem6_arrears', '$sem6_redo', '$cgpa6')");
                header("location: ./success.php", true, 301);
            }
            ?>
            <?php
            exit();
        }
        ?>
    </body>
</html>