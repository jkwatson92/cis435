<?php include 'view/header.php'; ?>
<?php require('model/database.php'); ?>
<main>
    <nav>

    <h2>Administrators</h2>
    <ul>
        <li><a href="product_manager">Manage Products</a></li>
        <li><a href="technician_manager/index.php">Manage Technicians</a></li>
        <li><a href="manage_customers/index.php">Manage Customers</a></li>
        <li><a href="incident_manager/index.php">Create Incident</a></li>
        <li><a href="under_construction.php">Assign Incident</a></li>
        <li><a href="under_construction.php">Display Incidents</a></li>
    </ul>

    <h2>Technicians</h2>
    <ul>
        <li><a href="under_construction.php">Update Incident</a></li>
    </ul>

    <h2>Customers</h2>
    <ul>
        <li><a href="under_construction.php">Register Product</a></li>
    </ul>

    </nav>
</section>
<?php include 'view/footer.php'; ?>
