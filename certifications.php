<?php
require_once __DIR__ . '/includes/standards.php';

$pageTitle = 'Certification Standards | IFTA AG';
$pageDescription = 'IFTA AG certifies according to national and international standards, including ISO 9001, ISO 14001, ISO 22000, FSSC 22000, ISO 50001, ZNU, QS and ITW.';
$isCertificationNav = true;
$standards = ifta_standards();
$further = ifta_further_standards();
include __DIR__ . '/header.php';

$index = 1;
?>

<section class="inner-hero about-page-hero">
    <div class="container">
        <p class="hero-kicker">Certification standards</p>
        <h1>Which standard is right for your company?</h1>
        <p>An independent overview of the national and international programs we carry out as a certification body.</p>
    </div>
</section>

<section class="home-intro">
    <div class="container home-intro-grid">
        <div class="home-intro-title">
            <p class="section-kicker">Overview</p>
            <h2>One body.<br>Many standards.</h2>
        </div>
        <div class="home-intro-copy">
            <p>We certify according to national and international standards, norms, and programs. We audit companies in the agricultural, feed, and food industries, as well as related supplier industries and service providers. We also certify companies in the commercial, trade, and service sectors, branches of healthcare professionals, educational and scientific institutions, and hotels and restaurants.</p>
            <p>Here you will find an overview of all certification standards and programs that we carry out as an independent certification body.</p>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Our range of services</p>
            <h2>Certification of</h2>
        </div>
        <div class="topic-grid-inner std-card-grid">
            <?php foreach ($standards as $standard): ?>
                <a class="topic-card" href="<?php echo htmlspecialchars($baseUrl . '/' . $standard['file'], ENT_QUOTES, 'UTF-8'); ?>">
                    <span class="topic-index"><?php echo str_pad((string) $index, 2, '0', STR_PAD_LEFT); ?></span>
                    <h3><?php echo htmlspecialchars($standard['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($standard['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <span class="topic-link">Read more</span>
                </a>
                <?php $index++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="inner-section about-alt">
    <div class="container home-intro-grid">
        <div class="home-intro-title">
            <p class="section-kicker">Further programs</p>
            <h2>Also in our portfolio</h2>
        </div>
        <div class="home-intro-copy">
            <ul class="std-pills">
                <?php foreach ($further as $item): ?>
                    <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="std-further-note">Please contact us if you would like information on these programs or a non-binding offer.</p>
        </div>
    </div>
</section>

<section class="split-band">
    <div class="container split-band-inner">
        <div class="split-band-media">
            <img src="<?php echo $baseUrl; ?>/images/hero.jpg" alt="IFTA AG certification in Berlin">
        </div>
        <div class="split-band-copy">
            <p class="section-kicker">Next step</p>
            <h2>Request information</h2>
            <p>For further information or a non-binding offer, please call us on <a href="tel:+49304788030">+49 30 47 88 03 0</a> or email <a href="mailto:info@ifta-ag.de">info@ifta-ag.de</a>.</p>
            <a class="btn-olive" href="<?php echo $baseUrl; ?>/contact.php">Contact IFTA AG</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
