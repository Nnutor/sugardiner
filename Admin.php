<?php

include_once('db_connection.php');


function deleteRecipe($recipe_id) {
    global $conn;
    $sql = "DELETE FROM recipes WHERE recipe_id = $recipe_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


function editRecipe($recipe_id, $new_recipe_data) {
    global $conn;
    
    $recipe_name = $new_recipe_data['recipe_name'];
    $instructions = $new_recipe_data['instructions'];
    

    $sql = "UPDATE recipes SET recipe_name='$recipe_name', instructions='$instructions' WHERE recipe_id=$recipe_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


function deleteChef($chef_id) {
    global $conn;
    $sql = "DELETE FROM chefs WHERE chef_id = $chef_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


function editChef($chef_id, $new_chef_data) {
    global $conn;
    
    $chef_name = $new_chef_data['chef_name'];
    $bio = $new_chef_data['bio'];
    

    $sql = "UPDATE chefs SET chef_name='$chef_name', bio='$bio' WHERE chef_id=$chef_id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
