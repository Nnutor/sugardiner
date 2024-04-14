<?php
// Include database connection file
include 'connection.php';

// Initialize variables for filters
$locationFilter = isset($_GET['location']) ? $_GET['location'] : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

// Retrieve recipes based on filters
$sql = "SELECT * FROM recipes";
if (!empty($locationFilter)) {
    $sql .= " WHERE location = '$locationFilter'";
    if (!empty($categoryFilter)) {
        $sql .= " AND category = '$categoryFilter'";
    }
} elseif (!empty($categoryFilter)) {
    $sql .= " WHERE category = '$categoryFilter'";
}

$result = mysqli_query($conn, $sql);

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <!-- Your header content goes here -->
    <h1>Welcome to Sugar's Diner Recipes</h1>
    <nav>
        <!-- Navigation links -->
    </nav>
</header>

<main>
    <!-- Filtering options -->
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form id="filterForm" action="New-recipes.php" method="get">
                <label for="location">Filter by Location:</label>
                <select id="location" name="location" class="form-control">
                    <option value="">Select Location</option>
                    <option value="European Cuisine">European Cuisine</option>
                    <option value="African Cuisine">African Cuisine</option>
                    <option value="Asian Cuisine">Asian Cuisine</option>
                    <option value="American Cuisine">American Cuisine</option>
                </select>
                <label for="category" class="mt-2">Filter by Category:</label>
                <select id="category" name="category" class="form-control">
                    <option value="">Select Category</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Non-Vegan">Non-Vegan</option>
                </select>
                <button type="button" class="btn btn-primary mt-2" onclick="submitForm()">Apply Filter</button>
            </form>
        </div>
    </div>
</div>


    <!-- Display recipes -->
    <div class="container">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-4">
            <a class="card-link" href="recipe_details.php?id=<?php echo $row['id']; ?>" >
                    <div class="card mb-4 shadow-sm">
                        <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['recipe_name']; ?>">
                        <div class="card-body">
                        

                            <h5 class="card-title"><?php echo $row['recipe_name']; ?></h5>
                            <p class="card-text">Ingredients: <?php echo $row['ingredients']; ?></p>
                            <p class="card-text">Preparations: <?php echo $row['preparations']; ?></p>
                            <p class="card-text">Location: <?php echo $row['location']; ?></p>
                            <p class="card-text">Category: <?php echo $row['category']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>


</main>

<footer>
    <!-- Your footer content goes here -->
    <p>&copy; 2024 Sugar's Diner. All rights reserved.</p>
</footer>

<script>
    function submitForm() {
        document.getElementById("filterForm").submit();
    }
</script>

</body>
</html>
