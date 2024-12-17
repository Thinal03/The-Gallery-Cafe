<!DOCTYPE html>
<html>
<head>
    <title>Operational Staff Panel - Reservations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btn {
            margin-right: 5px;
        }
        .message {
            color: green;
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Reservations</h2>
    <?php
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "the_gallery_cafe");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Handling POST requests
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['delete'])) {
            $email = $_POST['email'];
            $sql = "DELETE FROM reservation WHERE Email='$email'";
            if (mysqli_query($conn, $sql)) {
                echo "<p class='message'>Reservation deleted successfully</p>";
            } else {
                echo "<p class='error'>ERROR: Could not delete reservation. " . mysqli_error($conn) . "</p>";
            }
        } elseif (isset($_POST['custom_action'])) {
            $email = $_POST['email'];
            $sql = "UPDATE reservation SET Area='Custom Action Taken' WHERE Email='$email'";
            if (mysqli_query($conn, $sql)) {
                echo "<p class='message'>Custom action applied successfully</p>";
            } else {
                echo "<p class='error'>ERROR: Could not apply custom action. " . mysqli_error($conn) . "</p>";
            }
        }
    }

    // Fetch data from the database
    $sql = "SELECT * FROM reservation";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Phone</th>";
        echo "<th>Email</th>";
        echo "<th>Date</th>";
        echo "<th>Time</th>";
        echo "<th>Area</th>";
        echo "<th>Number of Seats</th>";
        echo "<th>Actions</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
            echo "<td>" . $row['Time'] . "</td>";
            echo "<td>" . $row['Area'] . "</td>";
            echo "<td>" . $row['NumberOfSeats'] . "</td>";
            echo "<td>
                    <form style='display:inline;' method='POST' action=''>
                        <input type='hidden' name='email' value='" . $row['Email'] . "'>
                        <button type='submit' name='delete' class='action-btn'>Delete</button>
                    </form>
                    <form style='display:inline;' method='POST' action=''>
                        <input type='hidden' name='email' value='" . $row['Email'] . "'>
                        <button type='submit' name='custom_action' class='action-btn'>Custom Action</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No reservations found.";
    }

    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>
