<?php
// Include database connection file
include 'connection.php';

// Check if recipe ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $recipe_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Retrieve recipe details based on the recipe ID
    $sql = "SELECT * FROM recipes WHERE id = $recipe_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $recipe = mysqli_fetch_assoc($result);
    } else {
        // Handle case where no recipe is found with the provided ID
        $error_message = "Recipe not found.";
    }
} else {
    // Handle case where no recipe ID is provided in the URL
    $error_message = "No recipe ID provided.";
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <!-- Your header content goes here -->
    <h1>Recipe Details</h1>
    <nav>
        <!-- Navigation links -->
    </nav>
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if (isset($recipe)) : ?>
                    <div class="card mb-4 shadow-sm">
                        <img src="<?php echo $recipe['image_path']; ?>" class="card-img-top" alt="<?php echo $recipe['recipe_name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $recipe['recipe_name']; ?></h5>
                            <p class="card-text">Ingredients: <?php echo $recipe['ingredients']; ?></p>
                            <p class="card-text">Preparations: <?php echo $recipe['preparations']; ?></p>
                            <p class="card-text">Location: <?php echo $recipe['location']; ?></p>
                            <p class="card-text">Category: <?php echo $recipe['category']; ?></p>
                            <div class="btn-group" role="group">
                                <a href="edit_recipe.php?id=<?php echo $recipe['id']; ?>" class="btn btn-primary mr-4">Edit</a>
                                <form action="delete_recipe.php" method="POST">
                                 <input type="hidden" name="recipe_id" value="<?php echo $recipe['id']; ?>">
                                 <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <p><?php echo isset($error_message) ? $error_message : 'Recipe details not available.'; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<footer>
    <!-- Your footer content goes here -->
    <p>&copy; 2024 Sugar's Diner. All rights reserved.</p>
</footer>

</body>
</html>
