<!DOCTYPE html>
<html>
<head>
	<title>eForm - User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/userHome.css">
	
	<script>
	</script>  
	</head>
	<body>
<!-- 	<form enctype='multipart/form-data' method="POST" action=""> -->
<!-- 	<div class="form-group mx-sm-3 mb-2"> -->
<!--         <label for="exampleFormControlInput1">Name</label> -->
<!--         <input type="text" class="form-control" id="exampleFormControlInput1" name= "reg" placeholder="19mx0XX"> -->
<!--         <br> -->
<!--         </div> -->
<!--     	<input type="submit" class="btn btn-secondary btn-sm" id="upload" name="upload" value="Submit"> -->
<!--     </form> -->
<!-- 	</body> -->

<?php
$conn = mysqli_connect("localhost", "root", "", "eform") or die(mysqli_errno());
$db = mysqli_select_db($conn, 'eform') or die("databse error");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM studentdetails";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo '<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Particulars</th>
      <th scope="col">Values</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Register Number</td>
      <td>' .$row['reg']. '</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Name</td>
      <td>'.$row['name'].'</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Degree</td>
      <td>'.$row['degree'].'</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Branch</td>
      <td>'.$row['branch'].'</td>
    </tr>
     <tr>
      <th scope="row">5</th>
      <td>Image</td>
      <td>'.$row['image'].'</td>
    </tr>
     <tr>
      <th scope="row">6</th>
      <td>Date of Joining</td>
      <td>'.$row['doj'].'</td>
    </tr>
     <tr>
      <th scope="row">7</th>
      <td>Date of Birth</td>
      <td>'.$row['dob'].'</td>
    </tr>
     <tr>
      <th scope="row">8</th>
      <td>Blood Group</td>
      <td>'.$row['blood'].'</td>
    </tr>
     <tr>
      <th scope="row">9</th>
      <td>Religion</td>
      <td>'.$row['religion'].'</td>
    </tr>
     <tr>
      <th scope="row">10</th>
      <td>Community</td>
      <td>'.$row['community'].'</td>
    </tr>
     <tr>
      <th scope="row">11</th>
      <td>Parent Name</td>
      <td>'.$row['parentname'].'</td>
    </tr>
     <tr>
      <th scope="row">12</th>
      <td>Income</td>
      <td>'.$row['income'].'</td>
    </tr>
     <tr>
      <th scope="row">13</th>
      <td>Parent Address</td>
      <td>'.$row['parentaddr'].'</td>
    </tr>
     <tr>
      <th scope="row">14</th>
      <td>Parent Phone Number</td>
      <td>'.$row['parentphone'].'</td>
    </tr>
     <tr>
      <th scope="row">15</th>
      <td>Occupation</td>
      <td>'.$row['occupation'].'</td>
    </tr>
     <tr>
      <th scope="row">16</th>
      <td>Official Address</td>
      <td>'.$row['officialaddr'].'</td>
    </tr>
     <tr>
      <th scope="row">17</th>
      <td>Phone Number for Communication</td>
      <td>'.$row['phonecomm'].'</td>
    </tr>
     <tr>
      <th scope="row">18</th>
      <td>Postal Code</td>
      <td>'.$row['postal'].'</td>
    </tr>
     <tr>
      <th scope="row">19</th>
      <td>Parent Mail ID</td>
      <td>'.$row['mail'].'</td>
    </tr>
     <tr>
      <th scope="row">20</th>
      <td>Communication Address</td>
      <td>'.$row['commadd'].'</td>
    </tr>
     <tr>
      <th scope="row">21</th>
      <td>Student Phone Number</td>
      <td>'.$row['studphone'].'</td>
    </tr>
     <tr>
      <th scope="row">23</th>
      <td>Student Mail ID</td>
      <td>'.$row['mailstud'].'</td>
    </tr>
  </tbody>
</table>
</body>
</html>';
        }
        mysqli_free_result($result);
    }
}
?>