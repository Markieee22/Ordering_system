<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>𝐅𝐫𝐮𝐢𝐭 𝐒𝐨𝐝𝐚</span>
               <h3>Ocean Blue</h3>
               <a href="menu.php" class="btn">See menus</a>
            </div>
            <div class="image">
               <img src="images/hehe.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>𝐌𝐢𝐥𝐤𝐭𝐞𝐚</span>
               <h3>Dark Chocolate</h3>
               <a href="menu.php" class="btn">See menus</a>
            </div>
            <div class="image">
               <img src="images/haha.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>𝐈𝐜𝐞𝐝 𝐂𝐨𝐟𝐟𝐞𝐞</span>
               <h3>Macchiato</h3>
               <a href="menu.php" class="btn">See menus</a>
            </div>
            <div class="image">
               <img src="images/he.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">Food category</h1>

   <div class="box-container">

      <a href="category.php?category=fast food" class="box">
         <img src="images/cons.png" alt="">
         <h3>𝗙𝗮𝘀𝘁 𝗙𝗼𝗼𝗱</h3>
      </a>

      <a href="category.php?category=drinks" class="box">
         <img src="images/icon.png" alt="">
         <h3>𝗗𝗿𝗶𝗻𝗸𝘀</h3>
      </a>

   </div>

</section>

<div class="loader">
   <img src="images/loader.gif" alt="">
</div>



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>