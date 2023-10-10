<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($chefs as $chef): ?>
        <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
            <img class="w-full h-48 object-cover" src="../documents/pictures/<?php echo $chef['pic']; ?>"
                alt="<?php echo $chef['username']; ?> " />
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">
                    <?php echo $chef['username']; ?>

                </h3>
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                    <span>
                        <?php echo $chef['rating']; ?>
                    </span>
                </div>
                <p class="text-gray-500">
                    <?php echo $chef['bio']; ?>
                </p>
                <a href="chefs/<?php echo $chef['userID']; ?>/<?php echo Core\Tools\slugify($chef['username']); ?>"
                    class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                    More details
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</div>