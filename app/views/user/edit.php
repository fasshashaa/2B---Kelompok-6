
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="/user/update/<?php echo htmlspecialchars($user['id_user']); ?>" method="POST">
        <!-- CSRF Token for Security -->
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <br>

        <label for="password">Password (Leave blank to keep current password):</label>
        <input type="password" id="password" name="password">
        <br>

        <label for="peran">Peran:</label>
        <input type="text" id="peran" name="peran" value="<?php echo htmlspecialchars($user['peran']); ?>" required>
        <br>

        <button type="submit">Update</button>
    </form>


    <a href="/user/index">Back to List</a>
</body>
</html>