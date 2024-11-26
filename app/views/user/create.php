<!-- app/views/user/create.php -->
<h2>Pendaftaran Peserta</h2>
<form action="/user/store" method="POST">
    <pre>
    <label for="peserta">Nama Peserta:</label>
    <input type="text" name="peserta" id="peserta" required>
    <label for="kursus">Jenis Kursus:</label>
    <input type="text" name="kursus" id="kursus" required>
    <label for="tanggal_daftar">Tanggal Daftar:</label>
    <input type="date" name="tanggal_daftar" id="tanggal_daftar" required>
    <button type="submit">Simpan</button>
</pre>
</form>
