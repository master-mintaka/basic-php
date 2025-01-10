<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/banner.php" ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <article class="bg-white overflow-hidden shadow rounded-lg mb-4 p-6">
      <h2 class="text-lg font-medium text-gray-900">Note ID: <?= $note['id'] ?></h2>
      <p class="mt-2 text-sm text-gray-500"><?= $note['body'] ?></p>
    </article>
    <p><a href="notes" class="text-blue-500 hover:text-blue-700">Go back.</a></p>
  </div>
</main>

<?php require "partials/footer.php" ?>