<?php
//Passing the credentials to access the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test01";
//Establishing the connection
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Kết nối đến cơ sở dữ liệu
$host = "localhost:3306";
$username = "root";
$password = "";
$database = "test01";
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$bill = $_GET['bill'];
$year = $_GET['year'];
$gender = $_GET['gender'];

// Construct the query
$query = "SELECT * FROM customer WHERE gender = '$gender'";

if (is_numeric($bill)) {
  $query .= " AND bill >= $bill";
}

if (is_numeric($year)) {
  $query .= " AND year <= $year";
}

// Run the query and fetch results
$result = mysqli_query($conn, $query);

$customers = [];
while ($row = mysqli_fetch_assoc($result)) {
  $customers[] = $row;
}

mysqli_close($conn);

// Encode customers data into JSON
echo json_encode($customers);
