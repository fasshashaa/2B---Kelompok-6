<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Kursus</title>
</head>
<body>
    <h1>Daftar Kursus</h1>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Instruktur</th>
                <th>Durasi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['judul_kursus']) ?></td>
                    <td><?= htmlspecialchars($course['id_instruktur']) ?></td>
                    <td><?= htmlspecialchars($course['durasi']) ?> jam</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
