<?php
include 'connect.php';

// Retrieving the project ID from the URL
$id = $_GET['id'] ?? null;
if (!$id) {
    // Displaying an error if no ID is provided
    echo "Project ID not provided.";
    exit;
}

// Fetching the project details from the database
$project_query = mysqli_query($connect, "SELECT * FROM design_projects WHERE id = $id");
$project = mysqli_fetch_assoc($project_query);

// Fetching all project types and clients for the dropdowns
$types_result = mysqli_query($connect, "SELECT * FROM project_types");
$clients_result = mysqli_query($connect, "SELECT * FROM clients");

// Handling the form submission for updating the project
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // I am retrieving updated form data
    $title = $_POST['title'];
    $type_id = $_POST['type_id'];
    $software = $_POST['software'];
    $date_completed = $_POST['date_completed'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $client_id = $_POST['client_id'];

    // I am preparing the SQL query to update the project
    $sql = "UPDATE design_projects SET 
        title='$title',
        type_id='$type_id',
        software='$software',
        date_completed='$date_completed',
        image='$image',
        description='$description',
        client_id='$client_id'
        WHERE id = $id";

    if (mysqli_query($connect, $sql)) {
        // Displaying a success message after updating
        echo "<p>Project updated successfully. <a href='index.php'>Back to List</a></p>";
    } else {
        // Displaying an error if the update fails
        echo "Error: " . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Update Project</title></head>
<body>
<h1>Edit Project</h1>
<!-- I am creating a form for editing the project -->
<form method="POST" action="">
    <input type="text" name="title" value="<?= $project['title'] ?>" required><br>
    <select name="type_id"><?php while($row = mysqli_fetch_assoc($types_result)) {
        // I am marking the current type as selected
        $selected = $row['id'] == $project['type_id'] ? 'selected' : '';
        echo "<option value='{$row['id']}' $selected>{$row['type_name']}</option>";
    } ?></select><br>
    <input type="text" name="software" value="<?= $project['software'] ?>" required><br>
    <input type="date" name="date_completed" value="<?= $project['date_completed'] ?>" required><br>
    <input type="text" name="image" value="<?= $project['image'] ?>" required><br>
    <textarea name="description"><?= $project['description'] ?></textarea><br>
    <select name="client_id"><?php mysqli_data_seek($clients_result, 0); while($row = mysqli_fetch_assoc($clients_result)) {
        // I am marking the current client as selected
        $selected = $row['id'] == $project['client_id'] ? 'selected' : '';
        echo "<option value='{$row['id']}' $selected>{$row['client_name']}</option>";
    } ?></select><br>
    <button type="submit">Update</button>
</form>
</body>
</html>
