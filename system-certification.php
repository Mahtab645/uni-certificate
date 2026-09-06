<?php
require_once __DIR__ . '/includes/standards.php';

$pageTitle = 'System certification | IFTA AG';
$pageDescription = 'System certification with IFTA AG: ISO 9001, ISO 14001, ISO 22000, FSSC 22000, ISO 50001, ZNU, QS and ITW.';
$isCertificationNav = true;
$standards = ifta_standards();
include __DIR__ . '/header.php';

$index = 1;
?>

<section class="inner-hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/hero-systems.jpg" alt="System certification and quality control">
    <div class="hero-overlay"></div>
    <div class="container">
        <p class="hero-kicker">System certification</p>
        <h1>Certification services for management systems.</h1>
        <p>A range of certification options for different areas of your organization — independent and from a single source.</p>
    </div>
</section>

<section class="home-intro">
    <div class="container home-intro-grid">
        <div class="home-intro-title">
            <p class="section-kicker">Overview</p>
            <h2>System certifications</h2>
        </div>
        <div class="home-intro-copy">
            <p>We certify according to national and international standards. Open a system below for definition, typical use and next steps.</p>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Our certification services</p>
            <h2>Recognized management systems</h2>
        </div>
        <div class="std-list-rows">
            <?php foreach ($standards as $standard): ?>
                <a class="std-row" href="<?php echo htmlspecialchars($baseUrl . '/' . $standard['file'], ENT_QUOTES, 'UTF-8'); ?>">
                    <span><?php echo str_pad((string) $index, 2, '0', STR_PAD_LEFT); ?></span>
                    <div>
                        <h3><?php echo htmlspecialchars($standard['code'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars($standard['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <span class="topic-link">Details</span>
                </a>
                <?php $index++; ?>
            <?php endforeach; ?>
        </div>
        <div class="page-cta-row">
            <a class="btn-olive" href="<?php echo $baseUrl; ?>/contact.php">Request information</a>
            <a class="btn-outline-dark" href="<?php echo $baseUrl; ?>/certification-processes.php">Certification processes</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
