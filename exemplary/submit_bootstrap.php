<?php
$conn = mysqli_connect('localhost', 'root', '', 'service_db') or die('Connection failed');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $websiteUrl = mysqli_real_escape_string($conn, $_POST["websiteUrl"]);
    $keywords = mysqli_real_escape_string($conn, $_POST["keywords"]);

    $query = "INSERT INTO bootstrap_requests (name, email, websiteUrl, keywords) 
              VALUES ('$name', '$email', '$websiteUrl', '$keywords')";

    if (mysqli_query($conn, $query)) {
        echo "Bootstrap service request submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: index.php?success=1");
    exit();  
}
?>
