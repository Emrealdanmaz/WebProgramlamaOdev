<?php
require_once __DIR__ . '/data/posts.php';
$isStaticBuild = $isStaticBuild ?? false;
$basePath = $isStaticBuild ? '' : '../';

$slug = $targetSlug ?? ($_GET['slug'] ?? $posts[0]['slug']);
$currentPost = null;

foreach ($posts as $p) {
    if ($p['slug'] === $slug) {
        $currentPost = $p;
        break;
    }
}

if (!$currentPost) {
    $currentPost = $posts[0];
}

$pageTitle = $currentPost['title'] . ' — ' . $profile['name'];
$backLink = $isStaticBuild ? 'index.html#blog' : 'index.php#blog';

require __DIR__ . '/includes/header.php';
?>

<article class="post-view">
    <div class="container narrow">
        <a href="<?= $backLink ?>" class="back-btn mono">← [ESC] YAZI LİSTESİNE DÖN</a>

        <div class="article-sheet">
            <header class="article-head">
                <div class="card-top-bar mono">
                    <span>KATEGORİ: <?= htmlspecialchars($currentPost['category']) ?></span>
                    <span><?= htmlspecialchars($currentPost['date']) ?> • <?= htmlspecialchars($currentPost['read_time']) ?></span>
                </div>
                <h1><?= htmlspecialchars($currentPost['title']) ?></h1>
                <p class="article-lead"><?= htmlspecialchars($currentPost['summary']) ?></p>
            </header>

            <div class="article-body">
                <?= $currentPost['content'] ?>
            </div>
        </div>
    </div>
</article>

<?php require __DIR__ . '/includes/footer.php'; ?>