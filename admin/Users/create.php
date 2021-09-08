<?php 
    include("../../path.php");
    include(ROOT_PATH . "/app/controllers/users.php");
    adminOnly();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Add User</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

        <!-- Custom Style -->
        <link rel="stylesheet" href="../../assets/css/styles.css">

        <!-- Admin Style -->
        <link rel="stylesheet" href="../../assets/css/admin.css">
    </head>

    <body>
        
        <!-- Header -->
        <?php include(ROOT_PATH . "/app/includes/adminHeader.php") ?>
        <!-- // Header -->

        <main class="admin-wrapper">

            <!-- Sidebar -->
                <?php include(ROOT_PATH . "/app/includes/adminSidebar.php") ?>
            <!-- // Sidebar -->

            <section class="admin-content">

                <a href="create.php" class="btn">Add User</a>
                <a href="index.php" class="btn">Manage Users</a>

                <h1 class="section-heading">Add User</h1>

                <?php include(ROOT_PATH .'/app/helpers/errors.php') ?>

                <form action="create.php" method="POST">

                    <div class="input-fields">
                        <label for="username">Username</label><br>
                        <input type="text" name="username" class="text-input" value="<?php echo "$username"; ?>">
                    </div> 

                    <div class="input-fields">
                        <label for="email">Email</label><br>
                        <input type="email" name="email" class="text-input" value="<?php echo "$email"; ?>">
                    </div>

                    <div class="input-fields">
                        <label for="password">Password</label><br>
                        <input type="password" name="password" class="text-input">
                    </div> 

                    <div class="input-fields">
                        <label for="password-rtyp">Retype Password</label><br>
                        <input type="password" name="password-retype" class="text-input">
                    </div>

                    <div class="input-fields">
                        <label>Role</label><br>
                        <select name="role" class="text-input select">
                            <option></option>
                            <option value="author">Author</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <input type="submit" value="Add Admin User" class="btn" name="create_admin">
                
                </form>

            </section>

        </main>

        <!-- JQuery -->
        <script src="../../assets/js/jquery-3.5.1.js"></script>

        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>

        <!-- Slick Carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>
    
        <!-- Custom Script -->
        <script src="../../assets/js/script.js"></script>

    </body>

</html>