<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Designer Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- This is the main header section where I display the title and Add button -->
<div class="header-center">
    <h1>My Design Projects</h1>
    <div class="add-btn-container">
        <a href='create_project.php' class="btn add-btn">Add New Project</a>
    </div>
</div>
<!-- This section will display all my projects in styled cards -->
<div class="projects">
    <?php 
    include ('connect.php');
// This is my SQL query to get data from the projects table and join with types and clients
    $sql = "SELECT 
        dp.id,
        dp.title,
        pt.type_name,
        dp.software,
        dp.date_completed,
        dp.image,
        dp.description,
        c.client_name,
        c.industry
    FROM design_projects dp
    JOIN project_types pt ON dp.type_id = pt.id
    JOIN clients c ON dp.client_id = c.id
    ORDER BY dp.date_completed DESC";

    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

    // Here I'm looping through each row (project)
        while($row = mysqli_fetch_assoc($result)) {
            
            if (!empty($row['image'])) {
                $imagePath = 'images/' . $row['image'];
            } elseif (strpos($title, 'brewing') !== false) {
                $imagePath = 'images/brewing_the_perfect_cup-1.jpg';
            } elseif (strpos($title, 'fittrack') !== false) {
                $imagePath = 'images/Fittrack.jpg';
            } elseif (strpos($title, 'tea') !== false) {
                $imagePath = 'images/Free-Tea-Kraft-Paper-Packaging-Mockup-PSD.webp';
            } elseif (strpos($title, 'portfolio') !== false || strpos($title, 'formpallavi') !== false || strpos($title, 'logo') !== false) {
                $imagePath = 'images/logo.png';
            } elseif (strpos($title, 'art festival') !== false || strpos($title, 'understanding') !== false) {
                $imagePath = 'images/understanding-chalk-art-festivals.jpg';
            } else {
                $imagePath = 'images/logo.png';
            }

             // I'm now outputting the HTML for one project card
            echo "<div class='project'>";
            echo "<img src='$imagePath' alt='" . htmlspecialchars($row['title']) . "'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p><strong>Type:</strong> " . $row['type_name'] . "</p>";
            echo "<p><strong>Software:</strong> " . $row['software'] . "</p>";
            echo "<p><strong>Date:</strong> " . $row['date_completed'] . "</p>";
            echo "<p><strong>Client:</strong> " . $row['client_name'] . " (" . $row['industry'] . ")</p>";
            echo "<p>" . $row['description'] . "</p>";

            // I'm adding edit and delete buttons with project ID in the link
            echo '<div class="project-actions">';
            echo '<a href="update_project.php?id=' . htmlspecialchars($row['id']) . '" class="btn edit-btn">Edit</a>';
            echo '<a href="delete_project.php?id=' . htmlspecialchars($row['id']) . '" class="btn delete-btn" onclick="return confirm(\'Are you sure?\')">Delete</a>';
            echo '</div>';
            echo "</div>";
        }
    } else {
        echo "No projects found.";
    }
 ?>
</div>
</body>
</html>