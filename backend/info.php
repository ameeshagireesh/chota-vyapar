
<?php
//change these variables respective to your system
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chota-vyapar";


// Create connection
$conn = new mysqli($servername, $username  ,$password ,$dbname );
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn,$_POST["name"]);
  $contact_number = mysqli_real_escape_string($conn,$_POST["contact_number"]);
  $pagelink = mysqli_real_escape_string($conn,$_POST["pagelink"]);
  $logo = mysqli_real_escape_string($conn,$_POST["logo"]);
}

$name = isset($name) ? $name : '';
$contact = isset($contact_number) ? $contact_number : '';
$contact_number = (int)$contact;
$pagelink = isset($pagelink) ? $pagelink : '';
$logo = isset($logo) ? $logo : '';
$sql =" INSERT INTO smallshops (name,contact_number,pagelink,logo) VALUES('$name','$contact_number','$pagelink','$logo')";
if ($conn->query($sql) == TRUE)
{
  echo '<h1>You have been successfully registered</h1>';
} else {
echo "Error registering you as a small business " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>