<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "mypass";
$database = "musicfy";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        // Both email and password are required
        echo '<script>alert("Both email and password are required."); window.location.href = "login.html";</script>';
    } else {

        // Prepare a SQL query to retrieve user data based on email and password
        $sql = "SELECT * FROM users WHERE Email='$email' AND password='$password'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there is a matching user
        if (mysqli_num_rows($result) == 1) {
            // Fetch user data
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];

            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            // Redirect to the dashboard
            echo '<script>alert("Logged in successfully"); window.location.href = "index.html";</script>';
        } else {
            // Incorrect email or password
            echo '<script>alert("Invalid email or password"); window.location.href = "login.html";</script>';
        }
    }
}

// Close connection
mysqli_close($conn);
?>
