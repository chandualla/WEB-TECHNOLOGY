
<?php
// Connect to the database
session_start();
$host = 'localhost';
$uname = 'root';
$password = "";
$dbname = "fb";
$conn = mysqli_connect($host, $uname, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$comment = $_POST['comment'];
$uid=$_SESSION['fb_userid'];
$pid=$_POST['but'];

// Insert the comment into the database
$sql = "INSERT INTO comments (postid,userid,comment) VALUES ('$pid', '$uid', '$comment')";
if (mysqli_query($conn, $sql)) {
  echo "Comment added successfully.";
} else {
  echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>