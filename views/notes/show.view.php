<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <article class="bg-white overflow-hidden shadow rounded-lg mb-4 p-6">
      <h2 class="text-lg font-medium text-gray-900">Note ID: <?= $note['id'] ?></h2>
      <p class="mt-2 text-sm text-gray-500"><?= htmlspecialchars($note['body']) ?></p>
    </article>
    <p><a href="notes" class="text-blue-500 hover:text-blue-700">Go back.</a></p>

    <form class="mt-6" method="POST">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
    </form>
  </div>
</main>

<?php require base_path("views/partials/footer.php") ?>