<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "the_gallery_cafe");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_user'])) {
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Prepare and execute the INSERT statement
        $stmt = $conn->prepare("INSERT INTO users (phone, email, username, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",  $phone, $email, $username, $password,  $role);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['update_user'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and execute the UPDATE statement
        $stmt = $conn->prepare("UPDATE users SET email=?, username=?, password=? WHERE id=?");
        $stmt->bind_param("sssi", $email, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_user'])) {
        $id = $_POST['id'];

        // Prepare and execute the DELETE statement
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch all users
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Users</h1>

    <h2>Add User</h2>
    <form method="POST">
        <label for="phone">phone:</label>
        <input type="tel" name="phone" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
        </select>
    

        <button type="submit" name="add_user">Add User</button>
    </form>

    <h2>New Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>User Type</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['phone']; ?></td></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                        <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                        <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
                        <button type="submit" name="update_user">Update</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_user">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php mysqli_close($conn); ?>
</body>

</html>
