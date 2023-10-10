<?php
/*
    Variables disponibles
        $categories ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES CATEGORIES</h1>
    <div><a href="categories/add/form">Ajouter une nouvelle cat</a></div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['catid'] ?></td>
                <td><?php echo $category['catname'] ?></td>
                <td><?php echo $category['catcreated_at'] ?></td>
                <td>
                    <a href="categories/edit/form/<?php echo $category['catid'] ?>" class="edit">Modifier</button>
                    <a href="categories/delete/<?php echo $category['catid'] ?>" class="delete">Supprimer</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>