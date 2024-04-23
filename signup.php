<?php
echo "Welcome to the database";

$servername = "localhost";
$username = "root";
$password = "mypass";
$database = "musicfy";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was successful";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['Email']; // Changed to match the HTML input name
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, Email, password) 
            VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<br>Record inserted successfully!";
        
        // Set session variables
        //session_start();
        //$_SESSION['loggedin'] = true; // Set a session variable to indicate login status
        //$_SESSION['username'] = $username; // Set the username in session
        //$_SESSION['email'] = $email; // Set the email in session
        
        // Redirect to the dashboard with username and email as query parameters
        //header("Location: user_dashboard.php?username=" . urlencode($username) . "&email=" . urlencode($email));
        //exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>