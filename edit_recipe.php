<?php

include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['recipe_id']) && !empty($_POST['recipe_id'])) {
        
        $recipe_id = mysqli_real_escape_string($conn, $_POST['recipe_id']);
        
        
        $recipe_name = mysqli_real_escape_string($conn, $_POST['recipe_name']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
        $preparations = mysqli_real_escape_string($conn, $_POST['preparations']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        
        
        $sql = "UPDATE recipes SET 
                recipe_name = '$recipe_name',
                ingredients = '$ingredients',
                preparations = '$preparations',
                location = '$location',
                category = '$category'
                WHERE id = $recipe_id";

        if (mysqli_query($conn, $sql)) {
            
            header("Location: recipe_details.php?id=$recipe_id");
            exit();
        } else {
            
            $error_message = "Error updating recipe: " . mysqli_error($conn);
        }
    } else {
        
        $error_message = "No recipe ID provided.";
    }
}

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
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <!-- Your header content goes here -->
    <a href="New-recipes.php">
        <img src="images/main Logo T.jpeg" height="100" width="200" alt="Logo" class="logo">
    </a>
    
    <nav>
        <!-- Navigation links -->
    </nav>
</header>
<style>
  
  header {
      background-color: #aeaf8f;
      color: white;
      text-align: center;
      padding: 10px 0;
  }
  footer {
            background-color: #aeaf8f;
            padding: 10px;
            text-align: center;
        }

  </style>
<main>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if (isset($recipe)) : ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="recipe_id" value="<?php echo $recipe['id']; ?>">
                        <div class="form-group">
                        <h3>Edit Recipe</h3>
                            <label for="recipe_name">Recipe Name</label>
                            <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="<?php echo $recipe['recipe_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <textarea class="form-control" id="ingredients" name="ingredients"><?php echo $recipe['ingredients']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="preparations">Preparations</label>
                            <textarea class="form-control" id="preparations" name="preparations"><?php echo $recipe['preparations']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="<?php echo $recipe['location']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?php echo $recipe['category']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
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
