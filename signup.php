<!DOCTYPE html>
<html>

<head>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="...insert" href="/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Registration</title>
    <style>
        body {
            background-image: url('images/Dumplings.jpeg');
            background-color: whitesmoke;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0; 
            padding: 0; 
        }
        header {
            background-color: #aeaf8f;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 20px; 
        }

        .logo {
            display: block;
            margin: 0 auto;
        }
        
        footer {
            background-color: #aeaf8f;
            padding: 10px;
            text-align: center;
            margin-top: 20%; 
        }

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
            margin-bottom: 100px; 
            margin-top: 20px; 
        }

        footer {
            background-color:  #aeaf8f;;
            color: black;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            margin-top: 20%;
        }

        .center {
            text-align: center; 
            margin-top: 20px; 
        }
    </style>
</head>

<body>
<header>
    <a href="Chef dashboard.html">
    <a href="index.php"><img src="images/main Logo T.jpeg" height="100" width="200" alt="Logo" class="logo"></a>
    </a>
</header>
<?php
include 'connection.php';

$fullname = $username = $password = $confirmpassword = $role = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $role = $_POST['role']; 
    echo "Role: " . $role; 

    
    if ($password !== $confirmpassword) {
        echo "Passwords do not match.";
        exit; 
    }

    
    $password = password_hash($password, PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("INSERT INTO users (fullname, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $username, $password, $role); 

    if ($stmt->execute()) {
        echo "<p>signed up successfully</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    header("Location: ./login.php");
}

mysqli_close($conn);
?>


    <div class="container">
        <h4>User Registration</h4>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Full name: <input type="text" name="fullname" placeholder="Enter your full name" value="<?php echo htmlspecialchars($fullname); ?>"><br><br>
    Username: <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>"><br><br>
    Password: <input type="password" name="password" placeholder="Enter a password"><br><br>
    Re-type P: <input type="password" name="confirmpassword" placeholder="Confirm password"><br><br>
    Role: 
    <select name="role">
        <option value="Recipe_seeker">Recipe Seeker</option>
        <option value="cook or chef">Cook/Chef</option>
    </select>
    <div class="center">
        <input type="submit" value="Register">
    </div>
</form>


        <p>Already Registered? <a href="login.php"><i class="fas fa-hand-point-right"></i> Click here to login</a>.</p>
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
