<?php
require_once __DIR__ . '/../../models/Courses.php';

$coursesModel = new Courses();
$courses = $coursesModel->getAllCourses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .actions {
            text-align: center;
        }

        .add-course {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .add-course:hover {
            background-color: #218838;
        }

        .button {
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .button.edit {
            background-color: #007BFF;
            color: white;
        }

        .button.edit:hover {
            background-color: #0056b3;
        }

        .button.delete {
            background-color: #dc3545;
            color: white;
        }

        .button.delete:hover {
            background-color: #bd2130;
        }
    </style>
</head>

<body>
    <h1>Daftar Kursus</h1>
    <table>
        <thead>
            <tr>
                <th>Judul Kursus</th>
                <th>Deskripsi</th>
                <th>Instruktur</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($courses)): ?>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= htmlspecialchars($course['judul_kursus'] ?? '') ?></td>
                        <td><?= htmlspecialchars($course['deskripsi'] ?? '') ?></td>
                        <td><?= htmlspecialchars($course['instruktur'] ?? '') ?></td>
                        <td><?= htmlspecialchars($course['durasi'] ?? '') ?></td>
                        <td class="actions">
                            <!-- Tombol Edit -->
                            <form action="/user/editCourse" method="POST" style="display:inline;">
                                <button type="submit" class="button edit">Edit</button>
                            </form>
                            <!-- Tombol Hapus -->
                            <form action="/user/delete/<?= htmlspecialchars($course['id_courses'] ?? '') ?>" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                <button type="submit" class="button delete">Hapus</button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada kursus yang tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="add-course" href="/user/add_course">Tambah Kursus</a>
</body>

</html>