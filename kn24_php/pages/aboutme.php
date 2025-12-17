<?php
require_once __DIR__ . '/../AboutMeController.php';

$controller = new AboutMeController();
$data       = $controller->getViewData();

$name     = $data['name']     ?? '';
$role     = $data['role']     ?? '';
$bio      = $data['bio']      ?? '';
$skills   = $data['skills']   ?? [];
$hobbies  = $data['hobbies']  ?? [];
$contacts = $data['contacts'] ?? [];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'About me', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="./styles/style.css">

    <!-- Favicon базовий -->
    <link rel="icon" href="./images/icons/favicon.ico" sizes="any">

    <!-- PNG-іконки для браузерів -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/icons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/icons/favicon-32x32.png">

    <!-- Apple Touch Icon (для iOS / iPadOS) -->
    <link rel="apple-touch-icon" sizes="180x180" href="./images/icons/apple-touch-icon.png">

    <!-- Android / PWA -->
    <link rel="manifest" href="./images/icons/site.webmanifest">

    <!-- Тема і колір плитки для Windows -->
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
</head>
<body>

<?php
    include 'nav.php';
?>

<main>
    <h1>About me</h1>
    <section>
        <h2><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></h2>
        <?php if ($role): ?>
            <p><strong><?= htmlspecialchars($role, ENT_QUOTES, 'UTF-8') ?></strong></p>
        <?php endif; ?>
        <?php if ($bio): ?>
            <p><?= htmlspecialchars($bio, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
    </section>

    <?php if (!empty($skills)): ?>
        <section>
            <h3>Навички</h3>
            <ul>
                <?php foreach ($skills as $skill): ?>
                    <li><?= htmlspecialchars($skill, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($hobbies)): ?>
        <section>
            <h3>Хобі</h3>
            <ul>
                <?php foreach ($hobbies as $hobby): ?>
                    <li><?= htmlspecialchars($hobby, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($contacts)): ?>
        <section>
            <h3>Контакти</h3>
            <ul>
                <?php if (!empty($contacts['email'])): ?>
                    <li>Email: <a href="mailto:<?= htmlspecialchars($contacts['email'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($contacts['email'], ENT_QUOTES, 'UTF-8') ?>
                    </a></li>
                <?php endif; ?>

                <?php if (!empty($contacts['github'])): ?>
                    <li>GitHub: <a href="<?= htmlspecialchars($contacts['github'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                        <?= htmlspecialchars($contacts['github'], ENT_QUOTES, 'UTF-8') ?>
                    </a></li>
                <?php endif; ?>
            </ul>
        </section>
    <?php endif; ?>
</main>

</body>
</html>


