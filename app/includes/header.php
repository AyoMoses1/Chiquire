<header>
    <div class="header-wrapper clearfix">
        <div class="logo">
            <h1><a href="<?= BASE_URL . '/index.php'?>">CHI<span class="log">QUIRE</span></a></h1>
            
        </div>

        <!-- Mobile Nav Button -->
        <i class="fa fa-bars menu-btn"></i>   
        
        <!-- Main Nav -->
        <ul class="navigation">
            <li><a href="<?= BASE_URL . '/index.php'?>">Home</a></li>
            <li><a href="<?= BASE_URL . '/about.php'?>">About Us</a></li>

        <?php if (isset($_SESSION["id"])): ?>
            
            <li>
                <a href="javascript:void(0)"><i class="far fa-user"></i><?php echo " " . htmlspecialchars($_SESSION["username"]). " " ?><i class="fas fa-chevron-down"></i></a>

                <!-- Dropdown Menu -->
                <ul class="dropdown">

                <?php if($_SESSION["admin"]): ?>
                    <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
                <?php endif; ?>

                    <li><a href="<?php echo BASE_URL . "/authorizations/logout.php"?>" class="logout">Logout &nbsp;<i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
                <!-- // Dropdown Menu -->

            </li>

        <?php else: ?>

            <li><a href=<?php echo BASE_URL . "/authorizations/register.php"?>>Sign Up</a></li>
            <li><a href=<?php echo BASE_URL . "/authorizations/login.php"?>>Login</a></li>
                
        <?php endif; ?>

        </ul>
        <!-- // Main Nav -->

    </div>  
</header>