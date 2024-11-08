<?php include 'components/header.php'; ?>

<body>
  <!-- Display Success or Error Message -->
  <?php
  if (isset($_SESSION['message'])) {
      echo '<div class="alert alert-info text-center">' . $_SESSION['message'] . '</div>';
      unset($_SESSION['message']);
  }
  ?>

  <section class="container my-5 w-75">
    <?php if (empty($users)): ?>
      <!-- No users message -->
      <div class="alert alert-warning text-center">
        No users exist.
      </div>
    <?php else: ?>
      <!-- Table displaying users -->
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
            <div class="d-flex justify-content-center">
              <a class="btn btn-danger  d-inline m-2" href="<?=ROOT?>/delete?ID=<?= $user['ID'] ?>">Delete</a>
              <a class="btn btn-secondary  d-inline m-2" href="<?=ROOT?>/update?ID=<?= $user['ID'] ?>">Edit</a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </section>
</body>


