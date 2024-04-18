<?php
// Include database connection file
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the review field is not empty
    if (!empty($_POST['review'])) {
        // Sanitize the input to prevent SQL injection
        $review = mysqli_real_escape_string($conn, $_POST['review']);

        // Insert the review into the database
        $sql = "INSERT INTO reviews (review_text) VALUES ('$review')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Review submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Review field is empty!";
    }
} else {
    echo "Form submission method is not POST!";
}

// Close database connection
mysqli_close($conn);
?>
