<!DOCTYPE html>
<html>
<head><title>MVC Example</title></head>
<body>
<h1>Контент</h1>
<?php foreach ($data as $row): ?>
    <h3><?= $row['TITLE'] ?></h3>
    <p><?= $row['TEXT'] ?></p>
<?php endforeach; ?>
</body>
</html>
