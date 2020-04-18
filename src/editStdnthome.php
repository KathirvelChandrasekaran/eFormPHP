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

    $select_query = "SELECT * FROM studentdetails WHERE reg='" . $user . "'";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_array($result);
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
                $(document).ready(function () {
                    $('#insert').click(function () {
                        var image_name = $('#image').val();
                        if (image_name == '')
                        {
                            alert("Please Select Image");
                            return false;
                        } else
                        {
                            var extension = $('#image').val().split('.').pop().toLowerCase();
                            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
                            {
                                alert('Invalid Image File');
                                $('#image').val('');
                                return false;
                            }
                        }
                    });
                });
            </script>  

            <style>
                .alert h1{
                    font-size: 20px;
                }
            </style>
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
            <div class="container personalDetails">
                <h1>Personal Details</h1>
                <form enctype="multipart/form-data" method="POST" action="">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Register Number</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="reg" value="<?php echo $row['reg']; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $row['name']; ?>" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Degree</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="degree"
                                       value="<?php echo $row['degree']; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Branch</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="branch"
                                       value="<?php echo $row['branch']; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlFile1">Photo</label>
                                <input type="file" class="form-control-file" id="uploadfile" name="uploadfile" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlFile1">Date of Joining</label>
                                <input type="date" class="form-control date" value="<?php echo $_POST['doj']; ?>" name="doj">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlFile1">Date of Birth</label>
                                <input type="date" class="form-control date" value="<?php echo $_POST['dob']; ?>" name="dob">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Blood Group</label>
                                <input type="text" class="form-control" id="blood" value="<?php echo $row['blood']; ?>" name="blood"><br>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Religion</label>
                                <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $row['religion']; ?>" ><br>
                            </div>
                            <div class="form-group col-md-5>
                                 <label for=" exampleFormControlInput1">Community</label><br><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="<?php echo $_POST['community']; ?>" name="community" id="community" value="OC">
                                    <label class="form-check-label" for="inlineRadio1">OC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="community" value="<?php echo $_POST["community"]; ?>" id="community" value="BC">
                                    <label class="form-check-label" for="inlineRadio2">BC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="community" value="<?php echo $_POST["community"]; ?>" id="community" value="MBC">
                                    <label class="form-check-label" for="inlineRadio1">MBC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="community" id="community" value="DNC">
                                    <label class="form-check-label" for="inlineRadio2">DNC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="community" id="community" value="SC">
                                    <label class="form-check-label" for="inlineRadio1">SC</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Parent Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="parent" value="<?php echo $row['parentname']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Annual Income</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="income"
                                       value="<?php echo $row['income']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Phone</label>
                                <input type="text" class="form-control" id="phonecom" name="phonecom" pattern="[0-9]{10}" required
                                       value="<?php echo $row['phonecomm']; ?>">
                            </div>
                        </div>
                        <h1>Communication Details</h1>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Occupation of Parent/Guardian</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="occupation"
                                       value="<?php echo $row['occupation']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Official Address of Parent or Guardian</label>
                                <textarea class="form-control" id="officalddress" name="officialaddress" value="<?php echo $row['officialaddr']; ?>" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Phone (Parent/Guardian)</label>
                                <input type="text" class="form-control" id="phonecom" name="phonecom" value="<?php echo $row['phonecomm']; ?>" pattern="[0-9]{10}" required
                                       placeholder="Phone"><br>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Postal Code</label>
                                <input type="text" class="form-control" id="postal" name="postal" value="<?php echo $row['postal']; ?>" pattern="[0-9]{6}" required
                                       placeholder="Postal"><br>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Address for Communication</label>
                                <textarea class="form-control" id="commAddress" name="commAddress" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Phone (Student)</label>
                                <input type="text" class="form-control" id="phoneStud" value="<?php echo $row['studphone']; ?>" name="phoneStud" pattern="[0-9]{10}" required
                                       placeholder="Phone">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">E-Mail ID (Student)</label>
                                <input type="text" class="form-control" id="emailStud" name="emailStud" value="<?php echo $row['mailstud']; ?>" placeholder="EMail">
                            </div>
                        </div>
                        <button type="reset" class="btn btn-danger btn-sm" id="btn">Reset</button>
                        <input type="submit" class="btn btn-secondary btn-sm" id="upload" name="upload" value="Submit">
                        </form>
                    </div>
            </div>
            <?php
            if (isset($_POST["upload"])) {
                mysqli_query($conn, "update studentdetails set reg = '" . $_POST["reg"] . "', name='" . $_POST["name"] . "', degree='" . $_POST["degree"] . "', branch='" . $_POST["branch"] . "', image='" . $_FILES["uploadfile"]["name"] . "', doj='" . ($_POST["doj"]) . "', dob='" . ($_POST["dob"]) . "', blood='" . $_POST["blood"] . "', religion='" . $_POST["religion"] . "', community='" . $_POST["community"] . "', parentname='" . $_POST["parent"] . "', income='" . $_POST["income"] . "', occupation='" . $_POST["occupation"] . "', officialaddr='" . $_POST["officialaddress"] . "', phonecom='" . $_POST["phonecom"] . "', postal='" . $_POST["postal"] . "', commadd='" . $_POST["commAddress"] . "', studphone='" . $_POST["phoneStud"] . "', mailstud='" . $_POST["emailStud"] . "' where reg= .'$user'.");
                $message = "Record Modified Successfully";
            }
        }
        ?>
    </body>
</html>