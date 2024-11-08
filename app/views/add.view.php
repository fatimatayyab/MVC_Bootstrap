<?php include 'components/header.php'; ?>

<body style="background: url('<?= ROOT?>/assets/images/bg.jpeg') no-repeat center center fixed; background-size: cover;">

    <section class="container my-2 bg-dark w-50 text-light p-2">
        <form class="row g-3 p-3" method="post">
          <!-- First row: First Name, Last Name, Username -->
<div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" name="firstname" value="<?= isset($user['firstname']) ? $user['firstname'] : '' ?>" placeholder="First Name" required>
   
</div>
<div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" name="lastname" value="<?= isset($user['lastname']) ? $user['lastname'] : '' ?>" placeholder="Last Name" required>
    <div class="valid-feedback">Looks good!</div>
</div>
<div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <input type="text" class="form-control <?= isset($data['errors']['username']) ? 'is-invalid' : '' ?>" id="validationCustomUsername" name="username" value="<?= isset($user['username']) ? $user['username'] : '' ?>" placeholder="User Name" <?= isset($user['username']) ? 'readonly' : '' ?> required>
    <?php if (isset($data['errors']['username'])): ?>
        <div class="invalid-feedback"><?= $data['errors']['username']; ?></div>
    <?php endif; ?>
</div>

<!-- Second row: Email and Password -->
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control <?= isset($data['errors']['email']) ? 'is-invalid' : '' ?>" id="inputEmail4" name="email" value="<?= isset($user['email']) ? $user['email'] : '' ?>" placeholder="example@example.com" <?= isset($user['email']) ? 'readonly' : '' ?> required>
    <?php if (isset($data['errors']['email'])): ?>
        <div class="invalid-feedback"><?= $data['errors']['email']; ?></div>
    <?php endif; ?>
</div>
<div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password" value="<?= isset($user['password']) ? $user['password'] : '' ?>" placeholder="Password" required>
    <?php if (isset($data['errors']['password'])): ?>
        <p class="error"><?= $data['errors']['password']; ?></p>
    <?php endif; ?></div>

            <!-- Third row: Gender, Nationality, NIC -->
            <div class="col-md-4">
                <label for="inputGender" class="form-label">Gender</label>
                <select id="inputGender" name="gender" class="form-select" required>
                    <option value="" disabled <?= !isset($user['gender']) ? 'selected' : '' ?>>Choose...</option>
                    <option value="male" <?= (isset($user['gender']) && $user['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
                    <option value="female" <?= (isset($user['gender']) && $user['gender'] == 'female') ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputNationality" class="form-label">Nationality</label>
                <input type="text" class="form-control" id="inputNationality" name="nationality" value="<?= isset($user['nationality']) ? $user['nationality'] : '' ?>" placeholder="Nationality" required>
                 </div>
            <div class="col-md-4">
                <label for="inputNIC" class="form-label">NIC #</label>
                <input type="text" class="form-control <?= isset($data['errors']['nic']) ? 'is-invalid' : '' ?>" id="inputNIC" name="nic" value="<?= isset($user['nic']) ? $user['nic'] : '' ?>" placeholder="National Identity Card Number" required>
           <?php if (isset($data['errors']['nic'])): ?>
            <div class="invalid-feedback"><?= $data['errors']['nic']; ?></div>
    <?php endif; ?> </div>

            <!-- Fourth row: Address -->
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" value="<?= isset($user['address']) ? $user['address'] : '' ?>" placeholder="1234 Main St" required>
            </div>

            
          

            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <?= isset($user) ? 'Update' : 'Add' ?>
                </button>
            </div>
        </form>
    </section>

</body>
</html>
