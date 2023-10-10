<?php
/*
    Variables disponibles
        $dishes ARRAY(ARRAY(id, name, created_at))
*/
?>

<h1>LISTE DES DISHES</h1>
<div><a href="dishes/add/form">Ajouter une Dish</a></div>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Time</th>
            <th>Created_at</th>
            <th>Image</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dishes as $dish): ?>
            <tr>
                <td>
                    <?php echo $dish['id'] ?>
                </td>
                <td>
                    <?php echo $dish['name'] ?>
                </td>
                <td>
                    <?php echo substr($dish['description'], 0, 150) ?>
                </td>
                <td>
                    <?php echo $dish['prep_time'] ?>
                </td>
                <td>
                    <?php echo $dish['created_at'] ?>
                </td>
                <td><img src="<?php echo $dish['picture'] ?>" alt="<?php echo $dish['name'] ?>" width="120"></td>
                <td>
                    <?php echo $dish['username'] ?>
                </td>
                <td>
                    <a href="dishes/<?php echo $dish['id'] ?>/edit/form" class="edit">Modifier</button>
                        <a href="dishes/<?php echo $dish['id'] ?>/delete" class="delete">Supprimer</button> <!-- lui ajouter l'id au milieu  -->
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>