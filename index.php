<?php 

    include("path.php");
    include(ROOT_PATH . '/app/controllers/category.php');

    $postHeading = "Recent Posts";
    $recentPosts = [];
    $posts = getPublishedPosts();
    usort($posts, function ($post1, $post2) {
        return $post2['id'] <=> $post1['id'];
    });
    $trendPosts = array_slice($posts, 0, 5);
    $recentPosts = array_slice($posts, 0, 12);
    $olderPosts = array_slice($posts, 12);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiquire's Blog</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- Main Wrapper -->

    <section class="hero">
        <h1 class="hero-text">Welcome to <br>
            <span class="bouncing"> Chi<span class="log">quire's</span></span> Blog</h1>
    </section>

    <!-- Carousel -- Trending Posts-->
    <section class="trending-posts">
        <h1 class="section-heading">Trending Posts</h1>

        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next"></i>

        <!-- Slide Container -->

        <div class="slide-container">
            
            <?php foreach ($trendPosts as $trendPost): ?>

                <div class="slides clearfix">
                    <div class="post-img">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $trendPost['image']?>" alt="">
                    </div>
                    <div class="post-info">
                    
                        <h1  class="post-title"><a href="single.php?id=<?php echo $trendPost['id']; ?>"><?php echo $trendPost['title']; ?></a></h1>
                        <p><i class="far fa-user">&nbsp;<?php echo $trendPost['username']; ?></i>
                        &nbsp;
                        <i class="far fa-calendar" aria-hidden="true">&nbsp;<?php echo date('F, j, Y', strtotime($trendPost['created_at']))?></i></p>

                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <!-- // Slide Container -->

    </section>
    <!-- // Carousel -->

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

                            <i class="far fa-user">&nbsp;<?php echo $trendPost['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar" aria-hidden="true">&nbsp;<?php echo date('F, j, Y', strtotime($trendPost['created_at']))?></i>

                            <p class="post-catch"><?php echo html_entity_decode(substr($recentPost['body'], 0, 150) . "...") ?></p>

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
            
        </div>

        <!-- Older Posts -->

        <?php if(count($olderPosts) > 0): ?>

            <section class="older-posts">
                <h1 class="section-heading">Older Posts</h1>

                <?php foreach ($olderPosts as $oldPost): ?>
                    <div class="old-posts-card">
                        <div class="post-img">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $recentPost['image']?>" alt="">
                        </div>

                        <div class="post-info">
                            <h1  class="post-title"><a href="single.php"><?php echo $recentPost['title']; ?></a></h1>
                            <i class="far fa-user">&nbsp;<?php echo $trendPost['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar" aria-hidden="true">&nbsp;<?php echo date('F, j, Y', strtotime($trendPost['created_at']))?></i>
                            <p class="post-catch"><?php echo html_entity_decode(substr($recentPost['body'], 0, 200) . "...") ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                
        
            </section>
        
        <?php endif; ?>

        <!-- // Older Posts -->

    </main>

    <?php include(ROOT_PATH . '/app/includes/footer.php') ?>

    <!-- // Recent Posts -->

    <!-- JQuery -->
    <script src="assets/js/jquery-3.5.1.js"></script>

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/e10511242d.js" crossorigin="anonymous"></script>

    <!-- Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Custom Script -->
    <script src="assets/js/script.js"></script>
</body>
</html>