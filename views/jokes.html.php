<?php if (isset($error)): ?>
    <h1><?= $error ?></h1>
<?php else: ?>
    <?php foreach ($jokes as $joke): ?>
        <section>
        <blockquote>
            <h3>
                <?= htmlspecialchars($joke['text'], ENT_QUOTES, 'UTF-8'); ?>
            </h3>
        </blockquote>
            <form action="deletejoke.php" method="post">
                <input type="hidden" name="id" value="<?= $joke['id'] ?>">
                <input type="submit" value="Delete">
            </form>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

