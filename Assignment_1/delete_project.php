<?php
include 'connect.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $sql = "DELETE FROM design_projects WHERE id = $id";
    if (mysqli_query($connect, $sql)) {
        echo "Project deleted. <a href='index.php'>Back to List</a>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
} else {
    echo "Invalid project ID.";
}
