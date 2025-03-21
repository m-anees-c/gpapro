<?php
// Allow from any origin
//header("Access-Control-Allow-Origin: http://localhost:7700");

//header('Access-Control-Allow-Credentials: true');


// Allow specific HTTP methods
//header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow specific headers
//hea("Access-Control-Allow-Headers: Content-Type, Author

// Handle preflight requests (if you're using complex requests with


// Your existing PHP code here

$servername = "localhost";
$username = "root";
$password = "";
$database = "gpapro";

// Create connection
$socket = "/data/data/com.termux/files/usr/var/run/mysqld.sock";
$conn = new mysqli("localhost", "root", "newpassword", "gpapro", null, $socket);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

define('EMAIL', 'johnwickfromjohnwick007@gmail.com');
define('PASSWORD', 'nhwajjzybzaacbzi');


?>