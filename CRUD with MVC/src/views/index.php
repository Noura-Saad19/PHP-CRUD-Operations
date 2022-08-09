<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Index View</h1>
<h2><?= $name; ?></h2>
<ul>
    <?php foreach ($data as $c): ?>
        <li><?= $c['title']; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>



