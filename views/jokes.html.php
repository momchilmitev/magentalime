<?php if (isset($error)): ?>
    <h1><?= $error ?></h1>
<?php else: ?>
    <?php foreach ($jokes as $text): ?>
        <blockquote>
            <h3>
                <?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); ?>
            </h3>
        </blockquote>
    <?php endforeach; ?>
<?php endif; ?>

