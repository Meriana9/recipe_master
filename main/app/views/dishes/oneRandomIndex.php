<section class="relative mb-6">
    <?php
    // Utilisez la fonction findOneRandom pour obtenir une recette aléatoire
    $randomDish = \App\Models\dishesModel\findOneRandom($connexion);
    ?>

    <!-- Affiche la recette aléatoire -->
    <img class="w-full h-96 object-cover" src="<?php echo $randomDish['pic']; ?>"
        alt="<?php echo $randomDish['name']; ?>" />
    <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?php echo $randomDish['name']; ?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span class="text-white">
                <?php echo $randomDish['rating']; ?>
            </span>
        </div>
        <p class="text-gray-300 mb-4">
            <?php echo substr($randomDish['description'], 0, 100); ?>...
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2">Par
                <?php echo $randomDish['username']; ?>
            </span>
            <span class="text-gray-500"><i class="fas fa-comment"></i>
                <?php echo $randomDish['comments']; ?> commentaires
            </span>
        </div>
        <a href="dishes/<?php echo $randomDish['dishId']; ?>/<?php echo Core\Tools\slugify($randomDish['name']); ?>"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
            Voir la recette
        </a>
    </div>
</section>