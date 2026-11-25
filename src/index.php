<?php
require_once __DIR__ . '/data/posts.php';
$isStaticBuild = $isStaticBuild ?? false;
$basePath = $isStaticBuild ? '' : '../';
$pageTitle = $profile['name'] . ' — Laboratuvar & Teknik Blog';

$categories = array_unique(array_column($posts, 'category'));

require __DIR__ . '/includes/header.php';
?>

<div class="container lab-layout">
    <div class="lab-main-column">
        <!-- GİRİŞ / KİMLİK KARTI -->
        <section class="lab-hero" id="hakkimda">
            <div class="teletext-header">
                <span class="teletext-tag">[CH-01 // SİSTEM PROFİLİ]</span>
                <span class="mono muted">DURUM: ÇEVRİMİÇİ • ERCİYES ÜNİVERSİTESİ</span>
            </div>
            <h1><?= htmlspecialchars($profile['name']) ?></h1>
            <p class="hero-role"><?= htmlspecialchars($profile['title']) ?></p>
            <p class="hero-bio"><?= htmlspecialchars($profile['bio']) ?></p>

            <div class="hero-actions">
                <a href="#projeler" class="btn btn-primary">Projeleri İncele [F2]</a>
                <a href="#blog" class="btn btn-outline">Teknik Yazılar [F3]</a>
            </div>

            <div class="skills-matrix">
                <?php foreach ($profile['skills'] as $group => $items): ?>
                    <div class="matrix-box">
                        <div class="matrix-title mono"><?= htmlspecialchars($group) ?></div>
                        <div class="tag-list">
                            <?php foreach ($items as $skill): ?>
                                <span class="spec-chip"><?= htmlspecialchars($skill) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- PROJELER -->
        <section class="lab-section" id="projeler">
            <div class="section-top">
                <div>
                    <span class="teletext-tag">[CH-02 // MÜHENDİSLİK ÇIKTILARI]</span>
                    <h2>Seçilmiş Projeler</h2>
                </div>
                <span class="mono count-badge">TOPLAM: <?= count($projects) ?> MODÜL</span>
            </div>

            <div class="projects-stack">
                <?php foreach ($projects as $index => $project): ?>
                    <article class="lab-card project-item">
                        <div class="card-top-bar mono">
                            <span>MOD-0<?= $index + 1 ?> // <?= htmlspecialchars($project['category']) ?></span>
                            <span class="status-ok">● AKTİF</span>
                        </div>
                        <h3><?= htmlspecialchars($project['title']) ?></h3>
                        <p class="muted"><?= htmlspecialchars($project['description']) ?></p>
                        <div class="card-footer-row">
                            <div class="tag-list">
                                <?php foreach ($project['tech'] as $t): ?>
                                    <span class="spec-chip"><?= htmlspecialchars($t) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <a href="<?= htmlspecialchars($project['link']) ?>" target="_blank" rel="noopener" class="inline-action mono">
                                KAYNAK KODU →
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- BLOG -->
        <section class="lab-section" id="blog">
            <div class="section-top flex-wrap">
                <div>
                    <span class="teletext-tag">[CH-03 // ALGORİTMA & MİMARİ NOTLARI]</span>
                    <h2>Teknik Blog</h2>
                </div>
                <div class="filter-bar" id="filterBar">
                    <button class="filter-btn active" data-category="all">Tümü</button>
                    <?php foreach ($categories as $cat): ?>
                        <button class="filter-btn" data-category="<?= htmlspecialchars($cat) ?>">
                            <?= htmlspecialchars($cat) ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="blog-stack" id="blogGrid">
                <?php foreach ($posts as $idx => $post): ?>
                    <?php
                    $postUrl = $isStaticBuild
                        ? 'post-' . $post['slug'] . '.html'
                        : 'post.php?slug=' . urlencode($post['slug']);
                    ?>
                    <article class="lab-card blog-card" data-category="<?= htmlspecialchars($post['category']) ?>">
                        <div class="card-top-bar mono">
                            <span>LOG-0<?= $idx + 1 ?> • <?= htmlspecialchars($post['category']) ?></span>
                            <span><?= htmlspecialchars($post['date']) ?> • <?= htmlspecialchars($post['read_time']) ?></span>
                        </div>
                        <h3><a href="<?= $postUrl ?>"><?= htmlspecialchars($post['title']) ?></a></h3>
                        <p class="muted"><?= htmlspecialchars($post['summary']) ?></p>
                        <a href="<?= $postUrl ?>" class="inline-action mono">MAKALE DOSYASINI AÇ →</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <!-- SAĞ SABİT TELEMETRİ & MİMARİ HARİTASI -->
    <aside class="lab-sidebar" aria-label="Sistem Telemetrisi">
        <div class="telemetry-panel">
            <div class="panel-header mono">
                <span>SİSTEM HARİTASI</span>
                <span class="blink-dot"></span>
            </div>

            <ul class="telemetry-nav mono" id="telemetryNav">
                <li><a href="#hakkimda" data-spy="hakkimda" class="active">01. HAKKIMDA & YETKİNLİK</a></li>
                <li><a href="#projeler" data-spy="projeler">02. MÜHENDİSLİK PROJELERİ</a></li>
                <li><a href="#blog" data-spy="blog">03. ALGORİTMA BLOGU</a></li>
                <li><a href="#iletisim" data-spy="iletisim">04. İLETİŞİM TERMİNALİ</a></li>
            </ul>

            <div class="telemetry-specs mono">
                <div class="spec-row">
                    <span class="muted">KONUM</span>
                    <span>Kayseri / Hatay</span>
                </div>
                <div class="spec-row">
                    <span class="muted">ODAK</span>
                    <span>Backend & İHA</span>
                </div>
                <div class="spec-row">
                    <span class="muted">YAYIN</span>
                    <span>GitHub Pages</span>
                </div>
            </div>

            <div class="kbd-legend mono">
                <div class="legend-title">KLAVYE KISAYOLLARI</div>
                <div><kbd>F1</kbd>-<kbd>F4</kbd> veya <kbd>1</kbd>-<kbd>4</kbd> : Bölüm Geçişi</div>
                <div><kbd>T</kbd> : Krem / Kehribar Tema</div>
            </div>
        </div>
    </aside>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>