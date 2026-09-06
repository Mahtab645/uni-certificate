<?php
require_once __DIR__ . '/standards.php';

if (empty($standardSlug)) {
    header('Location: system-certification.php', true, 302);
    exit;
}

$standard = ifta_get_standard($standardSlug);
if (!$standard) {
    http_response_code(404);
    $pageTitle = 'Standard not found | IFTA AG';
    $pageDescription = 'The requested certification standard could not be found.';
    include dirname(__DIR__) . '/header.php';
    ?>
    <section class="inner-hero">
        <div class="container">
            <p class="hero-kicker">System certification</p>
            <h1>Standard not found.</h1>
            <p>Please return to the overview of system certification.</p>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <a class="btn-olive" href="<?php echo htmlspecialchars($baseUrl . '/system-certification.php', ENT_QUOTES, 'UTF-8'); ?>">All systems</a>
        </div>
    </section>
    <?php
    include dirname(__DIR__) . '/footer.php';
    echo "</body>\n</html>\n";
    exit;
}

$isCertificationNav = true;
$pageTitle = $standard['title'] . ' | IFTA AG';
$pageDescription = $standard['description'];
$allStandards = ifta_standards();
include dirname(__DIR__) . '/header.php';
?>

<section class="inner-hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/quality-testing.jpg" alt="">
    <div class="hero-overlay"></div>
    <div class="container">
        <p class="hero-kicker"><?php echo htmlspecialchars($standard['code'], ENT_QUOTES, 'UTF-8'); ?></p>
        <h1><?php echo htmlspecialchars($standard['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <p><?php echo htmlspecialchars($standard['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
</section>

<nav class="about-jump" aria-label="Breadcrumb">
    <div class="container about-jump-inner">
        <a href="<?php echo htmlspecialchars($baseUrl . '/system-certification.php', ENT_QUOTES, 'UTF-8'); ?>">System certification</a>
        <span aria-current="page"><?php echo htmlspecialchars($standard['nav'], ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
</nav>

<section class="inner-section">
    <div class="container standard-layout">
        <div class="standard-copy">
            <?php foreach ($standard['paragraphs'] as $paragraph): ?>
                <p><?php echo htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endforeach; ?>

            <?php if (!empty($standard['list'])): ?>
                <?php if (!empty($standard['list_title'])): ?>
                    <h2><?php echo htmlspecialchars($standard['list_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <?php endif; ?>
                <ul>
                    <?php foreach ($standard['list'] as $item): ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($standard['more'])): ?>
                <p><a href="<?php echo htmlspecialchars($standard['more']['url'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($standard['more']['label'], ENT_QUOTES, 'UTF-8'); ?></a></p>
            <?php endif; ?>

            <?php if (!empty($standard['sectors'])): ?>
                <h2>We offer certification in the following areas</h2>
                <ul class="std-pills">
                    <?php foreach ($standard['sectors'] as $sector): ?>
                        <li><?php echo htmlspecialchars($sector, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($standard['scopes'])): ?>
                <h2>Our certification services</h2>
                <?php if (!empty($standard['services_intro'])): ?>
                    <p><?php echo htmlspecialchars($standard['services_intro'], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
                <div class="scope-grid">
                    <?php foreach ($standard['scopes'] as $scope): ?>
                        <article class="scope-card">
                            <h3><?php echo htmlspecialchars($scope['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p><?php echo htmlspecialchars($scope['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <ul>
                                <?php foreach ($scope['items'] as $item): ?>
                                    <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <aside class="standard-aside">
            <div class="contact-panel">
                <p class="section-kicker">Enquire</p>
                <h2>Request information</h2>
                <p>For further information or a non-binding offer, please call us or send an email.</p>
                <p class="split-band-meta">
                    <a href="tel:+49304788030">+49 30 47 88 03 0</a><br>
                    <a href="mailto:info@ifta-ag.de">info@ifta-ag.de</a>
                </p>
                <a class="btn-olive" href="<?php echo htmlspecialchars($baseUrl . '/contact.php', ENT_QUOTES, 'UTF-8'); ?>">Contact IFTA AG</a>
            </div>
        </aside>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Also available</p>
            <h2>Further certification standards</h2>
        </div>
        <div class="standard-related">
            <?php foreach ($allStandards as $related): ?>
                <?php if ($related['slug'] === $standard['slug']) {
                    continue;
                } ?>
                <a class="related-std" href="<?php echo htmlspecialchars($baseUrl . '/' . $related['file'], ENT_QUOTES, 'UTF-8'); ?>">
                    <span><?php echo htmlspecialchars($related['code'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <strong><?php echo htmlspecialchars($related['nav'], ENT_QUOTES, 'UTF-8'); ?></strong>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
