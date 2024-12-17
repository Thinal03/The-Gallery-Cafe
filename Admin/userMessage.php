<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Messages Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h2 {
            
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    <div class="container">
        <h2>User Messages </h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "the_gallery_cafe");

        if ($conn === false) {
            die("<p class='error'>ERROR: Could not connect. " . mysqli_connect_error() . "</p>");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete'])) {
                $email = $_POST['email'];
                $sql = "DELETE FROM Usermessage WHERE email='$email'";
                if (mysqli_query($conn, $sql)) {
                    echo "<p class='message'>Record deleted successfully</p>";
                } else {
                    echo "<p class='error'>ERROR: Could not delete record. " . mysqli_error($conn) . "</p>";
                }
            } elseif (isset($_POST['custom_action'])) {
                $email = $_POST['email'];
                $sql = "UPDATE Usermessage SET subject='Action Taken' WHERE email='$email'";
                if (mysqli_query($conn, $sql)) {
                    echo "<p class='message'>Customer message Solved successfully</p>";
                } else {
                    echo "<p class='error'>ERROR: Could not apply custom action. " . mysqli_error($conn) . "</p>";
                }
            }
        }

        $sql = "SELECT * FROM Usermessage";
        $result = mysqli_query($conn, $sql);

        echo '<table>';
        echo '<tr><th>Name</th><th>Email</th><th>Phone</th><th>Subject</th><th>Message</th><th>Actions</th></tr>';

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Email'] . '</td>';
                echo '<td>' . $row['Phone_Number'] . '</td>';
                echo '<td>' . $row['Subject'] . '</td>';
                echo '<td>' . $row['Message'] . '</td>';
                echo '<td>
                        <form style="display:inline;" method="POST" action="">
                            <input type="hidden" name="email" value="' . $row['Email'] . '">
                            <button type="submit" name="delete" class="action-btn">Delete</button>
                        </form>
                        <form style="display:inline;" method="POST" action="">
                            <input type="hidden" name="email" value="' . $row['Email'] . '">
                            <button type="submit" name="custom_action" class="action-btn">Seen</button>
                        </form>
                      </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6">No messages found</td></tr>';
        }

        echo '</table>';

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
