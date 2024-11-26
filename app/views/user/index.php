<!-- app/views/user/index.php -->
<h2>Daftar Peserta</h2>
<a href="/user/create">Tambah Daftar Peserta</a>
<ul>
    <?php foreach ($users as $user): ?>
        <div>
            <p><?= htmlspecialchars($user['peserta']) ?> - <?= htmlspecialchars($user['kursus']) ?> <?= htmlspecialchars($user['tanggal_daftar']) ?>
            
            <a href="/user/edit/<?php echo $user['id']; ?>">Edit</a> |
            <a href="/user/delete/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</ul>
