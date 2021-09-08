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
        <title>Admin - Manage Users</title>

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
                
                <?php if(isset($_GET['show-admin'])): ?>
                
                    <div>
                        <form action="index.php" method="get">
                            <input type="submit" value="Show All Users" class="btn btn-right" name="show-all">
                        </form>
                    </div>

                    <h1 class="section-heading">Manage Users</h1>

                    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                    <table>
                        <thead>

                            <th>SN</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>

                        </thead>

                        <tbody>

                        <?php foreach ($adminUsers as $key => $admin): ?> 

                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $admin["username"]; ?></td>
                                <td><?php echo $admin["role"]; ?></td>
                                <td><?php echo $admin["email"]; ?></td>
                                <td><a href="edit.php?id=<?php echo $admin['id']; ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $admin['id']; ?>"  class="delete">delete</a></td>                          
                            </tr>

                        <?php endforeach; ?>                           

                        </tbody>
                    </table>
                
                <?php elseif(isset($_GET['show-all'])): ?>

                    <form action="index.php" method="get">
                        <input type="submit" value="Show Only Admin"class="btn btn-right" name="show-admin">
                    </form>

                    <h1 class="section-heading">Manage Users</h1>

                    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                    <table>
                        <thead>

                            <th>SN</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>

                        </thead>

                        <tbody>

                        <?php foreach ($users as $key => $user): ?> 

                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $user["username"]; ?></td>
                                <td><?php echo $user["role"]; ?></td>
                                <td><?php echo $user["email"]; ?></td>
                                <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $user['id']; ?>"  class="delete">delete</a></td>                          
                            </tr>

                        <?php endforeach; ?>
                            

                        </tbody>
                    </table>

                <?php else: ?>
                
                    <form action="index.php" method="get">
                        <input type="submit" value="Show Only Admin"class="btn btn-right" name="show-admin">
                    </form>

                    <h1 class="section-heading">Manage Users</h1>

                    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                    <table>
                        <thead>

                            <th>SN</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>

                        </thead>

                        <tbody>

                        <?php foreach ($users as $key => $user): ?> 

                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $user["username"]; ?></td>
                                <td><?php echo $user["role"]; ?></td>
                                <td><?php echo $user["email"]; ?></td>
                                <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $user['id']; ?>"  class="delete">delete</a></td>                          
                            </tr>

                        <?php endforeach; ?>
                            

                        </tbody>
                    </table>
                
                <?php endif; ?>
                

            </section>

        </main>

        <!-- JQuery -->
        <script src="../../assets/js/jquery-3.5.1.js"></script>

        <!-- Slick Carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>
    
        <!-- Custom Script -->
        <script src="../../assets/js/script.js"></script>

    </body>

</html>