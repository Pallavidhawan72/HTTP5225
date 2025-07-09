<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quirky Zoo & Magic Number Game</title>
</head>
<body>

<h2>Challenge 1: Quirky Zoo Feeding Schedule</h2>

<?php
// Simulate current hour (1 to 23)
$currentHour = rand(1, 23);

// Initialize variables
$meal = "";
$food = "";

// Check feeding time and assign meal/food
if ($currentHour >= 5 && $currentHour < 9) {
    $meal = "Breakfast";
    $food = "Bananas, Apples, and Oats";
} elseif ($currentHour >= 12 && $currentHour < 14) {
    $meal = "Lunch";
    $food = "Fish, Chicken, and Vegetables";
} elseif ($currentHour >= 19 && $currentHour < 21) {
    $meal = "Dinner";
    $food = "Steak, Carrots, and Broccoli";
} else {
    $meal = "No Feeding Time";
    $food = "The animals are not being fed right now.";
}

// Output result
echo "Current Time (Hour): $currentHour<br>";
echo "Meal: $meal<br>";
echo "Food: $food<br>";
?>

<hr>

<h2>Challenge 2: Magic Number Game</h2>

<?php
// Simulating user input number (1 to 1000)
$number = rand(1, 1000);

// Determine magic number
if ($number % 3 == 0 && $number % 5 == 0) {
    $magic = "FizzBuzz";
} elseif ($number % 3 == 0) {
    $magic = "Fizz";
} elseif ($number % 5 == 0) {
    $magic = "Buzz";
} else {
    $magic = $number;
}

// Output result
echo "Input Number: $number<br>";
echo "Magic Number: $magic<br>";
?>

</body>
</html>
