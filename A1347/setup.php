<?php
include("config.php");
session_start();
$server   = $_SERVER['SERVER_ADDR'];
$db_database = "yourls";
$db_user = "yourls";
$db_password = "password";

// Create connection using default MAMP mysql credentials
$conn = mysqli_connect($server, "root", "root");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Drop existing database (if it exists)
$sql = "DROP DATABASE IF EXISTS $db_database";
if (mysqli_query($conn, $sql)) {
  echo "Database $db_database dropped successfully (if it existed)<br>";
} else {
  echo "Error dropping database: " . mysqli_error($conn) . "<br>";
}

// Create database
$sql = "CREATE DATABASE $db_database";
if (mysqli_query($conn, $sql)) {
  echo "Database $db_database created successfully<br>";
} else {
  echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Delete existing user (if it exists)
$new_username = $db_username;
$sql = "DROP USER IF EXISTS '$new_username'@'localhost'";

if (mysqli_query($conn, $sql)) {
  echo "User '$new_username' deleted (if it existed)<br>";
} else {
  echo "Error dropping user (might not exist): " . mysqli_error($conn) . "<br>";
}

// Create user and grant permissions
$new_password = $db_password;  // Replace with desired password

$sql = "CREATE USER '$new_username'@'localhost' IDENTIFIED BY '$new_password'";
if (mysqli_query($conn, $sql)) {
  echo "User '$new_username' created successfully<br>";
} else {
  echo "Error creating user: " . mysqli_error($conn) . "<br>";
}

$sql = "GRANT ALL PRIVILEGES ON $db_database.* TO '$new_username'@'localhost'";
if (mysqli_query($conn, $sql)) {
  echo "Permissions granted to user '$new_username' on database '$db_database'<br>";
} else {
  echo "Error granting permissions: " . mysqli_error($conn) . "<br>";
}

// Select the newly created database
$sql = "USE $db_database";
if (mysqli_query($conn, $sql)) {
  echo "Using database $db_database<br>";
} else {
  echo "Error using database: " . mysqli_error($conn) . "<br>";
}

?>
