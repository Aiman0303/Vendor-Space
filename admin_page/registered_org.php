<?php
include '../Login/connect.php';
session_start();

if (!isset($_SESSION['isAdmin'])) {
    header("Location: registered_org.php");
    exit();
}

$query = "SELECT * FROM user";
$result = $conn->query($query);

if (!$result) {
    die("Database query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Organizations</title>
    <link rel="stylesheet" href="registerOrg.css">
</head>
<body>
    <div class="container-1">
        <h1>Registered Organizations</h1>
        <button id="Logout" onclick="window.location.href='../admin_page/admin_logout.php'">LogOut</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Organization Name</th>
                    <th>Organization Email</th>
                    <th>SSM</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Event_ID']); ?></td>
                        <td><?= htmlspecialchars($row['firstName']); ?></td>
                        <td><?= htmlspecialchars($row['lastName']); ?></td>
                        <td><?= htmlspecialchars($row['Org_name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['ssm']); ?></td>
                        <td><?= htmlspecialchars($row['Status']); ?></td>
                        <td>
                            <?php if ($row['Status'] === 'Pending') { ?>
                                <form method="POST" action="process_approval.php" style="display: inline;">
                                    <input type="hidden" name="Event_ID" value="<?= $row['Event_ID']; ?>">
                                    <button type="submit" name="action" value="approve">Approve</button>
                                    <button type="submit" name="action" value="reject">Reject</button>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>