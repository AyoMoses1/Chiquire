<section class="side-nav">
    
    <li><a href=<?php echo BASE_URL . "/admin/posts/index.php"; ?> >Manage Posts</a></li>
    <?php if ($_SESSION['role'] === 'admin'): ?>
            
            <li><a href="<?php echo BASE_URL . "/admin/categories/index.php" ?>">Manage Categories</a></li>
            <li><a href="<?php echo BASE_URL . "/admin/users/index.php" ?>">Manage Users</a></li>

    <?php endif; ?>
    
</section>