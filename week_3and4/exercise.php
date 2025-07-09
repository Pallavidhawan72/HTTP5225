<?php
// Function to get users from API
function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

// Get users
$users = getUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
</head>
<body>

<h2>Users</h2>

<?php
// Loop through users using for loop
for ($i = 0; $i < count($users); $i++) {
    echo "Name: " . $users[$i]['name'] . "<br>";
    echo "Email: " . $users[$i]['email'] . "<br><br>";
}
?>

</body>
</html>
