<?php
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $pai = $_POST['pai'];
    $ppkn = $_POST['ppkn'];
    $b_indo = $_POST['b_indo'];
    $matematika = $_POST['matematika'];
    $ipas = $_POST['ipas'];
    $pjok = $_POST['pjok'];
    $sbjp = $_POST['sbjp'];
    $b_inggris = $_POST['b_inggris'];
    $b_sunda = $_POST['b_sunda'];
    $plh = $_POST['plh'];
    $jumlah_nilai = $pai + $ppkn + $b_indo + $matematika + $ipas + $pjok + $sbjp + $b_inggris + $b_sunda + $plh;
    $rata_rata = $jumlah_nilai / 10;

    $stmt = $pdo->prepare('INSERT INTO nilai (NISN, nama_siswa, PAI, PPKN, B_INDO, MATEMATIKA, IPAS, PJOK, SBJP, B_INGGRIS, B_SUNDA, PLH, Jumlah_nilai, Rata_rata) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nisn, $nama_siswa, $pai, $ppkn, $b_indo, $matematika, $ipas, $pjok, $sbjp, $b_inggris, $b_sunda, $plh, $jumlah_nilai, $rata_rata]);

    header('Location: read.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Siswa</title>
    <link rel="stylesheet" type="text/css" href="css/create_styles.css">
</head>
<body>
    <h1>Penambahan Data Raport</h1>
    <form method="POST" action="">
        <div class="input-group">
            <label for="nisn">NISN:</label>
            <input type="text" id="nisn" name="nisn" required>
        </div>
        <div class="input-group">
            <label for="nama_siswa">Nama Siswa:</label>
            <input type="text" id="nama_siswa" name="nama_siswa" required>
        </div>
        <div class="input-group">
            <label for="pai">PAI:</label>
            <input type="number" id="pai" name="pai" required>
        </div>
        <div class="input-group">
            <label for="ppkn">PPKN:</label>
            <input type="number" id="ppkn" name="ppkn" required>
        </div>
        <div class="input-group">
            <label for="b_indo">B. INDO:</label>
            <input type="number" id="b_indo" name="b_indo" required>
        </div>
        <div class="input-group">
            <label for="matematika">Matematika:</label>
            <input type="number" id="matematika" name="matematika" required>
        </div>
        <div class="input-group">
            <label for="ipas">IPAS:</label>
            <input type="number" id="ipas" name="ipas" required>
        </div>
        <div class="input-group">
            <label for="pjok">PJOK:</label>
            <input type="number" id="pjok" name="pjok" required>
        </div>
        <div class="input-group">
            <label for="sbjp">SBJP:</label>
            <input type="number" id="sbjp" name="sbjp" required>
        </div>
        <div class="input-group">
            <label for="b_inggris">B. Inggris:</label>
            <input type="number" id="b_inggris" name="b_inggris" required>
        </div>
        <div class="input-group">
            <label for="b_sunda">B. Sunda:</label>
            <input type="number" id="b_sunda" name="b_sunda" required>
        </div>
        <div class="input-group">
            <label for="plh">PLH:</label>
            <input type="number" id="plh" name="plh" required>
        </div>
        <button type="submit">Buat</button>
    </form>
    <a href="read.php">Kembali ke yang tadi</a>
</body>
</html>
