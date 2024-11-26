<?php
$title = "My books";
include_once 'layouts/header.php';
?>


<section class="my-books container my-5 py-5">
  <div class="container mt-5">
    <h2 class="font-weight-bold text-center">My books</h2>
    <hr class="mx-auto">
  </div>

  <table class="mt-5 pt-5 text-white">
    <tr>
      <th>Book</th>
      <th>Borrowed duration</th>
    </tr>
    <tr>
      <td>
        <div class="book-info text-center">
          <img src="assets/images/books/book1.jpg" alt="book" />
          <div>
            <p>Harry Porter</p>
            <br>
            <a class="return-btn" href="#">Return book</a>
          </div>
        </div>
      </td>
      <td>
        <span>10 days</span>
      </td>
    </tr>

    <tr>
      <td>
        <div class="book-info text-center">
          <img src="assets/images/books/book2.jpg" alt="book" />
          <div>
            <p>Harry Porter</p>
            <br>
            <a class="return-btn" href="#">Return book</a>
          </div>
        </div>
      </td>
      <td>
        <span>10 days</span>
      </td>
    </tr>

    <tr>
      <td>
        <div class="book-info text-center">
          <img src="assets/images/books/book3.jpg" alt="book" />
          <div>
            <p>Harry Porter</p>
            <br>
            <a class="return-btn" href="#">Return book</a>
          </div>
        </div>
      </td>
      <td>
        <span>10 days</span>
      </td>
    </tr>
  </table>

</section>


<?php include_once 'layouts/footer.php'; ?>