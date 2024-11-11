<?php include 'components/header.php'; ?>

<body>
    <!-- Display Success or Error Message -->
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-info text-center">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>

    <section class="container my-5 w-50">
        <h2 class="text-center mb-4">Add New Order</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form method="post" >
            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer ID</label>
                <!-- Customer ID input field, set to auto-fill and non-editable -->
                <input type="number" class="form-control" id="customer_id" name="customer_id" value="<?= $user_order['customer_id'] ?? $_GET['ID'] ?? '' ?>"   readonly>
    
                                       

            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product" name="product" value="<?= isset($user_order['product']) ? $user_order['product'] : '' ?>" placeholder="Product Name" required> 
                
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity"  value="<?= isset($user_order['quantity']) ? $user_order['quantity'] : '' ?>" placeholder="Product Quantity"required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"  value="<?= isset($user_order['price']) ? $user_order['price'] : '' ?>" placeholder="Total Price"required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <!-- Status dropdown with options -->
                <select class="form-select" id="status" name="status" required>
                    <option value="pending" <?= (isset($user_order['status']) && $user_order['status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                    <option value="completed"<?= (isset($user_order['status']) && $user_order['status'] == 'completed') ? 'selected' : '' ?>>Completed</option>
                    <option value="cancelled"<?= (isset($user_order['status']) && $user_order['status'] == 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="order_date" class="form-label">Order Date</label>
                <input type="text" class="form-control" id="order_date" name="order_date" value="<?= isset($user_order['order_date']) ? $user_order['order_date'] : '' ?>" readonly>
            </div>
         
            <button type="submit" class="btn btn-primary w-100"> <?= isset($user_order) ? 'Update Order' : 'Add Order' ?>
        </form>
    </section>
</body>
