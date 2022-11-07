<?php
if ($errMsg): ?>
    <?php 
    foreach($errMsg as $error): ?>
        <li><?php echo $error;?></li>
    <?php endforeach;?>
<?php endif;?>