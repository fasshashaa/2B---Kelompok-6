<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pendaftaran Peserta</title>
</head>
<body>
    <h2>Edit Pendaftaran Peserta</h2>
    <form action="/user/update/<?php echo $peserta['id']; ?>" method="POST">
        <pre>
        <label for="peserta">Nama Peserta:</label>
        <input type="text" id="name" name="name" value="<?php echo $peserta['peserta']; ?>" required>
        <input type="hidden" id="id" name="id" value="<?php echo $peserta['id']; ?>" required>
        <br>
        <label for="kursus">Jenis Kursus:</label>
        <input type="text" id="kursus" name="kursus" value="<?php echo $peserta['kursus']; ?>" required>
        <br>
        <label for="tanggal_daftar">Tanggal Daftar:</label>
        <input type="date" id="tanggal_daftar" name="tanggal_daftar" value="<?php echo $peserta['tanggal_daftar']; ?>" required>
        <br>
        <button type="submit">Update</button>
</pre>
    </form>
    <a href="/user/index">Back to List</a>
</body>
</html>
