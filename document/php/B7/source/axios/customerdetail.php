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
//Constructing the query with all conditions
$query = "SELECT * FROM customer WHERE gender = '$gender'";

if (is_numeric($bill)){
    $query .= " AND bill >= $bill";
}

if (is_numeric($year)){
    $query .= " AND year <= $year";
}
    
//Running the query
$data = mysqli_query($conn, $query);

//Table structure
$displayTb = '<table border="1">';
$displayTb .= "<tr>";
$displayTb .= "<th>Name</th>";
$displayTb .= "<th>Total Bill</th>";
$displayTb .= "<th>Year Joined</th>";
$displayTb .= "<th>Gender</th>";
$displayTb .= "</tr>";
//Inserting data for each person
while ($row = mysqli_fetch_array($data)) {
    $displayTb .= "<tr>";
    $displayTb .= "<td>$row[name]</td>";
    $displayTb .= "<td>$row[bill]</td>";
    $displayTb .= "<td>$row[year]</td>";
    $displayTb .= "<td>$row[gender]</td>";
    $displayTb .= "</tr>";
}
$displayTb .= "</table>";

echo "Danh sách bill" . $query . "<br />";
echo $displayTb;
