<?php
include '../includes/db.php';
// Example CRUD: Fetch all users and projects.
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
$projects = $pdo->query("SELECT * FROM projects")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Dashboard</h1>
    <h2>Users</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['name'] ?> (<?= $user['bio'] ?>)</li>
        <?php endforeach; ?>
    </ul>

    <h2>Projects</h2>
    <ul>
        <?php foreach ($projects as $project): ?>
            <li><?= $project['title'] ?> by User ID: <?= $project['user_id'] ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="add_project.php">Add New Project</a>
</body>
</html>
