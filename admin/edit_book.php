<?php

$title = "Edit book";
include_once 'layouts/header.php';


if (isset($_GET['book_id'])) {

  $book_id = $_GET['book_id'];
  
  $stmt = "SELECT * FROM book WHERE id = ?";

  $ps = $conn->prepare($stmt);
  $params = array($book_id);
  $ps->execute($params);

  $book = $ps->fetch();
  if ($book) {
  } else {
    header('location: ../index.php');
  }
} else {
  header('location: ../index.php');
}

$stmt = "SELECT id, name FROM category";

$ps = $conn->prepare($stmt);
$ps->execute();

?>


<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <h2 class="font-weight-bold">Edit Book</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-white">
    <form id="add-book-form" method="POST" action="../server/handle_edit_book.php" enctype="multipart/form-data">

      <div class="form-group mb-3">
        <label>Book Title</label>
        <input type="text" class="form-control" id="register-title" name="book-title" placeholder="Book Title" required value="<?= $book["title"] ?>" />

      </div>

      <div class="form-group mb-3">
        <label class="mb-1">Description</label>
        <textarea class="form-control" placeholder="Enter book description" id="floatingTextarea" name="description" required><?= $book["description"] ?></textarea>
      </div>

      <div class="form-group mb-3">
        <label class="mb-1">Choose book category</label>
        <select class="form-select" id="book-category" name="category" aria-label="book-category" required>
          <option value>Select a category</option>
          <?php while ($category = $ps->fetch()) {
            if ($book["category_id"] == $category["id"]) {
              $selected = 'selected="selected"';
            } else {
              $selected = "";
            }
          ?>
            <option value=<?= $category["id"] ?> <?= $selected ?>><?= $category["name"] ?></option>
          <?php } ?>

        </select>
      </div>

      <div class="form-group mb-3">
        <label>Available copies</label>
        <input class="form-control" type="number" min="0" oninput="validity.valid||(value='');" name="available-copies" required value="<?= $book["available_copies"] ?>">

      </div>

      <div class="form-group mb-3">
        <label>Select Cover Picture</label>
        <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg" id="photo" name="photo">
        <div id="fileHelp" class="form-text text-white">Leave this blank if you do not want to update the cover photo</div>
      </div>

      <!-- this is used to include the book_id in the POST-->
      <input type="hidden" name="book-id" value="<?= $book_id ?>">

      <div class="form-group">
        <input type="submit" class="btn" id="add-book-btn" name="edit-book" value="Update Book" />
      </div>
    </form>
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>