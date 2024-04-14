<?php
// Include database connection
include_once('db_connection.php');

// Function to delete a recipe by ID
function deleteRecipe($recipe_id) {
    global $conn;
    $sql = "DELETE FROM recipes WHERE recipe_id = $recipe_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to edit a recipe
function editRecipe($recipe_id, $new_recipe_data) {
    global $conn;
    // Assuming $new_recipe_data is an array containing updated recipe information
    $recipe_name = $new_recipe_data['recipe_name'];
    $instructions = $new_recipe_data['instructions'];
    // Add more fields as needed

    $sql = "UPDATE recipes SET recipe_name='$recipe_name', instructions='$instructions' WHERE recipe_id=$recipe_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a chef by ID
function deleteChef($chef_id) {
    global $conn;
    $sql = "DELETE FROM chefs WHERE chef_id = $chef_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to edit a chef
function editChef($chef_id, $new_chef_data) {
    global $conn;
    // Assuming $new_chef_data is an array containing updated chef information
    $chef_name = $new_chef_data['chef_name'];
    $bio = $new_chef_data['bio'];
    // Add more fields as needed

    $sql = "UPDATE chefs SET chef_name='$chef_name', bio='$bio' WHERE chef_id=$chef_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
