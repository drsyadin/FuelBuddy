<?php
if (isset($_POST['download']) && $_POST['download'] == 1) {
    include('dbconnect.php');

    // Fetch order report by fuel type
    $orderReportSql = "SELECT fuel_type, SUM(quantity) as total_quantity, COUNT(*) as order_count FROM orders GROUP BY fuel_type";
    $orderReportResult = mysqli_query($con, $orderReportSql);

    if (!$orderReportResult) {
        echo "Error: " . $orderReportSql . "<br>" . mysqli_error($con);
    } else {
        $filename = "order_report.csv";

        // Output CSV header
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // CSV header row
        fputcsv($output, array('Fuel Type', 'Total Quantity', 'Order Count'));

        // Data rows
        while ($row = mysqli_fetch_assoc($orderReportResult)) {
            fputcsv($output, $row);
        }

        fclose($output);
    }

    mysqli_close($con);
    exit();
}
?>
