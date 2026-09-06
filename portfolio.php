<?php
$pageTitle = 'Portfolio | IFTA AG';
$pageDescription = 'IFTA AG certification services across agriculture, food, healthcare, industry, sustainability, education and customer programs.';
require_once __DIR__ . '/includes/standards.php';
include __DIR__ . '/header.php';

$pillLinks = [
    'Quality Management DIN EN ISO 9001' => 'iso-9001',
    'Environmental Management DIN EN ISO 14001' => 'iso-14001',
    'Food safety DIN EN ISO 22000 and FSSC 22000' => 'iso-22000',
    'Energy Management DIN EN ISO 50001' => 'iso-50001',
    'ZNU Standard — driving sustainable change' => 'znu',
    'QS — Quality scheme for food' => 'qs',
    'ITW — Initiative Tierwohl (Animal Welfare Initiative)' => 'itw',
];

$sectors = [
    [
        'id' => 'agriculture',
        'index' => '01',
        'title' => 'Agriculture, animal feed and food industry',
        'intro' => 'Auditing and certification across the entire agricultural and food value chain — from feed and farming through processing to retail.',
        'items' => [
            'Quality Management DIN EN ISO 9001',
            'Environmental Management DIN EN ISO 14001',
            'Food safety DIN EN ISO 22000 and FSSC 22000',
            'Energy Management DIN EN ISO 50001',
            'ZNU Standard — driving sustainable change',
            'QS — Quality scheme for food',
            'ITW — Initiative Tierwohl (Animal Welfare Initiative)',
            'VLOG — Standard “Ohne Gentechnik” (GMO-free)',
            'Regionalfenster — Regional window',
            'German origin label “Herkunftszeichen Deutschland”',
            'EMAS III, Eco-Management, Regulation (EC) No 1221/2009',
            'REDcert / REDcert²',
            'SURE EU',
        ],
    ],
    [
        'id' => 'healthcare',
        'index' => '02',
        'title' => 'Medical and healthcare',
        'intro' => 'Independent certification for healthcare organizations, focusing on quality, energy and sustainable management.',
        'items' => [
            'Quality Management DIN EN ISO 9001',
            'Energy Management DIN EN ISO 50001',
            'ZNU Standard — driving sustainable change',
        ],
    ],
    [
        'id' => 'industry',
        'index' => '03',
        'title' => 'Industry, trade and services',
        'intro' => 'Cross-sector programs for manufacturing, commerce and service companies, nationally and internationally.',
        'items' => [
            'Quality Management DIN EN ISO 9001',
            'Environmental Management DIN EN ISO 14001',
            'Food safety DIN EN ISO 22000 and FSSC 22000',
            'Energy Management DIN EN ISO 50001',
            'ZNU Standard — driving sustainable change',
            'QS — Quality scheme for food',
            'VLOG — Standard “Ohne Gentechnik” (GMO-free)',
            'REDcert / REDcert²',
            'SURE EU',
        ],
    ],
    [
        'id' => 'sustainability',
        'index' => '04',
        'title' => 'Sustainability, energy and environment',
        'intro' => 'Certification that supports environmental performance, energy efficiency and sustainable supply chains.',
        'items' => [
            'Environmental Management DIN EN ISO 14001',
            'Energy Management DIN EN ISO 50001',
            'ZNU Standard — driving sustainable change',
            'EMAS III, Eco-Management, Regulation (EC) No 1221/2009',
            'REDcert / REDcert²',
            'SURE EU',
        ],
    ],
    [
        'id' => 'education',
        'index' => '05',
        'title' => 'Education and social services',
        'intro' => 'Quality management certification for educational institutions and social-service organizations.',
        'items' => [
            'Quality Management DIN EN ISO 9001',
        ],
    ],
];
?>

<section class="inner-hero about-page-hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/hero-systems.jpg" alt="">
    <div class="hero-overlay"></div>
    <div class="container">
        <p class="hero-kicker">Portfolio</p>
        <h1>Certification across<br>sectors and standards.</h1>
        <p>An independent overview of the programs we deliver with expertise and integrity.</p>
    </div>
</section>

<section class="home-intro">
    <div class="container home-intro-grid">
        <div class="home-intro-title">
            <p class="section-kicker">Overview</p>
            <h2>One body.<br>Many industries.</h2>
        </div>
        <div class="home-intro-copy">
            <p>Our auditing and certification services span the entire value chain of the agricultural and food sectors, the healthcare industry, and a wide range of manufacturing and service-based industries.</p>
            <p>This portfolio lists all certification standards and programs relating to the business areas in which we operate as an independent certification body — with the highest level of expertise and integrity.</p>
        </div>
    </div>
</section>

<nav class="about-jump" aria-label="Portfolio overview">
    <div class="container about-jump-inner">
        <a href="#agriculture">Agriculture &amp; food</a>
        <a href="#healthcare">Healthcare</a>
        <a href="#industry">Industry &amp; trade</a>
        <a href="#sustainability">Sustainability</a>
        <a href="#education">Education</a>
        <a href="#customer-programs">Customer programs</a>
    </div>
</nav>

<?php foreach ($sectors as $i => $sector): ?>
<section class="inner-section<?php echo $i % 2 === 1 ? ' about-alt' : ''; ?>" id="<?php echo htmlspecialchars($sector['id'], ENT_QUOTES, 'UTF-8'); ?>">
    <div class="container portfolio-sector">
        <div class="portfolio-sector-copy">
            <span class="topic-index"><?php echo htmlspecialchars($sector['index'], ENT_QUOTES, 'UTF-8'); ?></span>
            <h2><?php echo htmlspecialchars($sector['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><?php echo htmlspecialchars($sector['intro'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <ul class="std-pills">
            <?php foreach ($sector['items'] as $item): ?>
            <?php $pillSlug = $pillLinks[$item] ?? ''; ?>
            <li>
                <?php if ($pillSlug !== ''): ?>
                    <a href="<?php echo htmlspecialchars(ifta_standard_url($baseUrl, $pillSlug), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></a>
                <?php else: ?>
                    <?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endforeach; ?>


<section class="split-band">
    <div class="container split-band-inner">
        <div class="split-band-copy">
            <p class="section-kicker">Next step</p>
            <h2>Need the right standard?</h2>
            <p>See our full list of certification standards, or speak with the IFTA AG team about the program that fits your organization.</p>
            <a class="btn-olive" href="<?php echo $baseUrl; ?>/system-certification.php">System certification</a>
            <a class="btn-outline-dark" href="<?php echo $baseUrl; ?>/contact.php">Contact us</a>
        </div>
        <div class="split-band-media">
            <img src="<?php echo $baseUrl; ?>/images/hero.jpg" alt="IFTA AG certification in Berlin">
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
