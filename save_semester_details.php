<?php
session_start();
include 'config.php';

// Check if the user is logged in
if(!isset($_SESSION['user_id'])) {
    // Redirect or handle unauthorized access
    echo json_encode(array("status" => "error", "message" => "User not logged in"));
    exit;
}

// Get user ID from session
$userId = $_SESSION['user_id'];

// Check if required POST data is set
if(isset($_POST['new_sgpa']) && isset($_POST['semester']) && isset($_POST['program_name']) && isset($_POST['institution_name'])) {
    // Sanitize and validate input
    $newValue = mysqli_real_escape_string($conn, $_POST['new_sgpa']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $programName = mysqli_real_escape_string($conn, $_POST['program_name']);
    $institutionName = mysqli_real_escape_string($conn, $_POST['institution_name']);

    // Update SGPA value in the sgpa_data table
    $sql = "UPDATE sgpa_data SET sgpa = '$newValue' WHERE semester = '$semester' AND program = '$programName' AND institution = '$institutionName' AND user_id = $userId";
    if(mysqli_query($conn, $sql)) {
        echo  "success";
    } else {
        echo "Error updating semester details";
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Missing parameters"));
}

mysqli_close($conn);
?>