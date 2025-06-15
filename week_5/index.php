<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $connect= mysqli_connect('localhost', 'PaulDhawan', 'Paulie@123', 'colorsname');

    if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
    }
    
    $query = 'SELECT * FROM colors';
    $colors = mysqli_query($connect, $query);

    if($colors) {
        foreach($colors as $color){
       echo "<div class='colorsname' style='background-color: {$color['Hex']}; padding:10px; margin:5px; color: white;'>";
        echo htmlspecialchars($color['Name']);
        echo "</div>";
    }
}
    ?>
</body>
</html>