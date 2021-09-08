<?php 
    include("../../path.php");
    include(ROOT_PATH . "/app/controllers/posts.php");
    $posts = getAllPosts();
    adminOnly();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Manage Posts</title>

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

                <a href="create.php" class="btn">Add Post</a>
                <a href="index.php" class="btn">Manage Posts</a>

                <h1 class="section-heading">Manage Posts</h1>

                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <thead>

                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>

                    </thead>

                    <tbody>

                    <?php foreach ($posts as $key => $post): ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $post['title'] ?></td>
                            <td><?php echo $post['username'] ?></td>

                            <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>

                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>"  class="delete">delete</a></td>
                                
                                <?php if($post['published']): ?>
                                    <td><a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>"  class="publish">unpublish</a></td>
                                <?php ;else: ?>
                                    <td><a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>"  class="publish">publish</a></td>
                                <?php endif; ?>

                            <?php endif; ?>
                        
                        </tr>
                        
                    <?php endforeach; ?>

                    </tbody>
                </table>

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