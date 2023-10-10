<?php
/* 
    vb dispo $users(ARRAY(ARRAY(id,name...)))
    vb dispo $cat(ARRAY(ARRAY(id,name...)))
    vb dispo $ing(ARRAY(ARRAY(id,name...)))
*/
?>

<div class="page-header">
    <h1>AJOUT D'UNE DISH</h1>
</div>
<div>
    <a href="<?php echo ADMIN_ROOT; ?>/dishes">Retour au Dashbord</a> <br><br>
</div>
<form action="dishes/add/insert" method="post">
    <fieldset>
        <legend>Données du Dish</legend>
        <div>
            <label for="test">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" />
            <br><br>
            <label for="test">Description</label>
            <input type="text" id="description" name="description" placeholder="Description" />
            <br><br>
            <label for="test">Time</label>
            <input type="text" id="time" name="time" placeholder="Time Preparation" />
            <br><br>
            <label for="test">Portions</label>
            <input type="number" id="portion" name="portion" placeholder="Portions" />
            <br><br>
            <label for="test">Image</label>
            <input type="image" id="image" name="image" placeholder="Image" />
        </div><br>
    </fieldset>

    <div>
        <label for="username">User</label>
        <select name="username" id="username">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['userId']; ?>">

                    <?php echo $user['username']; ?>

                </option>
            <?php endforeach; ?>
        </select>
    </div><br>

    <div>
        <label for="catname">Categories</label>
        <select name="catname" id="catname">
            <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['catid']; ?>">

                    <?php echo $cat['catname']; ?>

                </option>
            <?php endforeach; ?>
        </select>
    </div><br>

    <fieldset>
        <legend>Ingedients</legend>
        <div>
            <?php foreach ($ingredients as $ingredient): ?>
                <input type="checkbox" name="ingredients[]" value="<?php echo $ingredient['ingredientId']; ?>"
                    id="<?php echo $ingredient['ingredientname']; ?>">
                <label for="<?php echo $ingredient['ingredientname']; ?>">
                    <?php echo $ingredient['ingredientname']; ?>
                </label> <br>



                </option>
            <?php endforeach; ?>
        </div>
    </fieldset>


    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>