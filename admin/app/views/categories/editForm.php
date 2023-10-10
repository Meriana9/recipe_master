<?php
/* 
Variables dispo 
- $categorie ARRAY(id, name, discription) */
?>

<div class="page-header">
    <h1>Modification D'UNE CATÉGORIE</h1>
</div>
<div>
    <a href="<?php echo ADMIN_ROOT; ?>/categories">Retour au Dashbord</a> <br><br>
</div>
<form action="categories/edit/<?php echo $categorie['id']; ?>" method="post">
    <div>
        <label for="test">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $categorie['name']; ?>" />
        <br><br>
        <label for="test">Description</label>
        <input type="text" id="description" name="description" value="<?php echo $categorie['description']; ?>" />
    </div><br>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>