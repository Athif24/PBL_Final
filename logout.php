<?php
    // Memeriksa apakah sesi telah dimulai
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Menghancurkan semua data sesi
    session_destroy();

    // Mengarahkan pengguna ke halaman login
    header('Location: login.php');
    exit(); // Pastikan skrip berhenti setelah header redirection
?>
