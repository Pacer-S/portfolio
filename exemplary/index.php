<?php

$conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protus Portfolio</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- aos css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>


<?php

if(isset($message)){
    foreach($message as $msg){
        echo '
        <div class="message" data-aos="zoom-out">
            <span>'.$msg.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}


?>

<!-- header section starts -->
<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="#home" class="logo">Portfolio</a>

    <nav class="navbar">
        <a href="#home" class="active">home</a>
        <a href="#about">about</a>
        <a href="#services">services</a>
        <a href="#portfolio">portfolio</a>
        <a href="#contact">contact</a>
        <a href="service options.php">service options</a>
    </nav>

    <div class="follow">
        <a href="https://www.facebook.com/share/18MHgtAnya/" class="fab fa-facebook-f"></a>
        <a href="https://www.instagram.com/_.protus___/profilecard/?igsh=MW94NnRqaGdveDR4eQ==" class="fab fa-instagram"></a>
        <a href="https://ke.linkedin.com/in/protus-sang-8002b0277" class="fab fa-linkedin"></a>
        <a href="https://github.com/Pacer-S" class="fab fa-github"></a>
    </div>

</header>
<!-- header section ends -->

<!-- home section starts -->

<section class="home" id="home">

    <div class="image" data-aos="fade-right">
        <img src="./images/profile.jpeg" alt="">
    </div>

    <div class="content">
        <h3 data-aos="fade-up">Hi, I am Protus Sang'</h3>
        <span data-aos="fade-up">Web designer and developer</span>
        <p data-aos="fade-up">As a passionate and forward-thinking web designer and developer, I specialize <br> in blending aesthetic beauty with seamless functionality. <br> I’m dedicated to creating visually captivating, user-centric websites that not <br> only engage audiences but also deliver impactful results. <br> With an eye for design and a love for innovation, I bring every <br> project to life with a perfect balance of <br> creativity and technical expertise. </p>
        <a data-aos="fade-up" href="#about" class="btn">about me</a>
    </div>

</section>

<!-- !home section ends -->

<!-- about section starts -->

<section class="about" id="about">
    <h1 class="heading" data-aos="fade-up"> <span>biography</span></h1>

    <div class="biography">
        <p data-aos="fade-up">Passionate full-stack developer with expertise in front-end and back-end technologies. Skilled in HTML, CSS, JavaScript, PHP, Node.js, and databases. Experienced in creating responsive, user-friendly applications and solving complex technical challenges, ensuring seamless integration and performance.</p>

        <div class="bio">
            <h3 data-aos="zoom-in"> <span>name : </span> Protus Sang' </h3>
            <h3 data-aos="zoom-in"> <span>email : </span> pnkiprotich@gmail.com </h3>
            <h3 data-aos="zoom-in"> <span>address : </span> Nairobi, Kenya </h3>
            <h3 data-aos="zoom-in"> <span>phone : </span> +254-714-499-119 </h3>
            <h3 data-aos="zoom-in"> <span>age : </span> 26 years </h3>
            <h3 data-aos="zoom-in"> <span>experience : </span> 2+ years </h3>
        </div>

        <a href="./files/PROTUS CV.pdf" class="btn" data-aos="fade-up">download CV</a>

    </div>

    <div class="skills" data-aos="fade-up">

        <h1 class="heading"> <span>skills</span> </h1>

        <div class="progress">
            <div class="bar" data-aos="fade-left"> <h3><span>HTML</span> <span>95%</span></h3> </div>
            <div class="bar" data-aos="fade-right"> <h3><span>CSS</span> <span>80%</span></h3> </div>
            <div class="bar" data-aos="fade-left"> <h3><span>JavaScript</span> <span>65%</span></h3> </div>
            <div class="bar" data-aos="fade-right"> <h3><span>PHP</span> <span>75%</span></h3> </div>
        </div>
    </div>

    <div class="edu-exp">

        <h1 class="heading" data-aos="fade-up"> <span>education & experience</span> </h1>

        <div class="row">

            <div class="box-container">

                <h3 class="title" data-aos="fade-right">education</h3>

                <div class="box" data-aos="fade-right">
                    <span>( 2020 - 2021 )</span>
                    <h3>web designer</h3>
                    <p>Creative web designer crafting captivating digital experiences with innovative design and user-centric solutions</p>
                </div>

                <div class="box" data-aos="fade-right">
                    <span>( 2021 - 2022 )</span>
                    <h3>web developer</h3>
                    <p>Skilled web developer building robust, scalable solutions with expertise in programming languages and cutting-edge technologies</p>
                </div>

                <div class="box" data-aos="fade-right">
                    <span>( 2021 - 2022 )</span>
                    <h3>graphic designer</h3>
                    <p>Visionary graphic designer crafting compelling visuals to tell stories and elevate brands with creative expertise</p>
                </div>

                <div class="box-container">

                    <h3 class="title" data-aos="fade-left">experience</h3>

                    <div class="box" data-aos="fade-left">
                        <span>( 2021 - present )</span>
                        <h3>front-end developer</h3>
                        <p>Seasoned front-end developer proficient in creating responsive, user-friendly interfaces with expertise in modern web technologies</p>
                    </div>

                    <div class="box" data-aos="fade-left">
                        <span>( 2022 - present )</span>
                        <h3>back-end developer</h3>
                        <p>Experienced back-end developer adept at building scalable, efficient systems with expertise in database management and server-side technologies.</p>
                    </div>

                    <div class="box" data-aos="fade-left">
                        <span>( 2022 - present )</span>
                        <h3>full stack developer</h3>
                        <p>Versatile full-stack developer proficient in frontend and backend technologies, adept at delivering end-to-end web solutions.</p>
                    </div>    

            </div>

        </div>

    </div>

</section>

<!-- !about section ends -->

<!-- services section starts -->

<section class="services" id="services">

    <h1 class="heading" data-aos="fade-up"> <span>services</span></h1>

    <div class="box-container">

        <div class="box" data-aos="zoom-in">
            <i class="fas fa-code"></i>
            <h3>web development</h3>
            <p>I provide comprehensive web development services, delivering tailored solutions to meet your digital needs effectively</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <i class="fas fa-paint-brush"></i>
            <h3>graphic design</h3>
            <p>I offer professional graphic design services, delivering captivating visuals to enhance your brand's identity and communication</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <i class="fas fa-bullhorn"></i>
            <h3>digital marketing</h3>
            <p>I specialize in digital marketing services, leveraging strategies to boost online presence and drive business growth.</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <i class="fab fa-bootstrap"></i>
            <h3>bootstrap</h3>
            <p>I provide Bootstrap development services, leveraging its framework for responsive and modern web solutions.</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <i class="fab fa-wordpress"></i>
            <h3>wordpress</h3>
            <p>I offer WordPress development services, creating customized websites with flexibility and user-friendly content management.</p>
        </div>

    </div>
          

</section>

<!-- !services section ends -->

<!-- portfolio section starts -->

<section class="portfolio" id="portfolio">
    
    <h1 class ="heading" data-aos="fade-up"> <span>portfolio</span></h1>

    <div class="box-container">

        <div class="box" data-aos="zoom-in">
            <img src="./images/development.webp" alt="">
            <h3>web development</h3>
            <span>( 2021 - present )</span>
        </div>

        <div class="box" data-aos="zoom-in">
            <img src="./images/graphic.avif" alt="">
            <h3>graphic design</h3>
            <span>( 2021 - 2024 )</span>
        </div>

        <div class="box" data-aos="zoom-in">
            <img src="./images/marketing.avif" alt="">
            <h3>digital marketing</h3>
            <span>( 2021 - 2023 )</span>
        </div>

        <div class="box" data-aos="zoom-in">
            <img src="./images/bootstrap.jpg" alt="">
            <h3>bootstrap</h3>
            <span>( 2021 - 2025 )</span>
        </div>

        <div class="box" data-aos="zoom-in">
            <img src="./images/wordpress.jpg" alt="">
            <h3>wordpress</h3>
            <span>( 2021 - 2025 )</span>
        </div>

    </div>

</section>

<!-- !portfolio section ends -->

<!-- contact section starts -->

<section class="contact" id="contact">

    <h1 class="heading" data-aos="fade-up"> <span>contact me</span> </h1>

    <form action="" method="post">
        <div class="flex">
            <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
            <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box" required>
        </div>    
        <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required>
        <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
        <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
    </form>

    <div class="box-container">

        <div class="box" data-aos="zoom-in">
            <i class="fas fa-phone"></i>
            <h3>phone</h3>
            <p>+254-714-499-119</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <i class="fas fa-envelope"></i>
            <h3>email</h3>
            <p>pnkiprotich@gmail.com</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <i class="fas fa-map-marker-alt"></i>
            <h3>address</h3>
            <p>Nairobi, Kenya - 00100</p>
        </div>

    

</section>

<!-- !contact section ends -->

<div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>Protus Sang'</span></div>






















<!--- custom js file link --->
<script src="script.js"></script>

<!-- aos js link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
<script>

    AOS.init({
        duration:800,
        delay:300
    });

</script>    

</body>
</html>

