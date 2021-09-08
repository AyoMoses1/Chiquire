<?php if(count($errors) > 0): ?>

<div class="msg error">

    <?php foreach ($errors as $error => $error_val): ?>

        <li><?php echo $error_val; ?></li>

    <?php endforeach; ?>

</div>

<?php endif; ?>