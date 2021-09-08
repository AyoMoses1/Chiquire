<?php 
    include("../path.php");
    include(ROOT_PATH . "/app/controllers/users.php");
    adminOnly();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Dashboard</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

        <!-- Custom Style -->
        <link rel="stylesheet" href="../assets/css/styles.css">

        <!-- Admin Style -->
        <link rel="stylesheet" href="../assets/css/admin.css">
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

                <h1 class="section-heading">Dashboard</h1>

                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
            
                <h2>Welcome to Chiquire's Blog Admin Dashboard</h2>

            </section>

        </main>

        <!-- JQuery -->
        <script src="../assets/js/jquery-3.5.1.js"></script>

        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>
    
        <!-- Custom Script -->
        <script src="../assets/js/script.js"></script>

    </body>

</html>