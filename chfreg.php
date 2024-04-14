<!DOCTYPE html>
<html>

<head>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="...insert" href="/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Chef Registration</title>
    <style>
        body {
            background-image: url('images/Strawberry.jpeg');
            background-color: whitesmoke;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }
        header {
            background-color: #aeaf8f;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 20px; /* Add margin to create space */
        }

        .logo {
            display: block;
            margin: 0 auto;
        }
        /* Footer styles */
        

        .fa-facebook {
            background: #14171c;
            color: white;
        }

        .fa-twitter {
            background: #0a0a0b;
            color: white;
        }

        .fa-instagram {
            background: #0d0e0f;
            color: white;
        }

        .navbar {
            background-color: #f0e2aa;
            color: black;
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
            margin-bottom: 100px; /* Add margin to create space */
            margin-top: 20px; /* Add margin to create space */
        }

        footer {
            background-color:  #aeaf8f;;
            color: black;
            text-align: center;
            padding: 50px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            margin-top: 20%;
        }

        .center {
            text-align: center; /* Center align text for any container */
            margin-top: 20px; /* Optional: adds some space above the button */
        }
    </style>
</head>

<body>
<header>
    <a href="Chef dashboard.html">
        <img src="images/main Logo T.jpeg" height="100" width="200" alt="Logo" class="logo">
    </a>
</header>
<?php
include 'connection.php';

$fullname = $username = $password = $confirmpassword = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if passwords match
    if ($password !== $confirmpassword) {
        echo "Passwords do not match.";
        exit; // Stop execution if passwords don't match
    }

    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Using prepared statements to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO chef (fullname, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $username, $password);

    if ($stmt->execute()) {
        // Redirect to the "ued" page
        header("Location: ued.php");
        exit(); // Make sure no other content is sent
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($conn);
?>
    ?>

    <div class="container">
    <h4>Chef Registration</h4>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Full name: <input type="text" name="fullname" placeholder="Enter your full name" value="<?php echo htmlspecialchars($fullname); ?>" required><br><br>
        Username: <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required><br><br>
        Password: <input type="password" name="password" placeholder="Enter a password" required><br><br>
        Re-type P: <input type="password" name="confirmpassword" placeholder="Confirm password" required><br><br>
        <div class="center">
            <input type="submit" value="Register">
        </div>
    </form>

    <p>Already Registered? <a href="chflogin.php"><i class="fas fa-hand-point-right"></i> Click here to login</a>.</p>

</div>

</body>

</html>
