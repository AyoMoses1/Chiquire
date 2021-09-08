<?php 

include("path.php"); 
include(ROOT_PATH . '/app/controllers/category.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiquire's Blog | About us</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Open+Sans&display=swap" rel="stylesheet">    

    <!-- Custom Style -->
    
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    
    <?php include("app/includes/header.php") ?>


    <!-- Banner section for the about us page -->
    <section class="hero banner">
        <h1 class="hero-text">About <br>
        <span class="bouncing"> Chi<span class="log">quire's</span></span> Blog</h1>
    </section>

    <!-- Banner section for the about us page -->



    <!-- Main Wrapper -->

    <main class="main-about">

        <!-- Main Content -->
            
        <div class="about-us">
            <h2 class="section-heading">ABOUT US</h2>
            <p>Chiquire is a team of highly trained and deeply motivated individuals who engage in the business of Business Advisory in the Corporate, Finance, Tax Regulations and Marketing developments to build healthy and productive businesses </p>
            <p>The team comprises of passionate individuals with uncanny expertise in Finance, Law and digital marketing strategy.</p>
            <p>Make informed decisions when you consult with CHI<span class="log">QUIRE</span>
            </p>
        </div>

        <div class="chi-blog">
            <h2 class="section-heading">CHIQUIRE BLOG</h2>
            <p>It's a Socio Economic and Finance blog.</p>
            <p>The Chiquire blog focuses on Financial, Economical and Political trends that affects the society. It expresses the member's seasoned opinion on Socio Economic, Political and Finance related issues as they arise.</p>
        </div>

        <div class="chi-community">
            <h2 class="section-heading">CHIQUIRE COMMUNITY</h2>
            <p>The community is a virtual platform to foster peer-to-peer conversations and interactions on Business, Corporate, Economic, Legal and Political trends amongst experienced individuals with the aim of providing quality and productive solutions</p>
        </div>

        </section>

        <!-- // Main Content -->       

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