<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: view.php');
    exit();
}

require 'includes/db.php';

$stmt = $pdo->query('SELECT * FROM nilai');
$siswa = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/dasboard_styles.css">
</head>
<body>
    <h1>Selamat datang di Website Raport SDN 4 CIHUNI Kelas 4</h1>
    <h2>Tabel Raport Kelas 4</h2>
    <table>
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>PAI</th>
                <th>PPKN</th>
                <th>B_INDO</th>
                <th>MATEMATIKA</th>
                <th>IPAS</th>
                <th>PJOK</th>
                <th>SBJP</th>
                <th>B_INGGRIS</th>
                <th>B_SUNDA</th>
                <th>PLH</th>
                <th>Jumlah Nilai</th>
                <th>Rata Rata</th>
                <th>Perubahan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswa as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['NISN']) ?></td>
                    <td><?= htmlspecialchars($s['nama_siswa']) ?></td>
                    <td><?= htmlspecialchars($s['PAI']) ?></td>
                    <td><?= htmlspecialchars($s['PPKN']) ?></td>
                    <td><?= htmlspecialchars($s['B_INDO']) ?></td>
                    <td><?= htmlspecialchars($s['MATEMATIKA']) ?></td>
                    <td><?= htmlspecialchars($s['IPAS']) ?></td>
                    <td><?= htmlspecialchars($s['PJOK']) ?></td>
                    <td><?= htmlspecialchars($s['SBJP']) ?></td>
                    <td><?= htmlspecialchars($s['B_INGGRIS']) ?></td>
                    <td><?= htmlspecialchars($s['B_SUNDA']) ?></td>
                    <td><?= htmlspecialchars($s['PLH']) ?></td>
                    <td><?= htmlspecialchars($s['Jumlah_nilai']) ?></td>
                    <td><?= htmlspecialchars($s['Rata_rata']) ?></td>
                    <td>
                        <a href="update.php?NISN=<?= htmlspecialchars($s['NISN']) ?>">Edit</a>
                        <a href="delete.php?NISN=<?= htmlspecialchars($s['NISN']) ?>" onclick="return confirm('Apakah ente yakin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="text-align: center;">
        <a href="create.php" class="button">Tambahkan Data Raport</a>
        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>
