<?php
$db = mysqli_connect("localhost", "root", "", "onlinevotingsystem") or die("Connectivity Failed");

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($db, $_POST['name']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
   $number = mysqli_real_escape_string($db, $_POST['number']);
   $msg = mysqli_real_escape_string($db, $_POST['message']);

   $select_message = mysqli_query($db, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($db, "INSERT INTO `message`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ONLINE VOTING SYSTEM</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="index.css">



</head>
<body>
   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">Online<span>Voting</span></a>

         <nav class="nav">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="#contactform">contact</a>

         </nav>
         <a href="login.php" class="link-btn">Login</a>
      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="homesection" id="home">

   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content t ext-center text-md-left">
            <h3>“Voting is the expression of our commitment to ourselves, one another, this country, and this world.” </h3>
            <p>
            "Our political leaders will know our priorities only if we tell them, again and again, and if those priorities begin to show up in the polls."
            </p>
            <a href="login.php" class="link-btn">Let's Perform our Rights</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="assets/images/1.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>
            <h3> What is an online voting system?</h3>
            <p> 
 An online voting system is a software platform that allows groups to securely conduct votes and elections. High-quality online voting systems balance ballot security, accessibility, and the overall requirements of an organization's voting event.
 
 At their core, online voting systems protect the integrity of your vote by preventing voters from being able to vote multiple times. As a digital platform, they eliminate the need to gather in-person, cast votes using paper, or by any other means (e.g. email, insecure survey software).
 
 You may hear an online voting system being referred to as an online election system, an online e voting system, or electronic voting. These all make reference to the same thing: a secure voting tool that allows your group to collect input from your group and closely scrutinize the results in real time.
</p>
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->
<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
        <div>
         <img src="https://images.unsplash.com/photo-1588702547919-26089e690ecc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"alt="">
        </div>
         <h3>User Registration</h3>
         <p>Online e-voting systems typically require users to register by creating an account. This process involves verifying the identity and eligibility of voters to ensure the integrity of the voting process.</p>
      </div>

      <div class="box">
         <img src="https://media.istockphoto.com/id/1410931194/photo/2fa-increases-the-security-of-your-account-two-factor-authentication-digital-screen.jpg?s=2048x2048&w=is&k=20&c=-1VtPb4-0HICTzooxJJU0lGes57D2MJolPplz6Wq4S8=" alt="">
         <h3>Secure Authentication </h3>
         <p>Strong authentication measures are employed to verify the identity of voters before they can access the online voting platform.</p>
      </div>

      <div class="box">
         <img src="assets/images/3.jpg" alt="">
         <h3>Ballot Creation
         </h3>
         <p>The system allows election administrators to create digital ballots that accurately represent the choices available to voters. </p>
      </div>

      <div class="box">
         <img src="https://images.unsplash.com/photo-1604872441539-ef1db9b25f92?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80" alt="">
         <h3>Voter Education</h3>
         <p>Online e-voting platforms can provide information and resources to educate voters about the candidates, issues, and voting process.</p>
      </div>

      <div class="box">
         <img src="assets/images/2.jpg" alt="">
         <h3>Vote Casting
         </h3>
         <p>Registered voters can securely access the online platform during the designated voting period and cast their votes electronically.</p>
      </div>

      <div class="box">
         <img src="assets/images/5.jpg" alt="">
         <h3>Auditing and Verification</h3>
         <p>To ensure transparency and accountability, online e-voting systems often include features for auditing and verification.</p>
      </div>

   </div>

</section>

<!-- services section ends -->






<!-- contact section starts -->

<section class="contact" id="contactform">

   <h1 class="heading" data-aos="fade-up"> <span>contact me</span> </h1>

   <form action="" method="post">
      <div class="flex">
         <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
         <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box" required>
      </div>
      <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required>
      <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" data-aos="zoom-in" value="send message" name="send" class="link-btn">
   </form>
</section>
<!-- contact section end -->


<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>+977-986*******</p>
         <p>+977-97********</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p>Kathmandu , 064000</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>00:07am to 5:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>  Email address</h3>
         <p>onlinevoting.gov.np@gmail.com</p>
         <p>voting.gov.np@gmail.com</p>
      </div>

   </div>

   <div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span class="online">Online</span><span>Voting</span>  </div>

</section>

<!-- footer section ends -->


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>