<html>
<body>

<?php
include ('connection.php');

// Check if recipe_name is set in $_POST
if(isset($_POST['recipe_name'])) {
    $recipe_name = $_POST['recipe_name'];
    $sql = "SELECT * FROM recipes  WHERE recipe_name='$recipe_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $name = $row["name"];
        $recipe_name = $row["recipe_name"];
        $category = $row["category"];
        $ingredients = $row["ingredients"];
        $preparations = $row["preparations"];

        echo "
            <form method='post' action='updateRecipe.php'>
                <label>Chef Name:</label>
                <input type='text' name='name' value='$name'/><br><br>
                <label>Category:&nbsp;&nbsp;</label>
                <input type='text' name='category' value='$category'/> <br><br>
                <label>Recipe Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type='text' name='recipe_name' value='$recipe_name'/> <br><br>
                <label>Ingredients:&nbsp;&nbsp;&nbsp;</label>
                <textarea name='ingredients' id='ingredients' rows='5' cols='100'>$ingredients</textarea><br><br>
                <label>Preparations:&nbsp;&nbsp;&nbsp;</label>
                <textarea name='preparations' id='preparations' rows='10' cols='100'>$preparations</textarea><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <input type='submit' name='submit' value='Submit' />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type='button' value='Reset' />
            </form>";
    } else {
        echo "Recipe Not Found";
    }
} else {
    echo "Recipe name not provided.";
}

$conn->close();
?>

</body>
</html>
