      <!-- if a message is sent, display it-->
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- remove the received a message -->
      <?php
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
      }
      ?>