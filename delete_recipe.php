<?php
// Include database connection file
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if recipe ID is provided in the form
    if (isset($_POST['recipe_id']) && !empty($_POST['recipe_id'])) {
        // Sanitize the input to prevent SQL injection
        $recipe_id = mysqli_real_escape_string($conn, $_POST['recipe_id']);
        
        // Delete the recipe from the database
        $sql = "DELETE FROM recipes WHERE id = $recipe_id";

        if (mysqli_query($conn, $sql)) {
            // Redirect to the recipe list page after successful deletion
            header("Location: New-recipes.php");
            exit();
        } else {
            // Handle database delete error
            $error_message = "Error deleting recipe: " . mysqli_error($conn);
        }
    } else {
        // Handle case where no recipe ID is provided in the form
        $error_message = "No recipe ID provided.";
    }
} else {
    // Handle case where form is not submitted via POST
    $error_message = "Invalid request.";
}

// Close database connection
header("Location: New-recipes.php");
mysqli_close($conn);

?>

