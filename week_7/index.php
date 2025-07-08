<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1> Toronto Schools </h1>
    <?php 
    
    include('connect.php');

    $query = 'SELECT * FROM schools';
    $schools = mysqli_query($connect, $query);

    //echo '<pre>' . print_r($schools) . '<pre>';

    foreach($schools as $school){
        echo '<div class="Card">';
        echo '<h4>' . $school['School Name'] . '</h4>';
        echo '<p>' . $school['Board Name'] . '</p>';
        echo '<form action="update.php" method="GET">
        <input type="hidden" name="id" value="' . $school['id'] . '">
        <input type="submit" value="EDIT">
        </form>';
        echo '<form action="delete.php" method="GET">
        <input type="hidden" name="id" value="' . $school['id'] . '">
        <input type="submit" value="DELETE">  
      </form>';
        echo '</div>';
        echo '</div>';
    }


 ?>
</body>
</html>