<?php
/*
    Variables disponibles
        $books: ARRAY (ARRAY(...))
        afficher 9 recettes à la fois 
*/
?>
<h2 class="text-2xl font-bold mb-4">Recettes</h2>

<?php include '../app/views/dishes/_index.php'; ?>

<div class="text-center mt-8">
    <button class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-full">
        Load More
    </button>
</div>
