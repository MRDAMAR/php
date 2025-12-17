<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? '404 — Сторінку не знайдено') ?></title>
</head>
<body>
    <header>
        <nav>
            <?php if (!empty($menuRoutes)): ?>
                <?php foreach ($menuRoutes as $path => $config): ?>
                    <?php
                        $url   = $config['url'] ?? '/';
                        $label = $config['title'] ?? 'Сторінка';
                        $isActive = isset($currentPath) && $currentPath === $url;
                    ?>
                    <a href="<?= $url ?>" <?= $isActive ? 'aria-current="page"' : '' ?>>
                        <?= htmlspecialchars($label) ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <h1>404 — сторінку не знайдено</h1>
        <p>На жаль, такої сторінки не існує.</p>
        <p><a href="/">Повернутися на головну</a></p>
    </main>
</body>
</html>
