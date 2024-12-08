<?php

session_start();

include_once 'server/connection.php';

if (!isset($_SESSION['logged_in'])) {
  // redirect the user if they are not logged in
  header('location: login.php');
  exit();
}

$user_email = $_SESSION['user_email'];

$stmt = "
    SELECT 
        b.id AS book_id,
        b.title, 
        b.photo AS book_photo, 
        bb.status, 
        DATEDIFF(CURRENT_DATE, bb.borrow_date) AS days_after_borrow,
        bb.borrow_date
    FROM borrowed_book bb
    JOIN book b ON bb.book_id = b.id
    JOIN user u ON bb.user_id = u.id
    WHERE u.email = ?
    ORDER BY 
        FIELD(bb.status, 'borrowed') DESC, 
        bb.borrow_date ASC
";

$ps = $conn->prepare($stmt);
$ps->execute([$user_email]);

$title = "My books";
include_once 'layouts/header.php';
?>

<section class="my-5 py-5">
  <div class="my-books container  mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <div class="container">
      <h2 class="font-weight-bold text-center">My books</h2>
      <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5 text-white">
      <tr>
        <th>Book</th>
        <th>Status</th>
        <th>Borrowed duration</th>
      </tr>
      <?php while ($book = $ps->fetch()) { ?>
        <tr>
          <td>
            <div class="book-info text-center">
              <img src="assets/images/books/<?= $book['book_photo'] ?>" alt=<?= $book['title'] ?> />
              <div>
                <p><?= $book['title'] ?></p>
                <br>
                <?php if ($book['status'] === 'borrowed') { ?>
                  <a class="return-btn" href="#" data-bs-toggle="modal" data-bs-target="#confirmationModal<?= $book['book_id'] ?>">Return book</a>

                  <!-- Modal -->
                  <div class="modal fade" id="confirmationModal<?= $book['book_id'] ?>" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
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
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="comment"></textarea>
                            <label for="floatingTextarea">Comments</label>
                          </div>

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                          <!-- Hidden form to send rating and comment to the server -->
                          <form id="return-book-form" method="POST" action="server/return_book.php">
                            <input type="hidden" name="rating" id="rating" value="0"> <!-- Set default rating value to 0 -->
                            <input type="hidden" name="comment" id="comment">
                            <input type="hidden" name="book_id" id="book_id">
                            <button type="submit" class="btn btn-primary" name="return_book" id="submit-rating-btn" value="return_book" >return book</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </td>
          <td>
            <span><?= strtoupper($book['status']) ?></span>
          </td>
          <td>
            <?php if ($book['status'] === 'borrowed') { ?>
              <span><?= $book['days_after_borrow'] ?> days</span>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>

    </table>

</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const starsContainers = document.querySelectorAll('.star-rating');
    let ratingValue = 0;
    let book_id = null;
    const commentTextarea = document.getElementById('floatingTextarea'); // Get comment textarea element

    // Iterate over each container with stars
    starsContainers.forEach(container => {
      const stars = container.querySelectorAll('i');
      book_id = container.getAttribute('data-book-id');

      // Set up click event listener for each star inside the container
      stars.forEach(star => {
        star.addEventListener('click', function() {
          // Get the clicked star's rating value
          ratingValue = this.getAttribute('data-rating');

          // Highlight the stars up to the clicked star
          stars.forEach(star => {
            star.classList.remove('active'); // Remove 'active' class
          });

          // Add 'active' class to the clicked stars
          for (let i = 0; i < ratingValue; i++) {
            stars[i].classList.add('active');
          }
        });
      });
    });

    // Handle the form submission when the Submit button is clicked
    document.addEventListener('click', function(e) {
      if (e.target && e.target.id === 'submit-rating-btn') {
        const comment = commentTextarea.value; // Get the comment from the textarea

        document.getElementById('rating').value = ratingValue;
        document.getElementById('comment').value = comment;
        document.getElementById('book_id').value = book_id;
      }
    });
  });
</script>


<?php include_once 'layouts/footer.php'; ?>