<?php 
    include("../../path.php");
    include(ROOT_PATH . '/app/controllers/posts.php');
    adminOnly();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Add Posts</title>

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

                <h1 class="section-heading">Add Posts</h1>

                <?php include(ROOT_PATH .'/app/helpers/errors.php') ?>

                <form action="create.php" method="POST" enctype="multipart/form-data">

                    <div class="input-fields">
                        <label for="title">Title</label><br>
                        <input type="text" name="title" class="text-input" value="<?php echo $title; ?>">
                    </div>

                    <div class="input-fields">
                        <label for="body">Body</label><br>
                        <textarea name="body" id="body"><?php echo $body; ?></textarea>
                    </div>

                    <div class="input-fields">
                        <label for="image">Image</label><br>
                        <input type="file" name="image" class="text-input">
                    </div>

                    <div class="input-fields">
                        <label>Categories</label><br>
                        <select name="category_id" class="text-input select">
                            <option value=""></option>

                            <?php foreach ($categories as $key => $category): ?>

                                <?php if (!empty($category_id) && $category_id == $category['id']): ?>

                                    <option selected value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>

                                <?php else: ?>

                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </select>
                    </div>
                                    
                    <div>
                        <?php if ($_SESSION['role'] === 'admin'): ?>    
                            <?php if(empty($published)): ?>
                                <label>
                                    <input type="checkbox" name="published" >Publish
                                </label>
                            <?php else: ?>
                                <label>
                                    <input type="checkbox" name="published" checked>Publish
                                </label>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <input type="submit" value="Add Posts" class="btn" name="add_post">
                
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