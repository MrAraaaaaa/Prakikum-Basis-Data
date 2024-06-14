<?php
require 'includes/db.php';

$nisn = $_GET['NISN'];
$stmt = $pdo->prepare('DELETE FROM nilai WHERE NISN = ?');
$stmt->execute([$nisn]);

header('Location: read.php');
exit();
?>
