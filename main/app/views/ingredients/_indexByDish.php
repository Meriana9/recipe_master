<?php
/*
    Variables disponibles
        -type ARRAY(ARRAY(id, name, created_at))
*/
?>

<div class="pb-4">
    <ul class="list-decimal ">
        <?php foreach ($ingredients as $type): ?>
            <li>
                <?php echo $type['ingredient']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>