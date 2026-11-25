<?php

$profile = [
    'name' => 'Emre Aldanmaz',
    'title' => 'Bilgisayar Mühendisliği Öğrencisi & Full-Stack Geliştirici',
    'university' => 'Erciyes Üniversitesi — Bilgisayar Mühendisliği (4. Sınıf)',
    'location' => 'Kayseri / Hatay, Türkiye',
    'bio' => 'Backend sistemler, gerçek zamanlı görüntü aktarımı, İHA yer kontrol istasyonları ve kurumsal web yazılımları üzerine çalışan bir bilgisayar mühendisliği öğrencisiyim. Temiz mimari, yüksek performanslı veri yapıları ve uçtan uca çalışan yazılım sistemleri geliştiriyorum.',
    'email' => 'emrealdanmaz@example.com',
    'github' => 'https://github.com/emrealdanmaz',
    'linkedin' => 'https://linkedin.com/in/emrealdanmaz',
    'skills' => [
        'Backend & Web' => ['PHP 8.2 (PDO)', 'Python 3.12', 'FastAPI', 'MySQL', 'RESTful API', 'JavaScript (ES6+)', 'PWA'],
        'Masaüstü & Görüntü İşleme' => ['PyQt6', 'OpenCV', 'C#', 'Java / JavaFX', 'C / C++ (OpenGL)'],
        'Ağ & DevOps' => ['Git & GitHub', 'MediaMTX (RTMP/RTSP)', 'Cisco Packet Tracer', 'Linux / cPanel']
    ]
];

$projects = [
    [
        'title' => 'DJI Matrice 30T Yer Kontrol İstasyonu (GCS)',
        'category' => 'Görüntü İşleme & İHA',
        'description' => 'Arama-kurtarma operasyonları için Python, PyQt6 ve OpenCV tabanlı; MediaMTX üzerinden düşük gecikmeli çift kamera (RGB/Termal) RTMP/RTSP akışı, telemetri takibi ve taktik haritalama sunan masaüstü kontrol arayüzü.',
        'tech' => ['Python', 'PyQt6', 'OpenCV', 'MediaMTX'],
        'link' => 'https://github.com/emrealdanmaz'
    ],
    [
        'title' => 'Perakende, B2B Toptan ve E-Ticaret Yönetim Sistemi',
        'category' => 'Full-Stack Web',
        'description' => 'PHP 8.2 ve MySQL (PDO) ile geliştirilen; B2B toptan ve B2C perakende katalog yapısı, çok şubeli stok takibi, cari hesap, iade süreçleri, barkodlu fiş üretimi ve 3:4 stüdyo görsel işleme hattı sunan kurumsal yazılım.',
        'tech' => ['PHP 8.2', 'MySQL (PDO)', 'JavaScript', 'GD Image'],
        'link' => 'https://github.com/emrealdanmaz'
    ],
    [
        'title' => 'Akıllı Soru Havuzu ve Sınav Simülasyonu (PWA)',
        'category' => 'Backend & PWA',
        'description' => 'Ezber ve sözel dersler için Python, FastAPI ve MySQL ile geliştirilen; PDF/metin ayrıştırıcı, SHA-256 tekrar engelli toplu veri aktarımı, tekrarsız havuz döngüsüyle özelleştirilebilir test üretimi sunan mobil uyumlu çalışma platformu.',
        'tech' => ['Python', 'FastAPI', 'MySQL', 'PWA / JS'],
        'link' => 'https://github.com/emrealdanmaz'
    ]
];

