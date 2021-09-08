<header class="clearfix">
    <div class="logo">
    <h1><a href=<?php echo BASE_URL . "/index.php"; ?>>CHI<span class="log">QUIRE</span></a></h1>
    </div>
    <!-- Mobile Nav Button -->
    <i class="fa fa-bars menu-btn"></i>   
    
    <!-- Main Nav -->
    <ul class="navigation">

    <?php if (isset($_SESSION['id'])): ?>
        <li>
        <a href="#"><i class="far fa-user"></i><?php echo " " . htmlspecialchars($_SESSION["username"]). " " ?><i class="fas fa-chevron-down"></i></a>
        
            <!-- Dropdown Menu -->
            <ul class="dropdown">
                <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home Page</a></li>
                <li><a href="<?php echo BASE_URL . '/authorizations/logout.php' ?>" class="logout">Logout &nbsp; <i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
            <!-- // Dropdown Menu -->

        </li>

    <?php endif; ?>
    </ul>
    <!-- // Main Nav -->
    
</header>
        