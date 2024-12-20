<?php
include '../includes/db.php';
include '../includes/functions.php';

// Ambil ID dari URL atau set ke default 0
$id = $_GET['id'] ?? 0;

// Ambil data user dan proyek dari database
$user = fetchUser($pdo, $id);
$projects = fetchProjectsByUser($pdo, $id);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($user['name']) ?>'s Profile</title>
    <link rel="stylesheet" href="/portfolio/public/assets/css/styles.css">
</head>
<body>
    <h1><?= htmlspecialchars($user['name']) ?></h1>
    <p><?= htmlspecialchars($user['bio']) ?></p>

    <!-- Tampilkan gambar user -->
    <?php if (!empty($user['image'])): 
        // Perbaiki path file dengan memastikan path benar
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . "/portfolio/public/assets/images/" . $user['image'];
        if (file_exists($imagePath)): ?>
            <img src="/portfolio/public/assets/images/<?= htmlspecialchars($user['image']) ?>" 
                 alt="<?= htmlspecialchars($user['name']) ?>'s Profile Picture">
        <?php else: ?>
            <p>Gambar tidak ditemukan di lokasi: <strong><?= $imagePath ?></strong></p>
        <?php endif; ?>
    <?php else: ?>
        <p>No image available.</p>
    <?php endif; ?>

    <h2>Projects</h2>
    <ul>
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <li>
                    <h3><?= htmlspecialchars($project['title']) ?></h3>
                    <p><?= htmlspecialchars($project['description']) ?></p>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No projects available.</p>
        <?php endif; ?>
    </ul>
</body>
</html>
