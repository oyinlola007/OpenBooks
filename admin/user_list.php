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

$stmt = "SELECT * FROM user";

$ps = $conn->prepare($stmt);
$ps->execute();


?>

<section class="my-5 py-5">
  <div class="user-list container mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <div class="container">
      <h2 class="font-weight-bold text-center">UserList</h2>
      <hr class="mx-auto">
    </div>

    <table class="table table-dark mt-5 pt-5 text-white table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Profile</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">

        <?php while ($user = $ps->fetch()) { ?>
          <tr>
            <td class="align-middle">
              <?= $user['id'] ?>
            </td>
            <td class="align-middle">
              <img class="profile-img" src="../assets/images/users/<?= $user['photo'] ?>">
            </td>
            <td class="align-middle">
              <?= $user['username'] ?>
            </td>
            <td class="align-middle">
              <?= $user['email'] ?>
            </td>
            <td class="align-middle">
              <?= $user['role'] ?>
            </td>
            <td class="align-middle">
              <ul>
                <li>
                  <a href="#">Delete</a>
                </li>
                <li>
                  <a href="#">Upgrade to Admin</a>
                </li>
              </ul>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>