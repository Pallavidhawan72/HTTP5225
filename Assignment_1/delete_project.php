<?php
include 'connect.php';
// I am retrieving the project ID from the URL
$id = $_GET['id'] ?? null;
if ($id) {
    // SQL query to delete the project
    $sql = "DELETE FROM design_projects WHERE id = $id";
    if (mysqli_query($connect, $sql)) {
        // Displaying a success message after deletion
        echo "Project deleted. <a href='index.php'>Back to List</a>";
    } else {
        // Displaying an error if the deletion fails
        echo "Error: " . mysqli_error($connect);
    }
} else {
    // Displaying an error if the project ID is invalid
    echo "Invalid project ID.";
}
