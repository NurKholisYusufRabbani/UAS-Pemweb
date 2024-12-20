<?php
include '../includes/db.php';
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok Portfolio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
    <h1>Daftar Anggota Kelompok</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <a href="member.php?id=<?= $user['id'] ?>">
                    <?= htmlspecialchars($user['name']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
