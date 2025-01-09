<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Feedback Display</title>
    <style>
        /* Add your styles here */
        .feedback-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .feedback-card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 16px;
            padding: 16px;
            border-radius: 8px;
            width: 300px;
            text-align: left;
            transition: transform 0.3s;
        }

        .feedback-card:hover {
            transform: scale(1.05);
        }

        .feedback-id {
            font-weight: bold;
            color: #333;
        }

        .feedback-name,
        .feedback-email {
            color: #007bff;
            margin-top: 8px;
        }

        .feedback-message {
            margin-top: 16px;
            line-height: 1.4;
        }

        .feedback-created-at {
            margin-top: 8px;
            color: #888;
            font-size: 0.8rem;
        }

        p {
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>

    <?php include('adminnavbar.php'); ?>
    <?php include('dbconnect.php');?>

    <?php
    /* Fetch all feedback data */
    $sql = "SELECT * FROM feedback";
    $result = mysqli_query($con, $sql);

    /* Check if there are any feedbacks */
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="feedback-cards">';

        /* Output data of each row */
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="feedback-card">';
            echo '<div class="feedback-id">Feedback ID: ' . $row['feedback_id'] . '</div>';
            echo '<div class="feedback-name">Name: ' . $row['name'] . '</div>';
            echo '<div class="feedback-email">Email: ' . $row['email'] . '</div>';
            echo '<div class="feedback-message">Message: ' . $row['Message'] . '</div>';
            echo '<div class="feedback-created-at">Submitted at: ' . $row['created_at'] . '</div>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p>No feedbacks available.</p>';
    }
    ?>

</body>

</html>
