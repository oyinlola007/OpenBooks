<?php

$title = "User List";
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
              <a href="#" data-bs-toggle="modal" data-bs-target="#confirmationModalDelete<?= $user['id'] ?>">Delete</a>

              <!-- Modal -->
              <div class="modal fade" id="confirmationModalDelete<?= $user['id'] ?>" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-black">
                      <p>Are you sure you want to delete user '<?= $user['username'] ?>'?</p>
                      <p>(This process is irreversible)</p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a href="../server/delete_user.php?delete=<?= $user['id'] ?>">
                        <button type="button" class="btn btn-danger">Delete forever</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($user['role'] != 'admin') { ?>
                <a href="#" data-bs-toggle="modal" data-bs-target="#confirmationModalUpgrade<?= $user['id'] ?>">Upgrade to Admin</a>

                <!-- Modal -->
                <div class="modal fade" id="confirmationModalUpgrade<?= $user['id'] ?>" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body text-black">
                        <p>Are you sure you want to upgrade '<?= $user['username'] ?>' to Admin?</p>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="../server/upgrade_role.php?upgrade=<?= $user['id'] ?>">
                          <button type="button" class="btn btn-primary">Upgrade user </button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>
              </ul>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>