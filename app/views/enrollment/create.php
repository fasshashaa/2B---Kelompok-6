<!-- app/views/enrollment/create.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta</title>
    <style>
        /* CSS Langsung di Sini */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .form-title {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2 class="form-title">Pendaftaran Peserta</h2>
    <form action="/enrollment/store" method="POST" class="form-container">
        <div class="form-group">
            <label for="peserta" class="form-label">Nama Peserta:</label>
            <select name="peserta" id="peserta" class="form-select" required>
                <option value="" disabled selected>Pilih Peserta</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['name'] ?>"><?= $user['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kursus" class="form-label">Jenis Kursus:</label>
            <select name="kursus" id="kursus" class="form-select" required>
                <option value="" disabled selected>Pilih Kursus</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?= $course['judul_kursus'] ?>"><?= $course['judul_kursus'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_daftar" class="form-label">Tanggal Daftar:</label>
            <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-input" required>
        </div>
        <button type="submit" class="form-button">Simpan</button>
    </form>
</body>
</html>
