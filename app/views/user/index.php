<!-- app/views/user/index.php -->
<h2></h2>
<a href="/user/create">Daftar Kursus </a>
<a href="/user/add_course">Tambah Kursus </a>
<ul>
    <?php foreach ($users as $user): ?>
        <div>
            <p><?= htmlspecialchars($user['name']) ?> - <?= htmlspecialchars($user['email']) ?>
            <a href="/user/edit/<?php echo $user['id']; ?>">Edit</a> |
            <a href="/user/delete/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</ul>
