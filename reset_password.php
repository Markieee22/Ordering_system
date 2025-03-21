<?php
include 'components/connect.php';
session_start();

$message = '';

if(isset($_POST['reset_password'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $new_pass = sha1($_POST['password']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);

    // Check if email exists
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if($row){
        // Update password
        $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE email = ?");
        $update_pass->execute([$new_pass, $email]);

        echo "<script>alert('Password updated successfully!'); window.location='login.php';</script>";
        exit();
    } else {
        $message = '⚠️ The email you entered is not registered!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .password-container input {
            flex: 1;
            padding-right: 40px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            cursor: pointer;
            color: gray;
        }
    </style>
</head>
<body>

<section class="form-container">
    <form action="" method="post">
        <h3>Reset Password</h3>
        <input type="email" name="email" required placeholder="Enter your email" class="box">
        <div class="password-container">
            <input type="password" name="password" id="password" required placeholder="Enter new password" class="box">
            <i class="fa fa-eye toggle-password" id="togglePassword"></i>
        </div>
        <?php if($message): ?>
            <p style="color: red; font-size: 14px; margin-top: 5px;"><?php echo $message; ?></p>
        <?php endif; ?>
        <input type="submit" value="Reset Password" name="reset_password" class="btn">
        <p><a href="login.php">Back to Login</a></p>
    </form>
</section>

<!-- Show/Hide Password Script -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        let passwordField = document.getElementById('password');
        let type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
