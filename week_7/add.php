<?php
if (isset($_POST['AddSchool'])) {
    $BoardName = $_POST['BoardName'];
    $SchoolName = $_POST['SchoolName'];

    require('connect.php');
    $query = "INSERT INTO schools (`Board Name`, `School Name`) VALUES ('$BoardName', '$SchoolName')";
    $school = mysqli_query($connect, $query);

    if ($school) {
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add School</title>
</head>
<body>
  <h1>Add a School</h1>
  <form action="add.php" method="POST">
    <input type="text" name="BoardName" placeholder="Board Name" required>
    <input type="text" name="SchoolName" placeholder="School Name" required>
    <input type="submit" value="Add School" name="AddSchool">
  </form>
  <br>
  <a href="index.php">← Back to List</a>
</body>
</html>
