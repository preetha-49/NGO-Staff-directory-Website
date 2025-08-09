<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Staff's Details</title>
  </head>
<body>
  <div class="success-message">
    <h1>Your Information is Submitted Successfully!</h1>
    <p>Thank you for your submission.</p>
<br><br>
<form action="main.html" method="get">
  <center><button type="submit" class="details-btn">Click for Details</button></center>
</form>
<style>
.success-message {
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      padding: 30px 40px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .success-message h1 {
      color: #04d891;
      margin-bottom: 10px;
    }
  </style>
<style>
  .details-btn {
    padding: 10px 20px;
    background-color: #06c767;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
  }

  .details-btn:hover {
    background-color: #04eba5;
  }
</style>
<br><br>

<table class="table">
  <thead>
    <tr>
      <th>FULLNAME</th>
      <th>DATEOFBIRTH</th>
      <th>EMAIL</th>
      <th>PHONENUMBER</th>
      <th>BIO</th>
			<th>JOBROLE</th>
      <th>PHOTO</th>
      <th></th>
    </tr> 
  </thead>
        
  <tbody>
    <?php
    // File: submit.php
    // Collect form data
      $m=$_POST['name'];
      $n=$_POST['DOB'];
      $o=$_POST['email'];
      $p=$_POST['phone'];
      $q=$_POST['Bio'];
      $r=$_POST['JR'];
      
      // Handle photo upload
      $photo_name = $_FILES['photo']['name'];
      $photo_tmp = $_FILES['photo']['tmp_name'];
      move_uploaded_file($photo_tmp, "uploads/" . $photo_name);

      $con=mysqli_connect("localhost","root","","ngostaff");

			$sql="INSERT INTO staffdetails(Fullname, DateOfBirth, Email, PhoneNumber, Bio, JobRole, Photo) values('$m','$n','$o','$p','$q','$r','$photo_name')";
			$j=mysqli_query($con,$sql);
			if($j)
			{
			echo"Login Successfully...!";
			} 
			else
			{
			echo"Login Failed";
			}
      $servername="localhost";
      $username= "root";
      $password= "";
      $database="ngostaff";  
            
      //Create connection 
      $conn = new mysqli($servername, $username, $password, $database);
            
      //Check the connection
      if ($con->connect_error) {
      die ("Connection Failed..!". $conn->connect_error);
      }
			//read all db Table
      $sql = "SELECT * FROM staffdetails";
      $result = $con->query($sql);

      if (!$result) {
        die ("invalid qurey:". $con->error);
          }

      //read a data of all row
      while($row = $result->fetch_assoc()) {
        echo"<tr>
          <td>". $row["Fullname"]."</td>
          <td>". $row["DateOfBirth"]."</td>
          <td>". $row["Email"]."</td>
          <td>". $row["PhoneNumber"]."</td>
          <td>". $row["Bio"]."</td>
          <td>". $row["JobRole"]."</td>
          <td><img src='uploads/{$row['Photo']}' width='60'></td>
          
          </tr>";
          }
            
    ?>
  </tbody>
</table>
     
</body>
</html> 
