<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Tambah Kursus Baru</h2>

    <?php if (isset($error)): ?>
        <p class="error-message"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/crouses/create" method="POST">
        <label for="judul_kursus">Judul Kursus:</label>
        <input type="text" id="judul_kursus" name="judul_kursus" placeholder="Masukkan judul kursus" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi singkat kursus" rows="5" required></textarea>

        <label for="id_instruktur">ID Instruktur:</label>
        <input type="number" id="id_instruktur" name="id_instruktur" placeholder="Masukkan ID instruktur" required>

        <label for="durasi">Durasi (Jam):</label>
        <input type="text" id="durasi" name="durasi" placeholder="Durasi kursus dalam jam" required>

        <button type="submit">Tambah Kursus</button>
    </form>
</body>
</html>
