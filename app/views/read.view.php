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
  <!-- Filter Form -->
<form method="get"  action="<?=ROOT?>/filter"class="mb-4 mx-auto" style="max-width: 1200px;">
  <div class="row mb-3 align-items-end">
    <!-- Filter By Label and Select Dropdown -->
    <div class="col-md-2">
      <label for="filterBy" class="form-label">Filter users by:</label>
      <select name="filterBy" id="filterBy" class="form-select">
        <option value="ID" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'ID' ? 'selected' : ''; ?>>ID</option>
        <option value="email" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'email' ? 'selected' : ''; ?>>Email</option>
        <option value="firstname" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'firstname' ? 'selected' : ''; ?>>First Name</option>
        <option value="lastname" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'lastname' ? 'selected' : ''; ?>>Last Name</option>
        <option value="username" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'username' ? 'selected' : ''; ?>>Username</option>
        <option value="address" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'address' ? 'selected' : ''; ?>>Address</option>
        <option value="nationality" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'nationality' ? 'selected' : ''; ?>>Nationality</option>
        <option value="nic" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'nic' ? 'selected' : ''; ?>>NIC</option>
        <option value="gender" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'gender' ? 'selected' : ''; ?>>Gender</option>
      </select>
    </div>

    <!-- Filter Value Label and Text Field -->
    <div class="col-md-3">
      <label for="filterValue" class="form-label">Filter value:</label>
      <input type="text" name="filterValue" id="filterValue" class="form-control" value="<?= isset($_GET['filterValue']) ? $_GET['filterValue'] : ''; ?>" placeholder="Enter value" />
    </div>

    <!-- Filter Button -->
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100">Filter</button>
     
    </div>
  </div>
</form>


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
            <th scope="col" style="word-wrap: break-word; white-space: normal; max-width: 250px; overflow: hidden; text-overflow: ellipsis;">Address</th> <!-- Adjusted address column -->
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
            <td style="word-wrap: break-word; white-space: normal; max-width: 250px; overflow: hidden; text-overflow: ellipsis;"><?= $user['address'] ?></td>
            <td><?= $user['nationality'] ?></td>
            <td><?= $user['nic'] ?></td>
            <td><?= $user['gender'] ?></td>
            <td>
            <div class="d-flex justify-content-center">
              <a class="btn btn-danger  d-inline m-2" href="<?=ROOT?>/delete?ID=<?= $user['ID'] ?>">Delete</a>
              <a class="btn btn-secondary  d-inline m-2" href="<?=ROOT?>/update?ID=<?= $user['ID'] ?>">Edit</a>
              <a class="btn btn-primary  d-inline m-2" href="<?=ROOT?>/readorder?ID=<?= $user['ID'] ?>">View Orders</a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </section>
</body>


