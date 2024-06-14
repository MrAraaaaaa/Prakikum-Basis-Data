<?php
require 'includes/db.php';

$nisn = $_GET['NISN'];
$stmt = $pdo->prepare('SELECT * FROM nilai WHERE NISN = ?');
$stmt->execute([$nisn]);
$s = $stmt->fetch();

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

    $stmt = $pdo->prepare('UPDATE nilai SET nama_siswa = ?, PAI = ?, PPKN = ?, B_INDO = ?, MATEMATIKA = ?, IPAS = ?, PJOK = ?, SBJP = ?, B_INGGRIS = ?, B_SUNDA = ?, PLH = ?, Jumlah_nilai = ?, Rata_rata = ? WHERE NISN = ?');
    $stmt->execute([$nama_siswa, $pai, $ppkn, $b_indo, $matematika, $ipas, $pjok, $sbjp, $b_inggris, $b_sunda, $plh, $jumlah_nilai, $rata_rata, $nisn]);

    header('Location: read.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Raport</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Data Raport</h1>
        <form method="POST" action="">
            <div class="input-group">
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" value="<?= htmlspecialchars($s['NISN']) ?>" readonly>
            </div>
            <div class="input-group">
                <label for="nama_siswa">Nama Siswa:</label>
                <input type="text" id="nama_siswa" name="nama_siswa" value="<?= htmlspecialchars($s['nama_siswa']) ?>" required>
            </div>
            <div class="input-group">
                <label for="pai">PAI:</label>
                <input type="number" id="pai" name="pai" value="<?= htmlspecialchars($s['PAI']) ?>" required>
            </div>
            <div class="input-group">
                <label for="ppkn">PPKN:</label>
                <input type="number" id="ppkn" name="ppkn" value="<?= htmlspecialchars($s['PPKN']) ?>" required>
            </div>
            <div class="input-group">
                <label for="b_indo">B. INDO:</label>
                <input type="number" id="b_indo" name="b_indo" value="<?= htmlspecialchars($s['B_INDO']) ?>" required>
            </div>
            <div class="input-group">
                <label for="matematika">Matematika:</label>
                <input type="number" id="matematika" name="matematika" value="<?= htmlspecialchars($s['MATEMATIKA']) ?>" required>
            </div>
            <div class="input-group">
                <label for="ipas">IPAS:</label>
                <input type="number" id="ipas" name="ipas" value="<?= htmlspecialchars($s['IPAS']) ?>" required>
            </div>
            <div class="input-group">
                <label for="pjok">PJOK:</label>
                <input type="number" id="pjok" name="pjok" value="<?= htmlspecialchars($s['PJOK']) ?>" required>
            </div>
            <div class="input-group">
                <label for="sbjp">SBJP:</label>
                <input type="number" id="sbjp" name="sbjp" value="<?= htmlspecialchars($s['SBJP']) ?>" required>
            </div>
            <div class="input-group">
                <label for="b_inggris">B. Inggris:</label>
                <input type="number" id="b_inggris" name="b_inggris" value="<?= htmlspecialchars($s['B_INGGRIS']) ?>" required>
            </div>
            <div class="input-group">
                <label for="b_sunda">B. Sunda:</label>
                <input type="number" id="b_sunda" name="b_sunda" value="<?= htmlspecialchars($s['B_SUNDA']) ?>" required>
            </div>
            <div class="input-group">
                <label for="plh">PLH:</label>
                <input type="number" id="plh" name="plh" value="<?= htmlspecialchars($s['PLH']) ?>" required>
            </div>
            <button type="submit" class="button">Update</button>
        </form>
        <a class="button-back" href="read.php">Kembali ke yang tadi</a>
    </div>
</body>
</html>
