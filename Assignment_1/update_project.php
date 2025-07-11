<?php
include 'connect.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Project ID not provided.";
    exit;
}

$project = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM design_projects WHERE id = $id"));
$types = mysqli_query($connect, "SELECT * FROM project_types");
$clients = mysqli_query($connect, "SELECT * FROM clients");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $type_id = $_POST['type_id'];
    $software = $_POST['software'];
    $date_completed = $_POST['date_completed'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $client_id = $_POST['client_id'];

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
        echo "<p>Project updated successfully. <a href='index.php'>Back to List</a></p>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Update Project</title></head>
<body>
<h1>Edit Project</h1>
<form method="POST">
    <input type="text" name="title" value="<?= $project['title'] ?>" required><br>
    <select name="type_id">
        <?php while($row = mysqli_fetch_assoc($types)) {
            $sel = $row['id'] == $project['type_id'] ? 'selected' : '';
            echo "<option value='{$row['id']}' $sel>{$row['type_name']}</option>";
        } ?>
    </select><br>
    <input type="text" name="software" value="<?= $project['software'] ?>" required><br>
    <input type="date" name="date_completed" value="<?= $project['date_completed'] ?>" required><br>
    <input type="text" name="image" value="<?= $project['image'] ?>" required><br>
    <textarea name="description"><?= $project['description'] ?></textarea><br>
    <select name="client_id">
        <?php 
        $clients_result = mysqli_query($connect, "SELECT * FROM clients");
        while($row = mysqli_fetch_assoc($clients_result)) {
            $sel = $row['id'] == $project['client_id'] ? 'selected' : '';
            echo "<option value='{$row['id']}' $sel>{$row['client_name']}</option>";
        } 
        ?>
    </select><br>
    <button type="submit">Update</button>
</form>
</body>
</html>
