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
<form method="get"  action="<?=ROOT?>/filterorder"class="mb-4 mx-auto" style="max-width: 1200px;">
<input type="hidden" name="ID" value="<?= isset($_GET['ID']) ? $_GET['ID'] : ''; ?>">
  <div class="row mb-3 align-items-end">
    <!-- Filter By Label and Select Dropdown -->
    <div class="col-md-2">
      <label for="filterBy" class="form-label">Filter users by:</label>
      <select name="filterBy" id="filterBy" class="form-select">
        
        <option value="product" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'product' ? 'selected' : ''; ?>>Product Name</option>
        <option value="quantity" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'quantity' ? 'selected' : ''; ?>>Quantity</option>
        <option value="status" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'status' ? 'selected' : ''; ?>>Status</option>
        <option value="price" <?= isset($_GET['filterBy']) && $_GET['filterBy'] == 'price' ? 'selected' : ''; ?>>Price</option>
        
        
      </select>
    </div>

    <!-- Filter Value Label and Text Field -->
    <div class="col-md-3" >
      <label for="filterValue" class="form-label">Filter value:</label>
      <input type="text" name="filterValue" id="filterValue" class="form-control" value="<?= isset($_GET['filterValue']) ? $_GET['filterValue'] : ''; ?>" placeholder="Enter value" />
    </div>

    <!-- Filter Button -->
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100">Filter</button>
     
    </div>
  </div>
</form>

        <h2 class="text-center mb-4">Orders</h2>

        <?php if (empty($data['userOrders'])): ?>

            <div class="alert alert-warning text-center">
                No orders found.
            </div>
        <?php else: ?>
            <table class="table table-striped table-hover text-center mx-auto">
                <thead>
                    <tr>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['userOrders'] as $userorder): ?>
                        <tr>
                            <th scope="row"><?= $userorder['customer_id'] ?></th>
                            <td><?=$userorder['order_id'] ?></td>
                            <td><?= $userorder['product'] ?></td>
                            <td><?= $userorder['quantity'] ?></td>
                            <td><?= $userorder['price'] ?></td>
                            <td><?=$userorder['status'] ?></td>
                            <td>
                         <div class="d-flex justify-content-center">
                         <a class="btn btn-danger  d-inline m-2" href="<?=ROOT?>/deleteorder?order_id=<?= $userorder['order_id'] ?>&customer_id=<?= $userorder['customer_id'] ?>">Delete</a>

                                                    
                         <a class="btn btn-secondary  d-inline m-2"href="<?=ROOT?>/updateorder?order_id=<?= $userorder['order_id'] ?>&customer_id=<?= $userorder['customer_id'] ?>">Edit</a>
             
              </div>
            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>

    
</body>
