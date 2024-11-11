<?php include 'components/header.php'; ?>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Orders with User Info</h2>

        <?php if (empty($data['ordersWithUserInfo'])): ?>
            <div class="alert alert-warning text-center">
                No orders found.
            </div>
        <?php else: ?>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Username</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['ordersWithUserInfo'] as $order): ?>
                        <tr>
                            <td><?= $order['order_id'] ?></td>
                            <td><?= $order['product'] ?></td>
                            <td><?= $order['quantity'] ?></td>
                            <td><?= $order['price'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td><?= $order['username'] ?></td>
                            <td><?= $order['firstname'] ?></td>
                            <td><?= $order['lastname'] ?></td>
                            <td><?= $order['gender'] ?></td>
                            <td><?= $order['nationality'] ?></td>
                            <td><?= $order['address'] ?></td>
                           <td> <div class="d-flex justify-content-center">
                         <a class="btn btn-secondary  d-inline m-2" href="">Edit</a>
                    </div>
                    </body></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0BrEAkMwd3Zw4fTz5rT8U6zN5EoPj/ApNd4DlGbXK8qPccAO" crossorigin="anonymous"></script>
</body>
</html>
