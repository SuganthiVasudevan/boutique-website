<?php
// insert.php

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "nathi";

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging output for request method
echo "Request Method: " . ($_SERVER["REQUEST_METHOD"] ?? "Not Set") . "<br>";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['Name'];
    $ph_no = $_POST['Ph_no'];
    $street = $_POST['Street'];
    $city = $_POST['City'];
    $country = $_POST['Country'];
    $product_code = $_POST['Product_Code'];

    // Prepare SQL query
    $sql = "INSERT INTO cod_details (Name, Ph_no, Street, City, Country, Product_Code) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $ph_no, $street, $city, $country, $product_code);

    // Execute the query
    if ($stmt->execute()) {
        echo "<h3> Order placed successfully! </h3>";
    } else {
        echo "<h3>Error: " . $stmt->error . "</h3>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
