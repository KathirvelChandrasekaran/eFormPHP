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
            <?php
            $sql = "SELECT * FROM studentdetails where  reg='$user'";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="alert alert-success" role="alert">
                                <h1>Details has already entered!!!</h1>
                              </div>';
                        echo '<div class="container view">
                                <div class="card text-center" style="width: 18rem;">
                                    <img src="./images/undraw_newspaper_k72w.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="./editStdnthome.php" class="btn btn-success">View / Edit</a>
                                    </div>
                                </div>
                                </div>';
                    }
                } else {
                    echo '<div class="container personalDetails">
                <h1>Personal Details</h1>
                <form enctype="multipart/form-data" method="POST" action="">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Register Number</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="reg" placeholder="19mx0XX">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Name">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Degree</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="degree"
                    placeholder="Degree">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Branch</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="branch"
                    placeholder="Branch">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlFile1">Photo</label>
                <input type="file" class="form-control-file" id="uploadfile" name="uploadfile" />
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlFile1">Date of Joining</label>
                <input type="date" class="form-control date" name="doj">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlFile1">Date of Birth</label>
                <input type="date" class="form-control date" name="dob">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Blood Group</label>
                <input type="text" class="form-control" id="blood" name="blood" placeholder="Blood Group"><br>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Religion</label>
                <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion"><br>
            </div>
            <div class="form-group col-md-5>
                <label for=" exampleFormControlInput1">Community</label><br><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="community" id="community" value="OC">
                    <label class="form-check-label" for="inlineRadio1">OC</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="community" id="community" value="BC">
                    <label class="form-check-label" for="inlineRadio2">BC</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="community" id="community" value="MBC">
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
                <input type="text" class="form-control" id="exampleFormControlInput1" name="parent"
                    placeholder="Parent/Guardian">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Annual Income</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="income"
                    placeholder="Annual Income">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Phone</label>
                <input type="text" class="form-control" id="phonecom" name="phonecom" pattern="[0-9]{10}" required
                    placeholder="Phone">
            </div>
        </div>
                <h1>Communication Details</h1>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Occupation of Parent/Guardian</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="occupation"
                    placeholder="Occupation">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Official Address of Parent or Guardian</label>
                <textarea class="form-control" id="officalddress" name="officialaddress" rows="3"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Phone (Parent/Guardian)</label>
                <input type="text" class="form-control" id="phonecom" name="phonecom" pattern="[0-9]{10}" required
                    placeholder="Phone"><br>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Postal Code</label>
                <input type="text" class="form-control" id="postal" name="postal" pattern="[0-9]{6}" required
                    placeholder="Postal"><br>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Address for Communication</label>
                <textarea class="form-control" id="commAddress" name="commAddress" rows="3"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Phone (Student)</label>
                <input type="text" class="form-control" id="phoneStud" name="phoneStud" pattern="[0-9]{10}" required
                    placeholder="Phone">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">E-Mail ID (Student)</label>
                <input type="text" class="form-control" id="emailStud" name="emailStud" placeholder="EMail">
            </div>
                    </div>
                    <button type="reset" class="btn btn-danger btn-sm" id="btn">Reset</button>
    	<input type="submit" class="btn btn-secondary btn-sm" id="upload" name="upload" value="Submit">
                </form>
            </div>';
                }
            }
            ?>


            <?php
            if (isset($_POST["upload"])) {
                $reg = $_POST["reg"];
                $name = $_POST["name"];
                $degree = $_POST["degree"];
                $branch = $_POST["branch"];
                $doj = ($_POST["doj"]);
                $new_doj = date('Y-m-d', strtotime($doj));
                $dob = ($_POST["dob"]);
                $new_dob = date('Y-m-d', strtotime($dob));
                $imagename = $_FILES["uploadfile"]["name"];
                $blood = $_POST["blood"];
                $religion = $_POST["religion"];
                $community = $_POST["community"];
                $parentname = $_POST["parent"];
                $income = $_POST["income"];
                $occupation = $_POST["occupation"];
                $officialaddress = $_POST["officialaddress"];
                $phonecomm = $_POST["phonecom"];
                $postal = $_POST["postal"];
                $commaddress = $_POST["commAddress"];
                $studphone = $_POST["phoneStud"];
                $emailStud = $_POST["emailStud"];
                //$filetmpname = addslashes(file_get_contents($_FILES['uploadfile']['tmp_name']));
                //$sql = "INSERT INTO studentdetails (regno,name,degree,branch,image,doj,dob,blood,religion,community,parentname,income,parentaddress,parentphone,occupation,officaladdress,phonecomm,postcode,parentemail,commaddress,studentphone,studemail) VALUES ('$reg','$name','$degree','$branch','$imagename','$new_doj','$new_dob','$blood','$religion','$community','$parentname','$income','$parentaddress','$parentphone','$occupation','$officialaddress','$phonecomm','$postal','$parentemail','$commaddress','$studphone','$emailStud')";
                //$sql ="INSERT INTO studentdetails (regno, name, degree, branch, image, doj, dob, blood, religion, community, parentname, income, parentaddress, parentphone, occupation, officialaddress, phonecomm, postcode, parentemail, commaddress, studentphone, studemail) VALUES (".$reg.",".$name.",".$degree.",".$branch.",".$imagename.",".$new_doj.",".$new_dob.",".$blood.",".$religion.",".$community.",".$parentname.",".$income.",".$parentaddress.",".$parentphone.",".$occupation.",".$officialaddress.",".$phonecomm.",".$postal.",".$parentemail.",".$commaddress.",".$studphone.",".$emailStud.")";
                $sql = "INSERT INTO studentdetails (reg,name,degree,branch,image,doj,dob,blood,religion,community,parentname,income,occupation,officialaddr,phonecomm,postal,commadd,studphone,mailstud) VALUES ('$reg', '$name', '$degree', '$branch', '$imagename','$new_doj','$new_dob','$blood','$religion','$community','$parentname','$income','$occupation','$officialaddress','$phonecomm','$postal','$commaddress','$studphone','$emailStud')";
                mysqli_query($conn, $sql);
                header("location: ./success.php", true, 301);
            }
            ?>
            <?php
            exit();
        }
        ?>
    </body>
</html>