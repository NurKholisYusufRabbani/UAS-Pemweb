<?php
include('db.php'); // Koneksi ke database

// Cek apakah ID user diberikan
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query untuk mengambil data pengguna
    $userQuery = $conn->prepare("SELECT name, photo, bio FROM users WHERE id = ?");
    $userQuery->bind_param("i", $id);
    $userQuery->execute();
    $userResult = $userQuery->get_result();

    if ($userResult->num_rows > 0) {
        $user = $userResult->fetch_assoc();
    } else {
        $user = null;
    }

    // Query untuk mengambil data pendidikan
    $educationQuery = $conn->prepare("SELECT school_name, start_year, end_year FROM education WHERE user_id = ?");
    $educationQuery->bind_param("i", $id);
    $educationQuery->execute();
    $educationResult = $educationQuery->get_result();

    // Query untuk mengambil data proyek
    $projectQuery = $conn->prepare("SELECT project_name, description, photo, url FROM projects WHERE user_id = ?");
    $projectQuery->bind_param("i", $id);
    $projectQuery->execute();
    $projectResult = $projectQuery->get_result();

    // Query untuk mengambil data skill, termasuk logo_url
    $skillQuery = $conn->prepare("SELECT category, name, logo_url FROM skills WHERE user_id = ?");
    $skillQuery->bind_param("i", $id);
    $skillQuery->execute();
    $skillResult = $skillQuery->get_result();

    // Query untuk mengambil data sertifikat
    $certificateQuery = $conn->prepare("SELECT certificate_name, issuer, date_issued, certificate_url FROM certificates WHERE user_id = ?");
    $certificateQuery->bind_param("i", $id);
    $certificateQuery->execute();
    $certificateResult = $certificateQuery->get_result();
} else {
    $user = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Kelompok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="56">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand">Kelompok 9 Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#education">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#certificates">Certificates</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if ($user): ?>
            <!-- Hero Section -->
            <div class="hero-port text-center bg-primary text-white py-5" id="about">
                <h1 class="display-4"><?php echo htmlspecialchars($user['name']); ?></h1>
                <img src="assets/img/profile/<?php echo htmlspecialchars($user['photo']); ?>" alt="<?php echo htmlspecialchars($user['name']); ?>" class="rounded-circle shadow my-3">
                <p class="lead"><?php echo nl2br(htmlspecialchars($user['bio'])); ?></p>
            </div>

            <!-- Education Section -->
            <div id="education">
                <h2 class="mt-5 text-center">Education</h2>
                <div class="row">
                    <?php if ($educationResult->num_rows > 0): ?>
                        <?php while ($row = $educationResult->fetch_assoc()): ?>
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['school_name']); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($row['start_year']) . " - " . htmlspecialchars($row['end_year']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center text-danger">No education data available.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Projects Section -->
            <div id="projects">
                <h2 class="mt-5 text-center">Projects</h2>
                <div class="row">
                    <?php if ($projectResult->num_rows > 0): ?>
                        <?php while ($row = $projectResult->fetch_assoc()): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-lg border-0 rounded-3">
                                    <img src="assets/img/project/<?php echo htmlspecialchars($row['photo']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['project_name']); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['project_name']); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                                        <a href="<?php echo htmlspecialchars($row['url']); ?>" class="btn btn-primary btn-lg" target="_blank">Visit Project</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center text-danger">No projects available.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Skills Section -->
            <div id="skills">
                <h2 class="mt-5 text-center">Skills</h2>
                <div class="row">
                    <?php if ($skillResult->num_rows > 0): ?>
                        <?php while ($row = $skillResult->fetch_assoc()): ?>
                            <div class="col-md-3 mb-3">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        <!-- Menampilkan logo jika ada -->
                                        <?php if (!empty($row['logo_url'])): ?>
                                            <img src="assets/img/logo/<?php echo htmlspecialchars($row['logo_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="img-fluid mb-3" style="max-height: 50px;">
                                        <?php endif; ?>
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                                        <p class="card-text text-muted"><?php echo htmlspecialchars($row['category']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center text-danger">No skills data available.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Certificates Section -->
            <div id="certificates">
                <h2 class="mt-5 text-center">Certificates</h2>
                <div class="row">
                    <?php if ($certificateResult->num_rows > 0): ?>
                        <?php while ($row = $certificateResult->fetch_assoc()): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['certificate_name']); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($row['issuer']); ?></p>
                                        <p class="card-text"><small class="text-muted">Issued: <?php echo date('d M Y', strtotime($row['date_issued'])); ?></small></p>
                                        <?php if (!empty($row['certificate_url'])): ?>
                                            <a href="assets/img/sertif/<?php echo htmlspecialchars($row['certificate_url']); ?>" class="btn btn-primary" target="_blank">View Certificate</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center text-danger">No certificates available.</p>
                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>
            <p class="text-center text-danger">User not found.</p>
        <?php endif; ?>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-1 mt-5">
    <p>&copy; 2024 Kelompok 9 Portfolio. All Rights Reserved.</p>
    <p>
        <a href="#" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
        <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-white mx-2"><i class="fab fa-linkedin"></i></a>
    </p>
    </footer>
</body>
</html>
