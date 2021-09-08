<?php include("../path.php"); ?>

<?php include(ROOT_PATH . '/app/controllers/users.php'); 
guestOnly();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>

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
                <h1 class="section-heading">Register</h1>

                <?php include(ROOT_PATH .'/app/helpers/errors.php') ?>
                <h4 class="sent-notification"></h4>

                <form method="post" class="register" id="emailForm">
                    <div>
                        <label for="name">Name</label><br>
                        <input type="text" name="name" class="text-input" id="name">
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input id="email" type="email" name="email" class="text-input" value='<?php echo htmlspecialchars('email') ?>'>
                    </div>
                    
                    <div>
                        <label for="subject">Subject</label> <br>
                        <select id="subject" name="subject" class="text-input subject-input">
                            <option value=""></option>
                            <option value="Advertise">Feedback</option>
                            <option value="Advertise">Advertise</option>
                            <option value="Advertise">Become a writer</option>
                        </select>
                    </div>
                    
                    <div>
                        <textarea name="message" rows="4" id="message" class="text-input message" placeholder="Your message..."></textarea>
                    </div>

                    <button type="submit" class="btn" name="send-btn" onclick="sendEmail()" value="Send an Email">Send</button>
                    

                    
                </form>

            </section>

            <!-- Login Authorization Content -->

        </main>

        <!-- JQuery -->
        <script src="../assets/js/jquery-3.5.1.js"></script>
        
        <script type="text/javascript">
        </script>
        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>

        <!-- Custom Script -->
        <script src="../assets/js/script.js"></script>

    </body>
</html>