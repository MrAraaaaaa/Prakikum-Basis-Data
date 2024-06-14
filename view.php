<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'includes/db.php';

// Fetch data from the database
$stmt = $pdo->query('SELECT * FROM nilai');
$siswa = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Siswa</title>
    <link rel="stylesheet" type="text/css" href="css/dasboard_styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Website Raport SDN 4 CIHUNI Kelas 4</h1>
            </div>
            <nav>
                <ul>
                    <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>List of Students</h2>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
