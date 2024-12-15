<?php

$title = "My books";
include_once 'layouts/header.php';

if (!isset($_SESSION['logged_in'])) {
  // redirect the user if they are not logged in
  $_SESSION['message'] = "You have to login to continue";
  $_SESSION['message_type'] = "danger";
  header('location: login.php');
  exit();
}

$user_email = $_SESSION['user_email'];

$stmt = "SELECT 
              b.id AS book_id,
              b.title, 
              b.photo AS book_photo, 
              bb.status, 
              c.name AS category_name,
              DATEDIFF(CURRENT_DATE, bb.borrow_date) AS days_after_borrow,
              bb.borrow_date
          FROM borrowed_book bb
          INNER JOIN book b ON bb.book_id = b.id
          INNER JOIN user u ON bb.user_id = u.id
          INNER JOIN category c ON b.category_id = c.id
          WHERE u.email = ?
          ORDER BY 
              (bb.status = 'borrowed') DESC, 
              bb.borrow_date ASC";

$ps = $conn->prepare($stmt);
$ps->execute([$user_email]);

?>

<section class="my-5 py-5">
  <div class="my-books container mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <div class="container">
      <h2 class="font-weight-bold text-center">My books</h2>
      <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5 text-white table table-dark mt-5 pt-5 text-white table-striped">
      <thead>
        <tr>
          <th>Cover</th>
          <th>Title</th>
          <th>Category</th>
          <th>Status</th>
          <th>Borrowed duration</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php while ($book = $ps->fetch()) { ?>

          <tr>
            <td>
              <img class="book-img" src="assets/images/books/<?= $book['book_photo'] ?>" alt="<?= $book['title'] ?>" />
            </td>
            <td class="align-middle">
              <?= $book['title'] ?>
            </td>
            <td class="align-middle">
              <?= $book['category_name'] ?>
            </td>
            <td class="align-middle">
              <?= strtoupper($book['status']) ?>
            </td>
            <td class="align-middle">
              <?php if ($book['status'] === 'borrowed') { ?>
                <span><?= $book['days_after_borrow'] ?> days</span>
              <?php } ?>
            </td>
            <td class="align-middle">
              <?php if ($book['status'] === 'borrowed') { ?>
                <a class="return-btn" href="#" data-bs-toggle="modal" data-bs-target="#confirmationModal<?= $book['book_id'] ?>">Return book</a>
                <!-- Modal -->
                <div class="modal fade" id="confirmationModal<?= $book['book_id'] ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body text-black">
                        <p>Did you enjoy '<?= $book['title'] ?>'? Leave a review</p>

                        <!-- Rating stars -->
                        <div class="star-rating" data-book-id="<?= $book['book_id'] ?>">
                          <i class="fas fa-star" data-rating="1"></i>
                          <i class="fas fa-star" data-rating="2"></i>
                          <i class="fas fa-star" data-rating="3"></i>
                          <i class="fas fa-star" data-rating="4"></i>
                          <i class="fas fa-star" data-rating="5"></i>
                        </div>

                        <!-- Comment textarea -->
                        <div class="form-floating mt-3">
                          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea<?= $book['book_id'] ?>" name="comment"></textarea>
                          <label for="floatingTextarea<?= $book['book_id'] ?>">Comments</label>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                        <!-- Hidden form to send rating and comment to the server -->
                        <form id="return-book-form<?= $book['book_id'] ?>" method="POST" action="server/handle_return_book.php">
                          <input type="hidden" name="rating" id="rating<?= $book['book_id'] ?>" value="0">
                          <input type="hidden" name="comment" id="comment<?= $book['book_id'] ?>">
                          <input type="hidden" name="book_id" id="book_id<?= $book['book_id'] ?>">
                          <button type="submit" class="btn btn-primary" name="return_book" id="submit-rating-btn<?= $book['book_id'] ?>" value="return_book">Return book</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const starsContainers = document.querySelectorAll('.star-rating');

    starsContainers.forEach(container => {
      const stars = container.querySelectorAll('i');
      const bookId = container.getAttribute('data-book-id');
      let ratingValue = 0;

      // Set up click event listener for each star
      stars.forEach(star => {
        star.addEventListener('click', function() {
          ratingValue = this.getAttribute('data-rating');

          // Reset and highlight stars
          stars.forEach(star => star.classList.remove('active'));
          for (let i = 0; i < ratingValue; i++) {
            stars[i].classList.add('active');
          }
        });
      });

      // Handle form submission
      document.addEventListener('click', function(e) {
        if (e.target && e.target.id === `submit-rating-btn${bookId}`) {
          const commentTextarea = document.getElementById(`floatingTextarea${bookId}`);
          const ratingInput = document.getElementById(`rating${bookId}`);
          const commentInput = document.getElementById(`comment${bookId}`);
          const bookIdInput = document.getElementById(`book_id${bookId}`);

          // Set values for the hidden inputs
          ratingInput.value = ratingValue;
          commentInput.value = commentTextarea.value;
          bookIdInput.value = bookId;
        }
      });
    });
  });
</script>


<?php include_once 'layouts/footer.php'; ?>