<!-- app/views/courses/index.php -->

<h2>Daftar Kursus</h2>

<div>
    <a href="/courses/create">Daftar Kursus</a> |
</div>

<ul>
    <?php foreach ($courses as $course): ?>
        <li>
            <p>
                <strong><?= htmlspecialchars($course['judul_kursus'] ?? 'Judul tidak tersedia') ?></strong> - 
                <?= htmlspecialchars($course['deskripsi'] ?? 'Deskripsi tidak tersedia') ?>
            </p>
            <p>
                <a href="/courses/edit/<?= htmlspecialchars($course['id_courses'] ?? '') ?>">Edit</a> | 
                <a href="/courses/delete/<?= htmlspecialchars($course['id_courses'] ?? '') ?>" 
                   onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">Hapus</a>
            </p>
        </li>
    <?php endforeach; ?>
</ul>
