<div class="page-header">
    <h1>AJOUT D'UNE CATÉGORIE</h1>
</div>
<div>
    <a href="<?php echo ADMIN_ROOT; ?>/categories">Retour au Dashbord</a> <br><br>
</div>
<form action="categories/add/insert" method="post">
    <div>
        <label for="test">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" />
        <br><br>
        <label for="test">Description</label>
        <input type="text" id="description" name="description" placeholder="Description" />
    </div><br>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>