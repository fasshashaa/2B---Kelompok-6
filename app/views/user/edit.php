<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="/user/update/<?php echo $user['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <button type="submit">Update</button>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="peran">Peran:</label>
        <input type="text" id="peran" name="peran" value="<?php echo $user['peran']; ?>" required>
        <br>
    </form>
    <a href="/user/index">Back to List</a>
</body>
</html>