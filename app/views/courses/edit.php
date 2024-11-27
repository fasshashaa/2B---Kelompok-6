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
            background-color: #f9f9f9;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            margin-bottom: 15px;
        }

        legend {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
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

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Edit Kursus</h1>
    <?php if (empty($course)): ?>
        <p class="error">Data kursus tidak ditemukan. Silakan kembali ke halaman sebelumnya.</p>
    <?php else: ?>
        <form action="/courses/update/<?= htmlspecialchars($course['id_courses']) ?>" method="POST">
            <fieldset>
                <legend>Informasi Kursus</legend>
                <label for="judul_kursus">Judul Kursus</label>
                <input type="text" name="judul_kursus" id="judul_kursus"
                    value="<?= htmlspecialchars($course['judul_kursus']) ?>"
                    placeholder="Masukkan judul kursus" required>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5"
                    placeholder="Masukkan deskripsi kursus" required><?= htmlspecialchars($course['deskripsi']) ?></textarea>
                <label for="id_instruktur">Instruktur</label>
                <select name="id_instruktur" id="id_instruktur" required>
                    <option value="">Pilih Instruktur</option>
                    <?php if (!empty($instructors)): ?>
                        <?php foreach ($instructors as $instructor): ?>
                            <option value="<?= htmlspecialchars($instructor['id_user']) ?>"
                                <?= $course['id_instruktur'] == $instructor['id_user'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($instructor['name']) ?> <!-- Menampilkan nama instruktur -->
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled>Instruktur tidak tersedia</option>
                    <?php endif; ?>
                </select>
                <label for="durasi">Durasi (Jam)</label>
                <input type="number" name="durasi" id="durasi"
                    value="<?= htmlspecialchars($course['durasi']) ?>"
                    placeholder="Masukkan durasi kursus (dalam jam)" required>
            </fieldset>

            <button type="submit">Simpan Perubahan</button>
        </form>
    <?php endif; ?>
</body>
</html>