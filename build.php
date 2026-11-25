<?php
// GitHub Pages için PHP şablonlarından statik HTML dosyaları üretir.
$isStaticBuild = true;

// 1. Ana sayfayı derle
ob_start();
require __DIR__ . '/src/index.php';
$indexHtml = ob_get_clean();
file_put_contents(__DIR__ . '/index.html', $indexHtml);
echo "Olusturuldu: index.html\n";

// 2. Her blog yazısı için ayrı statik HTML sayfası derle
require __DIR__ . '/src/data/posts.php';

foreach ($posts as $post) {
    $targetSlug = $post['slug'];
    ob_start();
    require __DIR__ . '/src/post.php';
    $postHtml = ob_get_clean();

    $fileName = 'post-' . $post['slug'] . '.html';
    file_put_contents(__DIR__ . '/' . $fileName, $postHtml);
    echo "Olusturuldu: {$fileName}\n";
}

echo "\nTamamlandi! Tum dosyalar GitHub Pages yayinina hazir.\n";