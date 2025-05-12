<?php

$conn = mysqli_connect('localhost','root','','service_db') or die('connection failed');

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already!';
    }else{
        mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES ('$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- aos css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
 
<title>Service Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 70px;
        }
        .button-container {
            margin-bottom: 20px;
        }
        .service-button {
            margin: 20px;
            padding: 15px 25px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .service-button:hover {
            background-color: #45a049;
        }
        .form-container {
            margin-top: 50px;
        }
        .form-container form {
            margin-bottom: 50px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            background-color: aqua;
            border: 2px solid black;
        }
        .navbar {
            list-style-type: none;
            font-size: 35px;
            margin: 0px;
            padding: 0px;
            overflow: hidden;        
        }
        li {
            float: left;
        }
        li a {
            display: block;
            padding: 8px;
            background-color: #dddddd;
            color: crimson;
            cursor: pointer;
        }

        li a:hover {
            background-color: #111;
        }
        h1 {
            margin: 10px;
            padding: 10px 15px;
            font-size: 45px;
            text-decoration: underline;
        }
        button {
            background-color: crimson;
            border: none;
            color: #111;
            padding: 16px 32px;
            cursor: pointer;
            margin: 4px 2px;
            font-size: 20px;
        }
        h2 {
            font-size: 25px;
        }
        label {
            font-size: 20px;
        }
        input {
            font-size: 15px;
        }

    </style>
</head>
<body>


<nav class="navbar">
        <li><a href="index.php" class="active">home</a></li>
        <li><a href="index.php">about</a></li>
        <li><a href="index.php">services</a></li>
        <li><a href="index.php">portfolio</a></li>
        <li><a href="index.php">contact</a></li> 
</nav>







    <h1>Our Services</h1>
    <div class="button-container">
        <!-- Buttons for services -->
        <button class="service-button" onclick="generateForm('webDevelopment')">Web Development</button>
        <button class="service-button" onclick="generateForm('graphicDesign')">Graphic Design</button>
        <button class="service-button" onclick="generateForm('digitalMarketing')">Digital Marketing</button>
        <button class="service-button" onclick="generateForm('bootstrap')">Bootstrap</button>
        <button class="service-button" onclick="generateForm('wordpress')">Wordpress</button>
    </div>

    <!-- Container where forms will be generated -->
    <div class="form-container" id="formContainer"></div>

    <script>
        function generateForm(service) {
            let formHTML = '';

            if (service === 'webDevelopment') {
                formHTML = `
                    <h2>Web Development Service</h2>
                    <form action="submit_webdev.php" method="POST">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                        
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="projectType">Type of Project</label>
                        <input type="text" id="projectType" name="projectType" required>
                        
                        <label for="budget">Estimated Budget</label>
                        <input type="number" id="budget" name="budget" required>
                        
                        <button type="submit">Submit</button>
                    </form>
                `;
            } else if (service === 'graphicDesign') {
                formHTML = `
                    <h2>Graphic Design Service</h2>
                    <form action="submit_graphic.php" method="POST">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                        
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="designType">Type of Design</label>
                        <input type="text" id="designType" name="designType" required>
                        
                        <label for="deadline">Deadline</label>
                        <input type="date" id="deadline" name="deadline" required>
                        
                        <button type="submit">Submit</button>
                    </form>
                `;
            } else if (service === 'digitalMarketing') {
                formHTML = `
                    <h2>Digital Marketing Service</h2>
                    <form action="submit_marketing.php" method="POST">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                        
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="websiteUrl">Website URL</label>
                        <input type="url" id="websiteUrl" name="websiteUrl" required>
                        
                        <label for="keywords">Keywords to Target</label>
                        <input type="text" id="keywords" name="keywords" required>
                        
                        <button type="submit">Submit</button>
                    </form>
                `;
            } else if (service === 'bootstrap') {
                formHTML = `
                    <h2>Bootstrap Service</h2>
                    <form action="submit_bootstrap.php" method="POST">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                        
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="websiteUrl">Website URL</label>
                        <input type="url" id="websiteUrl" name="websiteUrl" required>
                        
                        <label for="keywords">Keywords to Target</label>
                        <input type="text" id="keywords" name="keywords" required>
                        
                        <button type="submit">Submit</button>
                    </form>
                `;
            } else if (service === 'wordpress') {
                formHTML = `
                    <h2>Wordpress Service</h2>
                    <form action="submit_wordpress.php" method="POST">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                        
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="websiteUrl">Website URL</label>
                        <input type="url" id="websiteUrl" name="websiteUrl" required>
                        
                        <label for="keywords">Keywords to Target</label>
                        <input type="text" id="keywords" name="keywords" required>
                        
                        <button type="submit">Submit</button>
                    </form>
                `;    
            }

            // Insert the form HTML into the form container
            document.getElementById('formContainer').innerHTML = formHTML;
        }
    </script>

</body>
</html>
