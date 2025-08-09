<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = mysqli_connect("localhost", "root", "", "ngostaff");

    if (!$con) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $m = mysqli_real_escape_string($con, $_POST['name']);
    $n = $_POST['DOB'];
    $o = mysqli_real_escape_string($con, $_POST['email']);
    $p = mysqli_real_escape_string($con, $_POST['phone']);
    $q = mysqli_real_escape_string($con, $_POST['Bio']);
    $r = mysqli_real_escape_string($con, $_POST['JR']);

    // File Upload
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $upload_path = "uploads/" . basename($photo_name);
    move_uploaded_file($photo_tmp, $upload_path);

    $sql = "INSERT INTO staffdetails (Fullname, DateOfBirth, Email, PhoneNumber, Bio, JobRole, Photo)
            VALUES ('$m', '$n', '$o', '$p', '$q', '$r', '$photo_name')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<div class='success-message'>
                <h1>Your Information is Submitted Successfully!</h1>
                <p>Thank you for your submission.</p>
                <form action='main.html' method='get'>
                  <center><button type='submit' class='details-btn'>Click for Details</button></center>
                </form>
              </div>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Display table
    $read = "SELECT * FROM staffdetails";
    $read_result = mysqli_query($con, $read);

    echo "<table border='1'>
            <tr>
              <th>Fullname</th>
              <th>DateOfBirth</th>
              <th>Email</th>
              <th>PhoneNumber</th>
              <th>Bio</th>
              <th>JobRole</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($read_result)) {
        echo "<tr>
                <td>{$row['Fullname']}</td>
                <td>{$row['DateOfBirth']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['PhoneNumber']}</td>
                <td>{$row['Bio']}</td>
                <td>{$row['JobRole']}</td>
                <td><img src='uploads/{$row['Photo']}' width='60'></td>
                <td><a href='update.php?id={$row['id']}'>Update</a></td>
              </tr>";
    }
    echo "</table>";

    mysqli_close($con);
}
?>