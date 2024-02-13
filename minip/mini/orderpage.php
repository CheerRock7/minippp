<?php
// Fetch orders from the database
$stmt_orders = $conn->prepare('SELECT * FROM orders');
$stmt_orders->execute();
$result_orders = $stmt_orders->get_result();

if ($result_orders->num_rows > 0) {
    echo '<div class="text-center">
            <h2>Order History</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Payment Mode</th>
                        <th>Products</th>
                        <th>Amount Paid</th>
                    </tr>
                </thead>
                <tbody>';
    
    while ($row = $result_orders->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['pmode'] . '</td>
                <td>' . $row['products'] . '</td>
                <td>' . number_format($row['amount_paid'], 2) . '</td>
              </tr>';
    }

    echo '</tbody>
        </table>
    </div>';
} else {
    echo '<div class="text-center">
            <h2>No Orders Found</h2>
          </div>';
}

// Close the statement
$stmt_orders->close();
?>