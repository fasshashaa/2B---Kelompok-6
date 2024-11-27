<!-- app/views/enrollment/edit.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pendaftaran Peserta</title>
</head>
<body>
    <h2>Edit Pendaftaran Peserta</h2>
    <form action="/enrollment/update/<?php echo $peserta['id']; ?>" method="POST">
        <div>
            <label for="peserta">Nama Peserta:</label>
            <select name="peserta" id="peserta" required>
                <option value="" disabled>Pilih Peserta</option>
                <?php foreach ($users as $user): ?>
                    <!-- Menandai peserta yang sudah terdaftar -->
                    <option value="<?= $user['name'] ?>"><?= $user['name'] ?></option>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="kursus">Jenis Kursus:</label>
            <select name="kursus" id="kursus" required>
                <option value="" disabled>Pilih Kursus</option>
                <?php foreach ($courses as $course): ?>
                    <!-- Menandai kursus yang sudah terdaftar -->
                    <option value="<?= $course['judul_kursus'] ?>"><?= $course['judul_kursus'] ?></option>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="tanggal_daftar">Tanggal Daftar:</label>
            <input type="date" name="tanggal_daftar" id="tanggal_daftar" value="<?php echo $peserta['tanggal_daftar']; ?>" required>
        </div>

        <button type="submit">Update</button>
    </form>

    <a href="/enrollment/index">Back to List</a>
</body>
</html>
