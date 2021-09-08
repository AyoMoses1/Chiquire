<?php include("path.php"); ?>

<?php include(ROOT_PATH . '/app/controllers/users.php'); 
guestOnly();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

        <!-- Custom Style -->
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body>
        
        <?php include(ROOT_PATH . "/app/includes/header.php") ?>

        <!-- Main Wrapper -->

        <main class="clearfix">

            <!-- Login Authorization Content -->
            
            <section class="auth-wrapper">
                <h1 class="section-heading">Register</h1>

                <?php include(ROOT_PATH .'/app/helpers/errors.php') ?>

                <form action="register.php" method="post" class="register">

                    <div>
                        <label for="username">Username</label><br>
                        <input type="text" name="username" class="text-input" value="<?php echo htmlspecialchars($username) ?>">
                    </div> 

                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" class="text-input" value='<?php echo htmlspecialchars($email) ?>'>
                    </div>

                    <div>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" class="text-input">
                    </div> 

                    <div>
                        <label for="password-retype">Retype Password</label><br>
                        <input type="password" name="password-retype" class="text-input">
                    </div>

                    <input type="submit" value="Register" class="btn" name="register-btn">

                    <p>or <a href=<?php echo BASE_URL . "/login.php"?>>Login</a></p>
                    
                </form>

            </section>

            <!-- Login Authorization Content -->

        </main>

        <!-- JQuery -->
        <script src="assets/js/jquery-3.5.1.js"></script>

        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>

        <!-- Custom Script -->
        <script src="assets/js/script.js"></script>

    </body>
</html>