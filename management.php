<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = '';
$dbname = "IMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1 {
            text-align: center;
            text-decoration: underline;
        }

        h2 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Inventory Management System</h1>

    <!-- Display Suppliers -->
    <?php
    $sql_suppliers = "SELECT * FROM suppliers";
    $result_suppliers = $conn->query($sql_suppliers);

    if ($result_suppliers->num_rows > 0) {
        echo "<h2>Suppliers</h2>";
        echo "<table>";
        echo "<tr><th>SupID</th><th>Name</th><th>Phone Number</th></tr>";

        while ($row = $result_suppliers->fetch_assoc()) {
            echo "<tr><td>{$row['SupID']}</td><td>{$row['name']}</td><td>{$row['phone_number']}</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No supplier data found.</p>";
    }
    ?>

    <!-- Display Supplies -->
    <?php
    $sql_supplies = "SELECT * FROM supplies";
    $result_supplies = $conn->query($sql_supplies);

    if ($result_supplies->num_rows > 0) {
        echo "<h2>Supplies</h2>";
        echo "<table>";
        echo "<tr><th>SID</th><th>Item</th><th>Price</th><th>SupID</th></tr>";

        while ($row = $result_supplies->fetch_assoc()) {
            echo "<tr><td>{$row['SID']}</td><td>{$row['item']}</td><td>{$row['price']}</td><td>{$row['SupID']}</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No supply data found.</p>";
    }
    ?>

    <!-- Display Customers -->
    <?php
    $sql_customers = "SELECT * FROM customers";
    $result_customers = $conn->query($sql_customers);

    if ($result_customers->num_rows > 0) {
        echo "<h2>Customers</h2>";
        echo "<table>";
        echo "<tr><th>CusID</th><th>Name</th><th>Address</th><th>Phone Number</th></tr>";

        while ($row = $result_customers->fetch_assoc()) {
            echo "<tr><td>{$row['CusID']}</td><td>{$row['name']}</td><td>{$row['address']}</td><td>{$row['phone_number']}</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No customer data found.</p>";
    }
    ?>

    <!-- Display Invoices -->
    <?php
    $sql_invoices = "SELECT * FROM invoice";
    $result_invoices = $conn->query($sql_invoices);

    if ($result_invoices->num_rows > 0) {
        echo "<h2>Invoices</h2>";
        echo "<table>";
        echo "<tr><th>InvID</th><th>CusID</th><th>SupID</th><th>Quantity</th><th>Total Price</th><th>Sale Date</th></tr>";

        while ($row = $result_invoices->fetch_assoc()) {
            echo "<tr><td>{$row['InvID']}</td><td>{$row['CusID']}</td><td>{$row['SupID']}</td><td>{$row['quantity']}</td><td>{$row['total_price']}</td><td>{$row['sale_date']}</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No invoice data found.</p>";
    }
    ?>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
