<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <title>Customer Details</title>
</head> 
<body>

    <?php include('dbconnect.php'); // Include your database connection file
 include('adminnavbar.php');
    // Fetch all customer names
    $customerNamesSql = "SELECT DISTINCT customer_name FROM customer_details";
    $customerNamesResult = mysqli_query($con, $customerNamesSql);

    // Check if there are any customer names
    if (mysqli_num_rows($customerNamesResult) > 0) {
        // Display a dropdown to select customer name
        echo '<div class="container">';
        echo '<form method="post">';
        echo '<label for="customer_name">Select Customer Name:</label>';
        echo '<select name="customer_name" id="customer_name" required>';

        while ($row = mysqli_fetch_assoc($customerNamesResult)) {
            echo "<option value='" . $row['customer_name'] . "'>" . $row['customer_name'] . "</option>";
        }

        echo '</select>';
        echo '<br>';
        echo '<button type="submit" name="submit">View Details</button>';
        echo '</form>';
        echo '</div>';
    } else {
        echo '<p>No customer names available.</p>';
    }

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $selectedCustomerName = mysqli_real_escape_string($con, $_POST['customer_name']);

        // Fetch details for the selected customer name
        $customerDetailsSql = "SELECT * FROM customer_details WHERE customer_name = '$selectedCustomerName'";
        $customerDetailsResult = mysqli_query($con, $customerDetailsSql);

        // Check if there are any details
        if (mysqli_num_rows($customerDetailsResult) > 0) {
            // Display customer details in a table
            echo '<div class="container">';
            echo '<table>';
            echo '<tr>';
            echo '<th>Customer ID</th>';
            echo '<th>Customer Name</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '<th>Address</th>';
            echo '</tr>';

            // Output data of each row
            while ($row = mysqli_fetch_assoc($customerDetailsResult)) {
                echo '<tr>';
                echo '<td>' . $row['customer_id'] . '</td>';
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '<br>';
            echo '<form action="download_customer_details.php" method="post">';
            echo '<input type="hidden" name="customer_name" value="' . $selectedCustomerName . '">';
            echo '<button type="submit" name="download" value="1">Download CSV</button>';
            echo '</form>';
            echo '</div>';
        } else {
            echo '<p>No details available for the selected customer name.</p>';
        }
    }

    mysqli_close($con);
    ?>

</body>

</html>
