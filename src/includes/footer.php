</main>
    <footer class="lab-footer" id="iletisim">
        <div class="container footer-grid">
            <div>
                <span class="teletext-tag">[CH-04 // BAĞLANTI TERMİNALİ]</span>
                <h3>İletişim & İş Birliği</h3>
                <p class="muted">Yazılım geliştirme, açık kaynak projeler veya teknik tartışmalar için doğrudan mesaj gönderebilirsiniz.</p>
            </div>
            <div class="footer-actions">
                <a href="mailto:<?= htmlspecialchars($profile['email']) ?>" class="btn btn-outline">
                    <kbd>M</kbd> E-posta Gönder
                </a>
                <a href="<?= htmlspecialchars($profile['github']) ?>" target="_blank" rel="noopener" class="btn btn-outline">
                    <kbd>G</kbd> GitHub
                </a>
                <a href="<?= htmlspecialchars($profile['linkedin']) ?>" target="_blank" rel="noopener" class="btn btn-primary">
                    <kbd>L</kbd> LinkedIn
                </a>
            </div>
        </div>
        <div class="container footer-status mono">
            <span>İPUCU: Bölümler arası hızlı geçiş için klavyeden <strong>F1 - F4</strong> veya <strong>1 - 4</strong> tuşlarını kullanabilirsiniz.</span>
            <span>© <?= date('Y') ?> <?= htmlspecialchars($profile['name']) ?></span>
        </div>
    </footer>
    <script src="<?= $basePath ?>assets/js/app.js"></script>
</body>
</html>