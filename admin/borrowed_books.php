<?php

$title = "Borrowed Books";
include_once 'layouts/header.php';

if (!isset($_SESSION['logged_in'])) {
  // redirect the user if they are not logged in
  $_SESSION['message'] = "You have to login to continue";
  $_SESSION['message_type'] = "danger";
  header('location: login.php');
  exit();
}

$stmt = "
    SELECT 
        b.id AS book_id,
        u.username,
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
    WHERE bb.status = 'borrowed'
    ORDER BY 
        bb.borrow_date ASC
";

$ps = $conn->prepare($stmt);
$ps->execute();

?>

<section class="my-5 py-5">
  <div class="user-list container mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <div class="container">
      <h2 class="font-weight-bold text-center">Borrowed Books</h2>
      <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5 text-white table table-dark mt-5 pt-5 text-white table-striped">
      <thead>
        <tr>
          <th>Cover</th>
          <th>Title</th>
          <th>Category</th>
          <th>User</th>
          <th>Borrowed duration</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php while ($book = $ps->fetch()) { ?>

          <tr>
            <td>
              <img class="book-img" src="../assets/images/books/<?= $book['book_photo'] ?>" alt=<?= $book['title'] ?> />
            </td>
            <td class="align-middle">
              <?= $book['title'] ?>
            </td>
            <td class="align-middle">
              <?= $book['category_name'] ?>
            </td>
            <td class="align-middle">
              <?= $book['username'] ?>
            </td>
            <td class="align-middle">
              <?= $book['days_after_borrow'] ?> days
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>