$posts = [
    [
        'id' => 1,
        'slug' => 'rtmp-rtsp-dusuk-gecikmeli-video-akisi',
        'title' => 'MediaMTX ile Düşük Gecikmeli RTMP/RTSP Video Akış Mimarisi',
        'date' => '22 Kasım 2026',
        'read_time' => '5 dk okuma',
        'category' => 'Sistem & Ağ',
        'summary' => 'İHA yer kontrol istasyonlarında kamera görüntüsünü en az gecikmeyle istemci arayüzüne aktarmak için MediaMTX ve OpenCV pipeline kurulumu.',
        'content' => '
            <p>Gerçek zamanlı görüntü işleme ve İHA operasyonlarında milisaniyeler kritik öneme sahiptir. Standart HTTP tabanlı akış protokolleri yüksek tamponlama (buffering) süreleri nedeniyle operatör tepki süresini geciktirir.</p>
            <h3>Neden MediaMTX?</h3>
            <p>MediaMTX (eski adıyla rtsp-simple-server), sıfır bağımlılıkla çalışan, RTMP girişini alıp düşük gecikmeli RTSP veya WebRTC çıkışına dönüştürebilen hafif bir medya sunucusudur.</p>
            <pre><code># MediaMTX üzerinden gelen RTSP akışını OpenCV ile yakalama
import cv2

rtsp_url = "rtsp://localhost:8554/live/drone"
cap = cv2.VideoCapture(rtsp_url, cv2.CAP_FFMPEG)
cap.set(cv2.CAP_PROP_BUFFERSIZE, 1)</code></pre>
            <p>Tampon boyutunu <code>1</code> kareye sabitlemek, ağ dalgalanmalarında biriken eski karelerin ekrana basılmasını önleyerek canlı görüntünün her zaman güncel kalmasını sağlar.</p>
        '
    ],
    [
        'id' => 2,
        'slug' => 'fastapi-sha256-tekrarsiz-soru-havuzu-algoritmasi',
        'title' => 'FastAPI ve SHA-256 ile Tekrarsız Soru Havuzu ve Akıllı Test Algoritması',
        'date' => '24 Kasım 2026',
        'read_time' => '6 dk okuma',
        'category' => 'Backend & Algoritma',
        'summary' => 'Binlerce soruluk PDF/JSON veri setlerinde SHA-256 parmak izi ile mükerrer kaydı önleme ve havuz tükenene kadar aynı soruyu tekrar göstermeyen test üretim algoritması.',
        'content' => '
            <p>Yaklaşık 6.000 soruluk bir sınav hazırlık havuzu oluştururken iki temel mühendislik problemi ortaya çıkar: farklı PDF ve metin kaynaklarından içeri aktarılan soruların veritabanında kopya (duplicate) oluşturması ve öğrencinin kısa aralıklarla aynı sorulara maruz kalması.</p>
            <h3>1. Adım: Normalizasyon ve SHA-256 Tekillik Kontrolü</h3>
            <p>Soru metnindeki fazla boşluklar, satır sonları ve noktalama farklılıkları tek başına <code>UNIQUE</code> indeks kullanımını zorlaştırır. Bu nedenle her soru veritabanına yazılmadan önce normalize edilip 256-bit kriptografik özeti (hash) hesaplanır:</p>
            <pre><code>import hashlib, re

def soru_hash_uret(soru_metni: str) -> str:
    temiz = re.sub(r"\s+", " ", soru_metni.strip().lower())
    return hashlib.sha256(temiz.encode("utf-8")).hexdigest()</code></pre>
            <p>MySQL tarafında <code>soru_hash</code> sütununa tanımlanan <code>UNIQUE</code> kısıtı sayesinde, toplu JSON/PDF içe aktarma sırasında binlerce soru arasından yalnızca veritabanında hiç bulunmayan yeni sorular $O(1)$ indeks aramasıyla eklenir.</p>
            <h3>2. Adım: Tekrarsız Havuz Döngüsü (Zero-Repeat Cycle)</h3>
            <p>Klasik <code>ORDER BY RAND()</code> sorguları büyük tablolarda hem yavaş çalışır hem de aynı sorunun art arda gelmesine yol açar. Bunun yerine kullanıcının çözdüğü soru kimliklerini takip eden iki aşamalı bir seçim algoritması kurguladık:</p>
            <pre><code>-- Seçilen ders ve ünitedeki henüz çözülmemiş soruları önceliklendir
SELECT s.* FROM sorular s
LEFT JOIN kullanici_cozumleri kc
  ON s.id = kc.soru_id AND kc.kullanici_id = :uid AND kc.tur_sayisi = :aktif_tur
WHERE s.ders_id = :ders_id AND kc.id IS NULL
ORDER BY RAND()
LIMIT :soru_sayisi;</code></pre>
            <p>İlgili konu havuzundaki tüm sorular en az bir kez çözüldüğünde <code>aktif_tur</code> sayacı otomatik olarak bir artırılır ve havuz sıfırlanarak yeni bir karıştırma döngüsü başlatılır. Böylece kullanıcı havuzdaki tüm soruları görmeden aynı soruyla tekrar karşılaşmaz.</p>
        '
    ],
    [
        'id' => 3,
        'slug' => 'php-b2b-toptan-sisteminden-b2c-eticaret-mimarisine-gecis',
        'title' => 'PHP 8.2 ile B2B Toptan Altyapısından B2C Perakende E-Ticaret Mimarisine Geçiş',
        'date' => '20 Kasım 2026',
        'read_time' => '5 dk okuma',
        'category' => 'Web Geliştirme',
        'summary' => 'Mevcut B2B/POS veritabanı şemasını bozmadan B2C son kullanıcı vitrinine dönüştürme, PDO güvenliği ve 3:4 stüdyo kadrajında otomatik görsel işleme hattı.',
        'content' => '
            <p>Halihazırda mağaza içi barkodlu satış (POS), cari hesap ve toptan sipariş yönetimi için çalışan bir PHP/MySQL sistemini son kullanıcıya (B2C) açarken en kritik hedef, arka plandaki stok ve fiyat tablolarını çoğaltmadan tek veritabanı üzerinden iki farklı deneyimi yönetmektir.</p>
            <h3>1. Tek Veritabanı, Çift Katmanlı Erişim</h3>
            <p>B2B tarafında bayiye özel iskontolu fiyatlar ve zorunlu oturum açma akışı bulunurken, B2C vitrininde ziyaretçilerin kayıt olma zorunluluğu olmadan ürünleri inceleyebilmesi gerekir. Tüm veritabanı sorgularını <code>PDO</code> prepared statements yapısına geçirerek hem SQL injection riskini ortadan kaldırdık hem de katalog filtreleme sorgularını modüler hale getirdik.</p>
            <h3>2. Ürün Kodu Tabanlı 3:4 Stüdyo Görsel İşleme Algoritması</h3>
            <p>Perakende e-ticaret arayüzünde ürün kartlarının kaymasını önlemek için tüm görsellerin aynı en-boy oranında (3:4 dikey kadraj) sunulması gerekir. Yönetim panelinden yüklenen ham fotoğraflar PHP GD kütüphanesiyle otomatik olarak işlenir:</p>
            <pre><code>// Hedef 3:4 oranına göre merkezden kırpma (Center-Crop) hesabı
$hedefOran = 3 / 4;
$mevcutOran = $genislik / $yukseklik;

if ($mevcutOran > $hedefOran) {
    $yeniGenislik = (int)($yukseklik * $hedefOran);
    $xOffset = (int)(($genislik - $yeniGenislik) / 2);
    $yOffset = 0;
} else {
    $yeniYukseklik = (int)($genislik / $hedefOran);
    $xOffset = 0;
    $yOffset = (int)(($yukseklik - $yeniYukseklik) / 2);
}</code></pre>
            <p>İşlenen görseller doğrudan ürün stok koduyla (örneğin <code>PRD-1042-1.webp</code>) adlandırılarak dosya sistemi ile veritabanı arasında ek bir eşleştirme tablosuna ihtiyaç duymadan çoklu galeri desteği sağlandı.</p>
        '
    ]
];