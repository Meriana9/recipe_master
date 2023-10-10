<?php
/*
    Variables disponibles
        -dishes ARRAY(ARRAY(id, name, created_at))
*/
?>

<!-- Recipe Card -->
<article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
    <?php foreach ($dishes as $dish): ?>
        <img src="<?php echo $dish['picture']; ?>" alt="<?php echo $dish['name']; ?>" class="w-full h-48 object-cover" />
        <div class="p-4">
            <h3 class="text-xl font-bold mb-2">
                <?php echo $dish['name']; ?>
            </h3>
            <div class="flex items-center mb-2">
                <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                <span>
                    <?php echo $dish['rating']; ?>
                </span>
            </div>
            <p class="text-gray-600">
                <?php echo substr($dish['name'], 0, 150); ?>
            </p>
            <a href="dishes/<?php echo $dish['id']; ?>/<?php echo Core\Tools\slugify($dish['name']); ?>"
                class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">Voir
                la recette</a>
        </div>
    <?php endforeach; ?>
</article>