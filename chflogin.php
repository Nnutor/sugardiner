<?php
include 'connection.php';
session_start();

$error = ''; // Initialize error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a statement to enhance security against SQL injection
    $stmt = $conn->prepare("SELECT * FROM chef WHERE username = ?");
    $stmt->bind_param("s", $username); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $result = $stmt->get_result();
    $chef = $result->fetch_assoc();

    if ($user) {
        // User found, now verify password (Consider using password hashing in your database)
        if ($password == $chef['password']) { // This is a placeholder, replace with password_verify in production
            // Password matches
            // Proceed with login success logic here (e.g., setting session variables)
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Username not found.";
    }
    
    $stmt->close();
}
header("Location: ued.php");
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>UChefslogin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-oZYXeMQb3Wq6+wXbzbdlHQo/3I4wxrFLpFfZBfiokdCe6XvMOU4LsXQstWmuvyUzTLJ90P6Fb+8p7E/dl6G3zw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="...insert" href="/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('images/vb.jpeg');
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

        h4 {
            text-align: center;
            color: black;
        }

        .center {
            text-align: center; /* Center align text for any container */
            margin-top: 20px; /* Optional: adds some space above the button */
        }
    </style>
</head>
<body>

    <div class="navbar">
    <a href="Chef dashboard.html">
    <a href="index.php"><img src="images/main Logo T.jpeg" height="100" width="200" alt="Logo" class="logo"></a>
    </a>
    </div>

    <div class="container">
        <h2>Chef Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Username: <input type="text" name="username"><br><br>
            Password: <input type="password" name="password"><br><br>
            <div class="center">
                <input type="submit" value="Login">
            </div>
        </form>
     
        <p>Don't have an account? <a href="chfreg.php"><i class="fas fa-hand-point-right"></i> Click here to register</a>.</p>
        <?php if (!empty($error)) {
            echo '<p style="color:red;">' . $error . '</p>';
        } ?>
    </div>

    <?php
include 'connection.php';
session_start();

$error = ''; // Initialize error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a statement to enhance security against SQL injection
    $stmt = $conn->prepare("SELECT * FROM chef WHERE username = ?");
    $stmt->bind_param("s", $username); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $result = $stmt->get_result();
    $chef = $result->fetch_assoc();

    if ($chef) {
        // User found, now verify password (Consider using password hashing in your database)
        if ($password == $chef['password']) { // This is a placeholder, replace with password_verify in production
            // Password matches
            // Proceed with login success logic here (e.g., setting session variables)
            $_SESSION['username'] = $username; // Set session variable for logged-in user
            header("Location: ued.php"); // Redirect to the "ued.php" page
            exit(); // Make sure no other content is sent
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Username not found.";
    }
    
    $stmt->close();
}

mysqli_close($conn);
?>


   
    <p>&copy; 2024 Recipes Sugar's Diner. All rights reserved.</p>
    </footer>

</body>
</html>
