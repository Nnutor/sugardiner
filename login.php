<?php
include 'connection.php';
session_start();

$error = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // User found, now verify password
        if (password_verify($password, $user['password'])) {
            // Password matches
            // Proceed with login success logic here (e.g., setting session variables)
            $_SESSION["user_id"] = $user["uid"];
            $_SESSION["username"] = $user["username"];
            
            // Redirect to index.php after successful login
            header("Location: index.php");
            exit(); // Ensure that script execution stops after the redirection
        } else {
            $error = "Incorrect username or password.";
        }
    } else {
        $error = "Username not found.";
    }
    $stmt->close();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-oZYXeMQb3Wq6+wXbzbdlHQo/3I4wxrFLpFfZBfiokdCe6XvMOU4LsXQstWmuvyUzTLJ90P6Fb+8p7E/dl6G3zw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="...insert" href="/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('images/Dumplings.jpeg');
            background-color: whitesmoke;
            color: black;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #f0e2aa;
            color: brown;
            padding: 10px;
            text-align: center;
            position: absolute;
            width: 100%;
            top: 0;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        footer {
            background-color: #f0e2aa;
            color: black;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: black;
        }

        .center {
            text-align: center; /* Center align text for any container */
            margin-top: 20px; /* Optional: adds some space above the button */
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="index.php">
            <img src="images/main Logo T.jpeg" height="100" width="200" alt="Logo" class="logo">
        </a>
    </div>

    <div class="container">
        <h2>User Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <div class="center">
                <input type="submit" value="Login">
            </div>
        </form>
        <p class="error"><?php echo $error; ?></p>
        <p>Don't have an account? <a href="signup.php"><i class="fas fa-hand-point-right"></i> Click here to register</a>.</p>
    </div>

    <footer>
        <p>Follow us on social media:</p>
        <div class="social-icons">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
        <p>&copy; 2024 Recipes Sugar's Diner. All rights reserved.</p>
    </footer>

</body>
</html>
