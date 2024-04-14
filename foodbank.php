<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Information</title>
    <link rel="stylesheet" href="styles.css"> <!-- Linking external CSS file -->
    <style>
        .image-container img {
            width: 200px;
            height: 300px;
            object-fit: cover; /* Maintain aspect ratio */
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Submitted Information</h1>
    <div class="info">
        <?php if(isset($_GET['recipeName'])): ?>
            <p><strong>Recipe Name:</strong> <?php echo htmlspecialchars($_GET['recipeName']); ?></p>
        <?php endif; ?>
        
        <?php if(isset($_GET['ingredients'])): ?>
            <p><strong>Ingredients:</strong> 
            <?php 
                // Convert ingredients string to array
                $ingredients = explode(',', $_GET['ingredients']);
                foreach($ingredients as $ingredient) {
                    echo "<span>" . htmlspecialchars($ingredient) . "</span><br>";
                }
            ?>
            </p>
        <?php endif; ?>
        
        <?php if(isset($_GET['preparations'])): ?>
            <p><strong>Preparations:</strong> 
            <?php 
                // Convert preparations string to array
                $preparations = explode('.', $_GET['preparations']);
                foreach($preparations as $preparation) {
                    echo "<span>" . htmlspecialchars($preparation) . "</span><br>";
                }
            ?>
            </p>
        <?php endif; ?>
        
        <?php if(isset($_GET['location'])): ?>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($_GET['location']); ?></p>
        <?php endif; ?>
        
        <?php if(isset($_GET['category'])): ?>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($_GET['category']); ?></p>
        <?php endif; ?>

        <?php if(isset($_GET['image'])): ?>
            <div class="image-container">
                <img src="<?php echo $_GET['image']; ?>" alt="Uploaded Image">
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
