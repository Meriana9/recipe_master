<?php
/*
    Variables disponibles
        - $types_of_dishes ARRAY(ARRAY(id, name,description, created_at))
*/
?>
<ul class="list-reset text-gray-200">
    <?php foreach ($categories as $category): ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="#">
                <?php echo $category['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>