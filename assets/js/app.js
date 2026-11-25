document.addEventListener('DOMContentLoaded', () => {
    const root = document.documentElement;
    const themeToggle = document.getElementById('themeToggle');

    // 1. Varsayılan Krem Tema & Geçiş
    const savedTheme = localStorage.getItem('blog-theme') || 'light';
    root.setAttribute('data-theme', savedTheme);

    function toggleTheme() {
        const current = root.getAttribute('data-theme');
        const next = current === 'light' ? 'dark' : 'light';
        root.setAttribute('data-theme', next);
        localStorage.setItem('blog-theme', next);
    }

    if (themeToggle) {
        themeToggle.addEventListener('click', toggleTheme);
    }

    // 2. Üst Bar Canlı Sistem Saati
    const labClock = document.getElementById('labClock');
    function updateClock() {
        if (!labClock) return;
        const now = new Date();
        labClock.textContent = now.toLocaleTimeString('tr-TR', { hour12: false });
    }
    updateClock();
    setInterval(updateClock, 1000);

    // 3. Mobil Menü
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');
    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => navLinks.classList.toggle('open'));
    }

    // 4. Klavye Kısayolları (F1-F4, 1-4, T, Escape)
    const sectionMap = {
        F1: 'hakkimda', '1': 'hakkimda',
        F2: 'projeler', '2': 'projeler',
        F3: 'blog',     '3': 'blog',
        F4: 'iletisim', '4': 'iletisim'
    };

    document.addEventListener('keydown', (e) => {
        if (['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName)) return;

        // Tema kısayolu: T
        if (e.key.toLowerCase() === 't' && !e.ctrlKey && !e.metaKey) {
            toggleTheme();
            return;
        }

        // Makale sayfasındayken ESC ile ana sayfaya dönüş
        if (e.key === 'Escape') {
            const backBtn = document.querySelector('.back-btn');
            if (backBtn) window.location.href = backBtn.getAttribute('href');
            return;
        }

        // Bölüm kısayolları: F1-F4 veya 1-4
        const targetId = sectionMap[e.key];
        if (targetId) {
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                e.preventDefault();
                targetEl.scrollIntoView({ behavior: 'smooth' });
                highlightActiveNav(targetId);
            } else {
                // Tekil makale sayfasındayken ilgili bölüme yönlendir
                const fLink = document.querySelector(`.fkey-item[data-target="${targetId}"]`);
                if (fLink) {
                    e.preventDefault();
                    window.location.href = fLink.getAttribute('href');
                }
            }
        }
    });

    // 5. Sağ Telemetri Paneli ve Üst F-Menü Aktif Bölüm Takibi (Scroll-Spy)
    const sections = ['hakkimda', 'projeler', 'blog', 'iletisim']
        .map((id) => document.getElementById(id))
        .filter(Boolean);

    function highlightActiveNav(activeId) {
        document.querySelectorAll('.fkey-item').forEach((link) => {
            link.classList.toggle('active', link.getAttribute('data-target') === activeId);
        });
        document.querySelectorAll('#telemetryNav a').forEach((link) => {
            link.classList.toggle('active', link.getAttribute('data-spy') === activeId);
        });
    }

    if (sections.length > 0) {
        window.addEventListener('scroll', () => {
            const scrollPos = window.scrollY + 180;
            let currentId = sections[0].id;

            for (const sec of sections) {
                if (scrollPos >= sec.offsetTop) {
                    currentId = sec.id;
                }
            }
            highlightActiveNav(currentId);
        });
    }

    // 6. Blog Kategori Filtreleme
    const filterButtons = document.querySelectorAll('.filter-btn');
    const blogCards = document.querySelectorAll('.blog-card');

    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            filterButtons.forEach((b) => b.classList.remove('active'));
            btn.classList.add('active');

            const selected = btn.getAttribute('data-category');
            blogCards.forEach((card) => {
                const cardCat = card.getAttribute('data-category');
                card.classList.toggle('hidden', selected !== 'all' && cardCat !== selected);
            });
        });
    });
});