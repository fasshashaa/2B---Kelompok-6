<!-- app/views/user/index.php -->
<h2>Pendaftaran Peserta</h2>
<a href="/user/create">Pendaftaran Peserta</a>


<?php if (!empty($DataPeserta)): ?>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Kursus</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DataPeserta as $index => $user): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($user['peserta']); ?></td>
                    <td><?= htmlspecialchars($user['kursus']); ?></td>
                    <td><?= htmlspecialchars($user['tanggal_daftar']); ?></td>
                    <td>
                        <a href="/user/edit/<?php echo $user['id']; ?>">Edit</a> |
                        <a href="/user/delete/<?php echo $user['id']; ?>" onclick="return confirm('Apakah Anda yakin?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Belum ada peserta yang terdaftar.</p>
<?php endif; ?>
