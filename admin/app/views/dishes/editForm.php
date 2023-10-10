<?php
/* 
    vb dispo $dishes
    vb dispo $users(ARRAY(ARRAY(id,name...)))
    vb dispo $cat(ARRAY(ARRAY(id,name...)))
*/
?>

<div class="page-header">
    <h1>EDITION D'UNE DISH</h1>
</div>
<div>
    <a href="<?php echo ADMIN_ROOT; ?>/dishes">Retour au Dashbord</a> <br><br>
</div>
<form action="dishes/<?php echo $dish['id']; ?>/edit/update" method="post">
    <fieldset>
        <legend>Données du Dish</legend>
        <div>
            <label for="test">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $dish['name']; ?>" />
            <br><br>
            <label for="test">Description</label>
            <input type="text" id="description" name="description" value="<?php echo $dish['description']; ?>" />
            <br><br>
            <label for="test">Time</label>
            <input type="text" id="time" name="time" value="<?php echo $dish['prep_time']; ?>" />
            <br><br>
            <label for="test">Portions</label>
            <input type="number" id="portion" name="portion" value="<?php echo $dish['portions']; ?>" />
            <br><br>
            <label for="test">Image</label>
            <input type="image" id="image" name="image" value="Image" />
        </div><br>
    </fieldset>

    <div>
        <label for="username">User</label>
        <select name="username" id="username">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['userId']; ?>" <?php if ($user['userId'] == $dish['user_id']) {
                       echo 'selected="selected"';
                   } ?>>

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
                    id="<?php echo $ingredient['ingredientname']; ?>" <?php if (in_array($ingredient['ingredientId'], $dishIngredients)) {
                           echo 'checked="checked"';
                       } ?>>
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