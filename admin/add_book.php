<?php

$title = "Add book";
include_once 'layouts/header.php';


$stmt = "SELECT id, name FROM category";

$ps = $conn->prepare($stmt);
$ps->execute();

?>


<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <h2 class="font-weight-bold">Add New Book</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-white">
    <form id="add-book-form" method="POST" action="../server/handle_add_book.php" enctype="multipart/form-data">

      <div class="form-group mb-3">
        <label>Book Title</label>
        <input type="text" class="form-control" id="register-title" name="book-title" placeholder="Book Title" required />

      </div>

      <div class="form-group mb-3">
        <label class="mb-1">Description</label>
        <textarea class="form-control" placeholder="Enter book description" id="floatingTextarea" name="description" required></textarea>
      </div>

      <div class="form-group mb-3">
        <label class="mb-1">Choose book category</label>
        <select class="form-select" id="book-category" name="category" aria-label="book-category" required>

          <?php while ($category = $ps->fetch()) { ?>
            <option value=<?= $category["id"] ?>><?= $category["name"] ?></option>
          <?php } ?>

        </select>
      </div>

      <div class="form-group mb-3">
        <label>Available copies</label>
        <input class="form-control" type="number" min="0" oninput="validity.valid||(value='');" name="available-copies" required>

      </div>

      <div class="form-group mb-3">
        <label>Select Cover Picture</label>
        <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg" id="photo" name="photo" required>
      </div>

      <div class="form-group">
        <input type="submit" class="btn" id="add-book-btn" name="add-book" value="Add Book" />
      </div>
    </form>
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>