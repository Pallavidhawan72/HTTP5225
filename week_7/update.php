<?php
require('connect.php');

// Load school data if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM schools WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $school = mysqli_fetch_assoc($result);
}

// Handle update submission
if (isset($_POST['UpdateSchool'])) {
    $id = $_POST['id'];
    $BoardName = $_POST['BoardName'];
    $SchoolName = $_POST['SchoolName'];

    $updateQuery = "UPDATE schools 
                    SET `Board Name` = '$BoardName', `School Name` = '$SchoolName'
                    WHERE id = $id";
    $updated = mysqli_query($connect, $updateQuery);

    if ($updated) {
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update School</title>
</head>
<body>
  <h1>Update School</h1>
  <form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $school['id'] ?>">
    <input type="text" name="BoardName" placeholder="Board Name" value="<?= $school['Board Name'] ?>" required>
    <input type="text" name="SchoolName" placeholder="School Name" value="<?= $school['School Name'] ?>" required>
    <input type="submit" value="Update School" name="UpdateSchool">
  </form>
  <br>
  <a href="index.php">← Back to List</a>
</body>
</html>
