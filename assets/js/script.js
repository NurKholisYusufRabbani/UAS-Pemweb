// Custom JavaScript

document.addEventListener("DOMContentLoaded", () => {
    const textElement = document.getElementById("hero-text");
    const descElement = document.getElementById("hero-desc");
    
    const text = "Selamat Datang di Portfolio Kami";
    const description = "Temukan karya terbaik dari anggota tim kami!";
    
    let textIndex = 0;
    let descIndex = 0;

    // Fungsi mengetik untuk teks utama
    const typeText = () => {
        if (textIndex < text.length) {
            textElement.textContent = text.slice(0, textIndex + 1);
            textIndex++;
            setTimeout(typeText, 100); // Kecepatan mengetik
        } else {
            // Mulai mengetik deskripsi setelah teks utama selesai
            typeDesc();
        }
    };

    // Fungsi mengetik untuk deskripsi
    const typeDesc = () => {
        if (descIndex < description.length) {
            descElement.textContent = description.slice(0, descIndex + 1);
            descIndex++;
            setTimeout(typeDesc, 100); // Kecepatan mengetik
        }
    };

    // Mulai proses mengetik
    typeText();
});