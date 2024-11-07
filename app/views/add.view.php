<?php include 'components/header.php'; ?>

<body style="background: url('<?= ROOT?>/assets/images/bg.jpeg') no-repeat center center fixed; background-size: cover;">

    <section class="container my-2 bg-dark w-50 text-light p-2">
        <form class="row g-3 p-3" method="post">
            <!-- First row: First Name, Last Name, Username -->
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" name="firstname" value="<?= isset($data['firstname']) ? $data['firstname'] : '' ?>" required>
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" name="lastname" value="<?= isset($data['lastname']) ? $data['lastname'] : '' ?>" required>
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="validationCustomUsername" name="username" value="<?= isset($data['username']) ? $data['username'] : '' ?>" required>
                    <div class="invalid-feedback">Please choose a username.</div>
                </div>
            </div>

            <!-- Second row: Email and Password -->
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= isset($data['email']) ? $data['email'] : '' ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password" value="<?= isset($data['password']) ? $data['password'] : '' ?>" required>
            </div>

            <!-- Third row: Gender, City, Nationality -->
            <div class="col-md-4">
                <label for="inputGender" class="form-label">Gender</label>
                <select id="inputGender" name="gender" class="form-select" required>
                    <option value="" selected disabled>Choose...</option>
                    <option value="male" <?= (isset($data['gender']) && $data['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
                    <option value="female" <?= (isset($data['gender']) && $data['gender'] == 'female') ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" value="<?= isset($data['city']) ? $data['city'] : '' ?>" required>
            </div>
            <div class="col-md-4">
                <label for="inputNationality" class="form-label">Nationality</label>
                <input type="text" class="form-control" id="inputNationality" name="nationality" value="<?= isset($data['nationality']) ? $data['nationality'] : '' ?>" required>
            </div>

            <!-- Fourth row: NIC and Address -->
            <div class="col-12">
                <label for="inputNIC" class="form-label">NIC #</label>
                <input type="text" class="form-control" id="inputNIC" name="nic" value="<?= isset($data['nic']) ? $data['nic'] : '' ?>" placeholder="National Identity Card Number" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" value="<?= isset($data['address']) ? $data['address'] : '' ?>" placeholder="1234 Main St" required>
            </div>

            <!-- Checkbox and Submit button -->
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="terms">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>

        

    </section>

</body>
</html>
