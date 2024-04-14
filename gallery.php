<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 400px;
            margin-bottom: 20px;
        }

        header, footer {
            text-align: center;
            background-color: white;
            color: tomato;
            padding: 10px 0;
            width: 100%;
            margin-bottom: 20px;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #fefafa;
            color: tomato;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Recipe Upload</h1>
    </header>

    <div class="form-container">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="recipeName" placeholder="Recipe Name" required>
            <textarea name="ingredients" placeholder="Ingredients" required></textarea>
            <textarea name="preparations" placeholder="Preparations" required></textarea>
            <select name="location" required> 
                <option value="" disabled selected>Select Location</option>
                <option value="European Cuisine">European Cuisine</option>
                <option value="African Cuisine">African Cuisine</option>
                <option value="Asian Cuisine">Asian Cuisine</option>
                <option value="American Cuisine">American Cuisine</option>
            </select>
            <select name="category" required> 
                <option value="" disabled selected>Select Category</option>
                <option value="Vegan">Vegan</option>
                <option value="Non-Vegan">Non-Vegan</option>
            </select>
            <input type="file" name="fileInput" accept="image/*" style="margin-bottom: 20px;">
            <button type="submit">Upload Image</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Image Gallery</p>
    </footer>

    <?php
    // Database connection
    $servername = "localhost";
    $dbname = "cmm007";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recipeName = $_POST["recipeName"];
        $ingredients = $_POST["ingredients"];
        $preparations = $_POST["preparations"];
        $location = $_POST["location"];
        $category = $_POST["category"];
        
        // Image upload handling
        $targetDir = "images/"; // Directory where uploaded images will be stored
        $targetFile = $targetDir . basename($_FILES["fileInput"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileInput"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["fileInput"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $targetFile)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileInput"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // Insert data into database
        $sql = "INSERT INTO recipes (recipe_name, ingredients, preparations, location, category, image_path) VALUES (?, ?, ?, ?, ?, ?)";
        
        // Prepare and bind statement
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $recipeName, $ingredients, $preparations, $location, $category, $targetFile);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect to a success page or refresh the page
            header("Location: recipe_upload_success.php");
            exit(); // Make sure nothing else gets executed after redirection
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    mysqli_close($conn);
    ?>
</body>
</html>
