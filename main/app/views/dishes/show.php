<?php
/*  
    Variables disponibles
        $dishes ARRAY(...)
        affichage d'une recette détaillée 
*/
?>
<!-- Recipe Detail -->
<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <!-- Recipe Image -->
    <img class="w-full h-96 object-cover rounded-t-lg" src="<?php echo $dish['picture']; ?>"
        alt="<?php echo $dish['name']; ?>" />

    <!-- Recipe Info -->
    <div class="p-4">
        <h1 class="text-3xl font-bold mb-4">
            <?php echo $dish['name']; ?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span>
                <?php echo $dish['rating']; ?>
            </span>
            <span class="ml-4 text-gray-700"><i class="fas fa-clock"></i>
                <?php echo $dish['time']; ?> minutes
            </span>
        </div>
        <p class="text-gray-700 mb-4">
            <?php echo $dish['description']; ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-700 mr-2">
                <?php echo $dish['username']; ?>
            </span>
            <span class="text-gray-500"><i class="fas fa-comment"></i>
                <?php echo $dish['comments']; ?> commentaires
            </span>
        </div>
    </div>

    <!-- Ingredients -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
        <?php
        include_once '../app/models/ingredientsModel.php';
        $ingredients = \App\Models\ingredientsModel\findAllByDishId($connexion, $dish['id']);
        include '../app/views/ingredients/_indexByDish.php';
        ?>

    </div>

    <!-- Steps -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Étapes</h2>
        <p class="list-decimal pl-5">
            <?php echo $dish['description']; ?>

        </p>
    </div>

    <!-- Comments -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
        <!-- Comment -->
        <div class="mb-4">
            <div class="flex items-center mb-2">
                <img src="../../documents/pictures/<?php echo $dish['pic']; ?>" alt="<?php echo $dish['username']; ?>"
                    class="w-10 h-10 rounded-full mr-2" />
                <span class="font-bold">
                    <?php echo $dish['username']; ?>
                </span>
            </div>
            <p class="text-gray-700">
                <?php echo $dish['content']; ?>
            </p>
        </div>
        <!-- ... (autres commentaires) ... -->
    </div>
</section>