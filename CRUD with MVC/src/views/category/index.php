<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="add">Add New Category</a>
<table border="1">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>delete</th>
        <th>update</th>
    </tr>

    <?php foreach ($data as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['title'] ?></td>
            <td><a href="delete/<?= $c['id'] ?>">delete</a></td>
            <td><a href="edit/<?= $c['id'] ?>">update</a></td>

        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>



