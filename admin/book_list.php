<?php

$title = "Book List";
include_once 'layouts/header.php';

if (!isset($_SESSION['logged_in'])) {
  // redirect the user if they are not logged in
  $_SESSION['message'] = "You have to login to continue";
  $_SESSION['message_type'] = "danger";
  header('location: login.php');
  exit();
}

$stmt = "SELECT 
              book.id AS book_id, 
              book.title, 
              book.description, 
              book.available_copies,
              book.photo, 
              category.name AS category_name
          FROM 
              book 
          INNER JOIN 
              category 
          ON 
              book.category_id = category.id";

$ps = $conn->prepare($stmt);
$ps->execute();

?>

<section class="my-5 py-5">
  <div class="user-list container mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <div class="container">
      <h2 class="font-weight-bold text-center">BookList</h2>
      <hr class="mx-auto">
    </div>


    <a href="add_book.php" class="add-book-btn a-button">
      Add new book
    </a>

    <table class="table table-dark mt-5 pt-5 text-white table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cover</th>
          <th>Title</th>
          <th>Category</th>
          <th>Available Copies</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">

        <?php while ($book = $ps->fetch()) { ?>
          <tr>
            <td class="align-middle">
              <?= $book['book_id'] ?>
            </td>
            <td class="align-middle">
              <img class="book-img" src="../assets/images/books/<?= $book['photo'] ?>" alt="book-img" />
            </td>
            <td class="align-middle">
              <?= $book['title'] ?>
            </td>
            <td class="align-middle">
              <?= $book['category_name'] ?>
            </td>
            <td class="align-middle">
              <?= $book['available_copies'] ?>
            </td>
            <td class="align-middle">

              <a href="#" data-bs-toggle="modal" data-bs-target="#confirmationModalDelete<?= $book['book_id'] ?>">Delete</a>

              <!-- Modal -->
              <div class="modal fade" id="confirmationModalDelete<?= $book['book_id'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-black">
                      <p>Are you sure you want to delete '<?= $book['title'] ?>'?</p>
                      <p>(This process is irreversible)</p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a href="../server/delete_book.php?delete=<?= $book['book_id']  ?>" class="btn btn-danger">
                        Delete forever
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <a href="edit_book.php?book_id=<?= $book['book_id'] ?>">Edit</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>