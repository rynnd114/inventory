<?php
$host = 'localhost';
$db = 'inventory';
$user = 'root';
$pass = '';

setlocale(LC_TIME, 'id_ID');

// Fungsi untuk mengonversi bulan ke bahasa Indonesia
function bulanIndonesia($bulan) {
    $bulanArray = array(
        'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus',
        'September', 'Oktober', 'November', 'Desember'
    );
    return $bulanArray[intval($bulan) - 1];
}

// Fungsi untuk mengonversi hari ke bahasa Indonesia
function hariIndonesia($hari) {
    $hariArray = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu',
        'Kamis', 'Jumat', 'Sabtu'
    );
    return $hariArray[$hari];
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
