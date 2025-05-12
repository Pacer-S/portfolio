<?php
$conn = mysqli_connect('localhost', 'root', '', 'service_db') or die('Connection failed');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $projectType = mysqli_real_escape_string($conn, $_POST["projectType"]);
    $budget = mysqli_real_escape_string($conn, $_POST["budget"]);

    $query = "INSERT INTO web_development_requests (name, email, project_type, budget) 
              VALUES ('$name', '$email', '$projectType', '$budget')";
        
    if (mysqli_query($conn, $query)) {
        echo "Web development request submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: index.php?success=1");
    exit();  
}
?>
