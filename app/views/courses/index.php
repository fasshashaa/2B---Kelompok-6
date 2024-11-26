<h2>Daftar Kursus</h2>

<div>
    <a href="/courses/create">Tambah Kursus</a> 
</div>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Kursus</th>
            <th>Deskripsi</th>
            <th>Instruktur</th>
            <th>Durasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($kursus)): ?>
            <?php $no = 1; ?>
            <?php foreach ($kursus as $course): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($course['judul_kursus'] ?? 'Judul tidak tersedia') ?></td>
                    <td><?= htmlspecialchars($course['deskripsi'] ?? '') ?></td>
                    <td><?= htmlspecialchars($course['instruktur'] ?? 'Instruktur tidak tersedia') ?></td>
                    <td><?= htmlspecialchars($course['durasi'] ?? 'Durasi tidak tersedia') ?></td>
                    <td>
                        <a href="/courses/edit/<?php htmlspecialchars($course['id_courses'] ?? '') ?>" style="color: blue;">Edit</a> | 
                        <a href="/courses/delete/<?php htmlspecialchars($course['id_courses'] ?? '') ?>" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')" style="color: red;">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada kursus yang tersedia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
