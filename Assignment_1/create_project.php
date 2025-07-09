<?php
include 'connect.php';

// Fetching project types from the database
$types_result = mysqli_query($connect, "SELECT id, type_name FROM project_types");

// Fetching clients from the database
$clients_result = mysqli_query($connect, "SELECT id, client_name FROM clients");

// Handling the form submission for creating a new project
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // I am sanitizing and retrieving form data
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $type_id = intval($_POST['type_id']);
    $software = mysqli_real_escape_string($connect, $_POST['software']);
    $date_completed = mysqli_real_escape_string($connect, $_POST['date_completed']);
    $image = mysqli_real_escape_string($connect, $_POST['image']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $client_id = intval($_POST['client_id']);

    // Writing the SQL query to insert the new project
    $insert_sql = "INSERT INTO design_projects (title, type_id, software, date_completed, image, description, client_id) VALUES ('$title', $type_id, '$software', '$date_completed', '$image', '$description', $client_id)";
    if (mysqli_query($connect, $insert_sql)) {
        header('Location: index.php');
        exit();
    } else {
        $error = 'Error adding project: ' . mysqli_error($connect);
    }
}
?>

<div class="form-center">
    <h1>Add New Project</h1>
    <!-- I am creating a form for adding a new project -->
    <form method="POST" action="">
        <div>
            <label for="title">Project Title</label><br>
            <input type="text" name="title" id="title" required><br><br>
        </div>

        <div>
            <label for="type_id">Project Type</label><br>
            <select name="type_id" id="type_id" required>
                <?php while($row = mysqli_fetch_assoc($types_result)) {
                    // I am displaying each project type as an option
                    echo "<option value='{$row['id']}'>{$row['type_name']}</option>";
                } ?>
            </select><br><br>
        </div>

        <div>
            <label for="software">Software Used</label><br>
            <input type="text" name="software" id="software" required><br><br>
        </div>

        <div>
            <label for="date_completed">Date Completed</label><br>
            <input type="date" name="date_completed" id="date_completed" required><br><br>
        </div>

        <div>
            <label for="image">Image Filename</label><br>
            <input type="text" name="image" id="image" required><br><br>
        </div>

        <div>
            <label for="description">Project Description</label><br>
            <textarea name="description" id="description" rows="4" cols="40"></textarea><br><br>
        </div>

        <div>
            <label for="client_id">Client</label><br>
            <select name="client_id" id="client_id" required>
                <?php while($row = mysqli_fetch_assoc($clients_result)) {
                    // I am displaying each client as an option
                    echo "<option value='{$row['id']}'>{$row['client_name']}</option>";
                } ?>
            </select><br><br>
        </div>

        <button type="submit">Create</button>
    </form>
    <div style="text-align:center;margin-top:18px;">
        <!-- I am providing a link to go back to the main projects page -->
        <a href="index.php" class="btn edit-btn">Back to Projects</a>
    </div>
</div>
