<?php include("../path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/users.php'); 
guestOnly();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

        <!-- Custom Style -->
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>

    <body>
       
        <?php include(ROOT_PATH . "/app/includes/header.php") ?>

        <!-- Main Wrapper -->

        <main class="clearfix">

            <!-- Login Authorization Content -->

            <section class="auth-wrapper">
                <h1 class="section-heading">Login</h1>

                <form action="login.php" method="post">
                
                    <?php include(ROOT_PATH .'/app/helpers/errors.php') ?>

                    <div>
                        <label for="username">Username or Email</label><br>
                        <input type="text" name="username" class="text-input" value="<?php echo $username ?>">
                    </div> 

                    <div>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" value="<?php echo $password ?>" class="text-input">
                    </div> 

                    <input type="submit" value="Login" class="btn" name="login-btn">

                    <p>If you don't have an account: <a href=<?php echo BASE_URL . "/authorizations/register.php"?>>Sign Up</a></p>
                    
                </form>

            </section>

            <!-- Login Authorization Content -->

        </main>

        <!-- JQuery -->
        <script src="../assets/js/jquery-3.5.1.js"></script>

        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>

        <!-- Custom Script -->
        <script src="../assets/js/script.js"></script>
    </body>
</html>