<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['building'].', '.$_POST['street'].', '. $_POST['city'] .', '. $_POST['country'] .' - '. $_POST['zip_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'Address saved!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update address</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Your address</h3>
      <input type="text" class="box" placeholder="Building no." required maxlength="50" name="building">
      <input type="text" class="box" placeholder="Street Address" required maxlength="50" name="street">
      <input type="text" class="box" placeholder="City" required maxlength="50" name="city">
      <input type="text" class="box" placeholder="Country" required maxlength="50" name="country">
      <input type="number" class="box" placeholder="Zip code" required max="999999" min="0" maxlength="6" name="zip_code">
      <input type="submit" value="save address" name="submit" class="btn">
   </form>

</section>









<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>