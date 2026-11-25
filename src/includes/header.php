<?php
$pageTitle = $pageTitle ?? $profile['name'] . ' — Laboratuvar & Teknik Blog';
$basePath = $basePath ?? '';
$homeLink = $isStaticBuild ? 'index.html' : 'index.php';
?>
<!DOCTYPE html>
<html lang="tr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $basePath ?>assets/css/style.css">
</head>
<body>
    <header class="lab-topbar">
        <div class="container topbar-inner">
            <a href="<?= $homeLink ?>" class="lab-brand">
                <span class="status-led"></span>
                <span class="mono">SYS://EMRE.ALDANMAZ</span>
            </a>

            <nav class="fkey-nav" id="navLinks" aria-label="Fonksiyon Kısayol Menüsü">
                <a href="<?= $homeLink ?>#hakkimda" class="fkey-item" data-fkey="F1" data-target="hakkimda">
                    <kbd>F1</kbd><span>HAKKIMDA</span>
                </a>
                <a href="<?= $homeLink ?>#projeler" class="fkey-item" data-fkey="F2" data-target="projeler">
                    <kbd>F2</kbd><span>PROJELER</span>
                </a>
                <a href="<?= $homeLink ?>#blog" class="fkey-item" data-fkey="F3" data-target="blog">
                    <kbd>F3</kbd><span>BLOG</span>
                </a>
                <a href="<?= $homeLink ?>#iletisim" class="fkey-item" data-fkey="F4" data-target="iletisim">
                    <kbd>F4</kbd><span>İLETİŞİM</span>
                </a>
            </nav>

            <div class="topbar-controls">
                <span class="clock-pill mono" id="labClock">00:00:00</span>
                <button id="themeToggle" class="lab-btn-icon" aria-label="Temayı Değiştir" title="Krem / Kehribar CRT Modu">
                    <span id="themeIcon">◐</span>
                </button>
                <button id="menuToggle" class="lab-btn-icon mobile-only" aria-label="Menü">☰</button>
            </div>
        </div>
    </header>
    <main>