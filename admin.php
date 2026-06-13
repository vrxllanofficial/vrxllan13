<?php
$db = new SQLite3('logs.db');
$results = $db->query("SELECT * FROM logs ORDER BY timestamp DESC LIMIT 50");
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard Pemantau</title></head>
<body>
    <h2>Aktivitas Pengunjung</h2>
    <table border="1">
        <tr><th>IP</th><th>Halaman</th><th>Waktu</th></tr>
        <?php while ($row = $results->fetchArray()): ?>
        <tr>
            <td><?php echo $row['ip']; ?></td>
            <td><?php echo $row['page']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

