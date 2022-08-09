<?php

session_start();
if (empty($_SESSION['user'])) {
    header("location: login.php");
}


require "lib/CRUD.php";

if (isset($_GET['keyword'])) {
    $data = search($_GET['keyword']);
} else {
    $data = show();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="2">
    <?php if(isset($_COOKIE['msg'])): ?>
    <h1> <?= $_COOKIE['msg']; ?> </h1>
    <?php endif; ?>
    <?php if ($_SESSION['user']['role'] == 2): ?>
        <a href="add.php">Add new data</a>
    <?php endif; ?>
    <form action="show.php" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="sumbit">
    </form>

    <tr>
        <th>ID</th>
        <th>Title</th>

        <?php if ($_SESSION['user']['role'] == 2): ?>
            <th>Delete</th>
            <th>Update</th>
        <?php endif; ?>
    </tr>
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td> <?= $row['title']; ?></td>
                <?php if ($_SESSION['user']['role'] == 2): ?>
                    <td><a href="delete.php?id=<?= $row['id']; ?>">Delete </a></td>
                    <td><a href="update.php?id=<?= $row['id']; ?>">Update </a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No data</td>
        </tr>
    <?php endif; ?>
</table>
</body>
</html>
