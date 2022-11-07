<?php
if ($errMsg): ?>
    <?php 
    foreach($errMsg as $error): ?>
        <li><?=$error;?></li>
    <?php endforeach;?>
<?php endif;?>