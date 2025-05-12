<?php
$conn = mysqli_connect('localhost', 'root', '', 'service_db') or die('Connection failed');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $design_type = mysqli_real_escape_string($conn, $_POST["designType"]);
    $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);

    $query = "INSERT INTO graphic_design_requests (name, email, design_type, deadline) 
              VALUES ('$name', '$email', '$design_type', '$deadline')";

    if (mysqli_query($conn, $query)) {
        echo "Graphic design request submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: index.php?success=1");
    exit();  
}
?>
