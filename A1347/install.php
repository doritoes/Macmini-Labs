<?php
include("config.php");
session_start();
$server   = $_SERVER['SERVER_ADDR'];
// Create connection using default MAMP mysql credentials
$conn = mysqli_connect($db_hostname, "root", "root");

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

// SQL statement to create table
$sql = "CREATE TABLE upload_images (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) DEFAULT '',
  filename varchar(255) DEFAULT '',
  timeline timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;";

// Execute the query
if (mysqli_query($conn, $sql)) {
  echo "Table upload_images created successfully<br>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

// Open the file for reading
$file = fopen("simple_lamp.sql", "r");

// Check if the file was opened successfully
if (!$file) {
  echo "Error opening file!";
  exit;
}

// Loop through each line in the file and run INSERT statements
while (($line = fgets($file)) !== false) {
  // Check if the line starts with "INSERT" (case-insensitive)
  if (stripos($line, "INSERT") === 0) {
    // Remove trailing newline character (if present)
    $sql = $line = rtrim($line, "\r\n");
    // Print the INSERT statement
    if (mysqli_query($conn, $sql)) {
      echo "Inserted data successfully<br>";
    } else {
      echo "Error inserting data: " . mysqli_error($conn) . "<br>";
      exit;
    }
  }
}

// Close the file
fclose($file);

?>
