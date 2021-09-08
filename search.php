<?php 

    include("path.php");
    include(ROOT_PATH . '/app/controllers/category.php');

    $postHeading = "";
    $recentPosts = [];
      
    if(isset($_POST['search'])){
        unset($_POST["search-btn"]);
        $postHeading = "You searched for: '" . $_POST['search'] . "'";
        $recentPosts = searchPosts($_POST['search']);
    }
    if (isset($_GET["cat_id"])) {
        $recentPosts = getPostsByCategoryId($_GET["cat_id"]);
        if (count($recentPosts) > 0) {
            $postHeading = "You searched for posts under: '" . $_GET['name'] . "'";
        }
        else {
            $postHeading = "There are no posts under: '" . $_GET['name'] . "'";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiquike's Blog - Search</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- Main Wrapper -->

    <!-- Recent Posts -->

    <main>
        <!-- Full Main Section -->
        
        <div class="clearfix">
            <!-- Main Content -->

            <section class="main-content">
                <h1 class="section-heading"><?php echo $postHeading; ?></h1>

                <?php foreach ($recentPosts as $recentPost): ?>    
                    <div class="posts">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $recentPost['image']?>" alt="">

                        <div class="post-summary">
                            <h2 class="post-title"><a href="single.php?id=<?php echo $recentPost['id']; ?>"><?php echo $recentPost['title']; ?></a></h2>

                            <i class="far fa-user">&nbsp;<?php echo $recentPost['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar" aria-hidden="true">&nbsp;<?php echo date('F, j, Y', strtotime($recentPost['created_at']))?></i>

                            <p class="post-catch"><?php echo html_entity_decode(substr($recentPost['body'], 0, 200) . "...") ?></p>

                            <a href="single.php?id=<?php echo $recentPost['id']; ?>" class="btn">Read more...</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <!-- // Main Content -->

            <!-- Side Bar -->

            <section class="sidebar">

                <!-- Search Bar -->

                <div class="search">
                    <h1 class="section-heading">Search</h1>

                    <div class="search-btn-group">
                        <form action="search.php" method="post">
                            <input type="text" name="search" class="text-input" placeholder="Search..."><button type="submit" class="search-btn" name="search-btn"><i class="fas fa-search"></i></button>
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