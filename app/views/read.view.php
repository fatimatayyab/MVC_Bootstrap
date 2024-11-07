<?php
include 'components/header.php';
include 'components/button.php';
?>
<body>
  <!-- Display Success or Error Message -->
  <?php
  if (isset($_SESSION['message'])) {
      echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
      unset($_SESSION['message']);
  }
  ?>

  <section class="container my-2 w-75">
    <table class="table table-striped table-hover text-center mx-auto">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Address</th>
          <th scope="col">Nationality</th>
          <th scope="col">NIC</th>
          <th scope="col">Gender</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
          <th scope="row"><?= $user['ID'] ?></th>
          <td><?= $user['firstname'] ?></td>
          <td><?= $user['lastname'] ?></td>
          <td><?= $user['username'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['address'] ?></td>
          <td><?= $user['nationality'] ?></td>
          <td><?= $user['nic'] ?></td>
          <td><?= $user['gender'] ?></td>
          <td>
            <form action="<?= ROOT ?>/deleteUser" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?= $user['ID'] ?>">
                <button type="submit" class="btn btn-danger btn-sm m-1">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</body>
