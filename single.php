<?php 
    
    include("path.php");
    include(ROOT_PATH . '/app/controllers/posts.php');

    if (isset($_GET['id'])) {
        
        $post = selectOne('posts', ['id' => $_GET["id"]]);

    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?> | Chiquire's Blog</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    
    <?php include("app/includes/header.php") ?>

    <!-- Main Wrapper -->

    <main class="clearfix">

        <!-- Main Content -->

        <article class="main-content">
            <h1 class="article-title"><?php echo $post['title']; ?></h1>

            <div class="post-content">

                <?php echo html_entity_decode($post['body']); ?>

            </div>
        </article>

        <!-- // Main Content -->

        <!-- Side Bar -->

        <section class="sidebar article-sb">

            <!-- Search Bar -->

            <div class="search">
                <h1 class="section-heading">Search</h1>

                <div class="search-btn-group">
                    <form action="" method="get">
                        <input type="text" name="search" class="text-input" placeholder="Search..."><button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>

            </div>

            <!-- // Search Bar -->

            <!-- Categories -->

            <div class="categories">
                <h1 class="section-heading">Categories</h1>

                <?php foreach ($categories as $key => $category): ?>
                    <li><a href="<?php echo BASE_URL . '/search.php?cat_id=' . $category['id'] .'&name=' . $category['name'] ?>"><?php echo $category['name']; ?></a></li>
                <?php endforeach; ?>

            </div>

            <!-- // Categories -->

        </section>

        <!-- // Side Bar -->

    </main>

    <?php include(ROOT_PATH . '/app/includes/footer.php') ?>

    <!-- // Recent Posts -->

    <!-- JQuery -->
    <script src="assets/js/jquery-3.5.1.js"></script>

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>

    <!-- Custom Script -->
    <script src="assets/js/script.js"></script>
</body>
</html>