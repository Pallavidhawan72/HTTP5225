<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week2</title>
</head>
<body>

<!--// NOTES - 1. In php you cannot ignore the ";"
// 2. Echo will take any tags so you can add headings or paragraph -->
<?php 

    echo "<h1>Hey I'm Pallavi Dhawan </h1>"; 
    echo "<p> I study Web Development </p>";
?>

<!--// Learning variables 
. is used for concating instead of + -->
<?php 

    $fname = "Pallavi";
    $lname = "Dhawan";

    echo "Hello " . "$fname " . "$lname";
?>

<?php 
    $myfriends = array('Narinder', 'Chait', 'Raman');

?>
</body>
</html>