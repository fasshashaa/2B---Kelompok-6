<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Kursus</h1>
    <form action="/courses/update/<?= htmlspecialchars($course['id_courses']) ?>" method="POST">
    <label for="judul_kursus">Judul Kursus</label>
    <input type="text" name="judul_kursus" id="judul_kursus" value="<?= htmlspecialchars($course['judul_kursus']) ?>" required>

    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" rows="5" required><?= htmlspecialchars($course['deskripsi']) ?></textarea>

    <label for="id_instruktur">Instruktur</label>
    <select name="id_instruktur" id="id_instruktur" required>
        <?php foreach ($instructors as $instructor): ?>
            <option value="<?= htmlspecialchars($instructor['id_user']) ?>"
                <?= $course['id_instruktur'] == $instructor['id_user'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($instructor['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="durasi">Durasi (Jam)</label>
    <input type="number" name="durasi" id="durasi" value="<?= htmlspecialchars($course['durasi']) ?>" required>

    <button type="submit">Simpan Perubahan</button>
</form>

</body>
</html>
