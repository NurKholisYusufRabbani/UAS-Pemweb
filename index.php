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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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
                    <a class="nav-link" href="#members">Lihat Anggota</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero-section text-center text-white">
        <div class="container py-5">
            <h1 id="hero-text"></h1>
            <p id="hero-desc"></p>
        </div>
    </section>

    <div class="container my-4">

        <!-- About Section -->
         <section class="about-section">
            <div class="container text-center">
                <h2 class="mb-4">Tentang Kami</h2>
                <p>Kelompok kami terdiri dari individu-individu berbakat yang berkontribusi di berbagai bidang, seperti pengembangan web, desain grafis, dan banyak lagi.</p>
            </div>
        </section>

        <!-- Members Section -->
        <section id="members" class="members-section">
            <div class="container">
                <h2 class="text-center mb-4">Anggota Kami</h2>
                <div class="row justify-content-center">
                    <?php
                    include('db.php');
                    $result = $conn->query("SELECT id, name, photo FROM users");
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $photo = htmlspecialchars($row['photo']) ?: 'default.jpg';
                            echo "
                            <div class='col-md-4 mb-4 d-flex justify-content-center'> <!-- Tambahkan justify-content-center -->
                                <a href='portfolio.php?id=" . htmlspecialchars($row['id']) . "' class='text-decoration-none'>
                                    <div class='card border-0 shadow-sm'>
                                        <img src='assets/img/profile/" . $photo . "' class='card-img-top' alt='Foto profil anggota: " . htmlspecialchars($row['name']) . "' loading='lazy'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>" . htmlspecialchars($row['name']) . "</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>";
                        }
                    } else {
                        echo "<p class='text-danger text-center'>Data tidak tersedia saat ini.</p>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section py-5">
            <div class="container text-center">
                <h2 class="mb-4">Hubungi Kami</h2>
                <p>Jika Anda memiliki pertanyaan atau ingin bergabung dengan tim kami, jangan ragu untuk menghubungi kami.</p>
                <div class="social-icons">
                    <a href="https://www.instagram.com/yusufrabbani6/" target="_blank" class="text-white mx-3">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/nur-kholis-yusuf-rabbani/" target="_blank" class="text-white mx-3">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                    <a href="https://github.com/NurKholisYusufRabbani" target="_blank" class="text-white mx-3">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Custom JS -->
        <script src="assets/js/script.js"></script>

    </div>
    <footer class="text-center bg-dark py-2">
        <p>&copy; 2024 Kelompok 9 Portfolio</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>