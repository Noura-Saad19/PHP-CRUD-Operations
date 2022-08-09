<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="../update" method="post">
    <input type="text"
           value="<?= $data['title']; ?>" name="title">
    <input type="hidden" value="<?= $data['id']; ?>"
           name="id">
    <input type="submit" style="btn btn-success">
</form>

</body>
</html>



