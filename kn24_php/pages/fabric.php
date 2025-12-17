<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/fabric@latest/dist/index.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <style>
        canvas {
            border: 2px solid black;
        }
    </style>
</head>
<body>

    <?php
        include 'nav.php'
    ?>
    <canvas id="canvasEl" width="800" height="600"></canvas>
    <script src="./scripts/fabric.js"></script>
</body>
</html>