<?php
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
    <title>Read Siswa</title>
    <link rel="stylesheet" type="text/css" href="css/read_styles.css">
</head>
<body>
    <h1>List Nilai Raport Siswa </h1>
    <a href="create.php" class="button">Buat Data Raport yang Baru</a>
    <table border="1">
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
                <th>Actions</th>
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
                        <a href="update.php?NISN=<?= $s['NISN'] ?>">Edit</a>
                        <a href="delete.php?NISN=<?= $s['NISN'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
