<?php
require('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM schools WHERE id = $id";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header('Location: index.php');
        exit;
    } else {
        echo "Failed to delete the school.";
    }
} else {
    echo "Invalid request.";
}
?>
