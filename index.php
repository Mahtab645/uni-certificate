<?php
$pageTitle = 'IFTA AG | Certification, one-stop competence';
$pageDescription = 'With over 30 years of experience, IFTA AG is a reliable partner for independent certification — accredited to DIN EN ISO 17021, DIN EN ISO 17065 and BiokraftNachV.';
include __DIR__ . '/header.php';
?>

<section class="cert-bar" aria-label="Certificate verification">
    <div class="container cert-bar-inner">
        <div class="cert-bar-copy">
            <p class="cert-bar-kicker">Certificate verification</p>
            <h2>Look up an issued certificate</h2>
            <p>Enter the certificate number to open the official PDF in a new window.</p>
        </div>
        <form class="cert-form" action="<?php echo $baseUrl; ?>/certificate.php" method="get" target="_blank" rel="noopener">
            <label for="certificateNumber">Certificate number</label>
            <div class="cert-form-row">
                <input type="text" id="certificateNumber" name="number" required autocomplete="off" placeholder="Enter Certificate number">
                <button type="submit">View certificate</button>
            </div>
           
        </form>
    </div>
</section>

<section class="hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/hero.jpg" alt="Berlin skyline at sunset with the Molecule Man sculpture">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <p class="hero-kicker">Independent certification · Berlin · International</p>
            <h1 class="hero-title">Certification,<br>one-stop competence.</h1>
            <p class="hero-lead">A state-recognized certification body for management systems, products, processes and sustainability — trusted for more than three decades.</p>
        </div>
    </div>
</section>

<section class="stats-strip">
    <div class="container stats-strip-inner">
        <div class="stat-item">
            <strong>30+</strong>
            <span>Years of certification experience</span>
        </div>
        <div class="stat-item">
            <strong>ISO 17021</strong>
            <span>Management system accreditation</span>
        </div>
        <div class="stat-item">
            <strong>ISO 17065</strong>
            <span>Product and process certification</span>
        </div>
        <div class="stat-item">
            <strong>DAkkS / BLE</strong>
            <span>State-recognized certification body</span>
        </div>
    </div>
</section>

<section class="home-intro" id="about">
    <div class="container home-intro-grid">
        <div class="home-intro-title">
            <p class="section-kicker">IFTA AG</p>
            <h2>Naturally.<br>For the future.</h2>
        </div>
        <div class="home-intro-copy">
            <p>With over 30 years of experience in certification and a strong record of successful growth, we have established ourselves as a reliable and knowledgeable partner for businesses across all areas of independent certification.</p>
            <p>What started as a control body for agricultural operations has evolved into a cross-sector certification body, operating both nationally and internationally. IFTA AG is accredited according to DIN EN ISO 17021 and DIN EN ISO 17065 as well as BiokraftNachV and is therefore a state-recognized certification body.</p>
            <p>We accompany organizations toward a sustainable and environmentally aware future — with high quality standards, efficient processes, and competence from a single source.</p>
        </div>
    </div>
</section>

<section class="topic-grid">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Explore</p>
            <h2>How we work with you</h2>
        </div>
        <div class="topic-grid-inner">
            <a class="topic-card" href="<?php echo $baseUrl; ?>/about.php">
                <span class="topic-index">01</span>
                <h3>About us</h3>
                <p>History, business areas, services, and the certification process — from Berlin to international markets.</p>
                <span class="topic-link">Learn more</span>
            </a>
            <a class="topic-card" href="<?php echo $baseUrl; ?>/portfolio.php">
                <span class="topic-index">02</span>
                <h3>Portfolio</h3>
                <p>Cross-sector services for agriculture, food, healthcare, industry, sustainability, education and customer programs.</p>
                <span class="topic-link">View portfolio</span>
            </a>
            <a class="topic-card" href="<?php echo $baseUrl; ?>/certifications.php">
                <span class="topic-index">03</span>
                <h3>Certification standards</h3>
                <p>ISO 9001, 14001, 22000, 50001, QS, ITW, VLOG and further national and international programs.</p>
                <span class="topic-link">See standards</span>
            </a>
            <a class="topic-card" href="<?php echo $baseUrl; ?>/projects.php">
                <span class="topic-index">04</span>
                <h3>Projects</h3>
                <p>Research and development with industry and science, including ProtecTier, farm4.net, EMITI and DigiOekoRegio.</p>
                <span class="topic-link">Our projects</span>
            </a>
        </div>
    </div>
</section>

<section class="split-band">
    <div class="container split-band-inner">
        <div class="split-band-media">
            <img src="<?php echo $baseUrl; ?>/images/hero.jpg" alt="IFTA AG headquarters city, Berlin">
        </div>
        <div class="split-band-copy">
            <p class="section-kicker">Berlin</p>
            <h2>Talk to our team</h2>
            <p>We look forward to hearing from you. Reach out to learn more about who we are and what we offer.</p>
            <p class="split-band-meta"><a href="tel:+49304788030">+49 30 47 88 03 0</a><br><a href="mailto:info@ifta-ag.de">info@ifta-ag.de</a></p>
            <a class="btn-olive" href="<?php echo $contactHref; ?>">Contact IFTA AG</a>
        </div>
    </div>
</section>

<section class="split-band split-band-reverse">
    <div class="container split-band-inner">
        <div class="split-band-copy">
            <p class="section-kicker">Careers</p>
            <h2>Work with purpose</h2>
            <p>At IFTA AG, you’ll find meaningful work with a long-term perspective — in auditing, administration and internships across certification and sustainability.</p>
            <a class="btn-outline-dark" href="<?php echo $baseUrl; ?>/careers.php">Open positions</a>
        </div>
        <div class="split-band-media">
            <img src="<?php echo $baseUrl; ?>/images/jobs-card.jpg" alt="Working at IFTA AG">
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
