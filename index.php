<?php
$pageTitle = 'IFTA AG | Certifications from a single source';
$pageDescription = 'IFTA AG is an internationally recognized certification body. We certify management systems, products and processes — independently, objectively and confidentially.';
include __DIR__ . '/header.php';
?>

<section class="hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/hero.jpg" alt="Independent certification work at IFTA AG">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <p class="hero-kicker">Welcome to IFTA AG</p>
            <h1 class="hero-title">Certifications from a single source.</h1>
            <p class="hero-lead">As an internationally recognized certification organization based in Berlin, we certify your management system, people-related programs and products — nationally and internationally.</p>
            <div class="hero-actions">
                <a class="btn-olive" href="<?php echo $baseUrl; ?>/about.php">Learn more</a>
                <a class="btn-outline-dark" href="<?php echo $baseUrl; ?>/system-certification.php">System certification</a>
            </div>
        </div>
    </div>
</section>

<section class="cert-bar" aria-label="Certificate verification">
    <div class="container cert-bar-inner">
        <div class="cert-bar-copy">
            <p class="cert-bar-kicker">Certificate verification</p>
            <h2>Look up an issued certificate</h2>
            <p>Enter the certificate number to open the official PDF.</p>
        </div>
        <form class="cert-form" action="<?php echo $baseUrl; ?>/certificate.php" method="get" target="_blank" rel="noopener">
            <label for="certificateNumber">Certificate number</label>
            <div class="cert-form-row">
                <input type="text" id="certificateNumber" name="number" required autocomplete="off" placeholder="Enter certificate number">
                <button type="submit">View certificate</button>
            </div>
        </form>
    </div>
</section>

<section class="home-intro">
    <div class="container home-intro-grid">
        <figure class="media-figure">
            <img src="<?php echo $baseUrl; ?>/images/about-who-we-are.png" alt="IFTA AG team and certification work">
        </figure>
        <div class="home-intro-copy">
            <p class="section-kicker">IFTA AG</p>
            <h2>Your international certification service</h2>
            <p>We carry out audit, certification and surveillance services worldwide. Independence, objectivity and close trust with our clients are central to how we work.</p>
            <p>All conformity assessment activities are performed under the IFTA AG name and are regularly assessed against recognized accreditation requirements. That keeps quality and security at a consistently high level.</p>
            <p>Through continuous development, trained personnel and practical procedures, we create usable solutions for your organization — not paperwork for its own sake.</p>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Services</p>
            <h2>Our certification processes</h2>
        </div>
        <div class="photo-grid">
            <article class="photo-card">
                <img src="<?php echo $baseUrl; ?>/images/quality-testing.jpg" alt="Professional audit implementation">
                <h3>Professional implementation</h3>
                <p>We implement your company audit professionally, including audit duration according to the applicable rules.</p>
            </article>
            <article class="photo-card">
                <img src="<?php echo $baseUrl; ?>/images/quality-forge.jpg" alt="Certification procedure">
                <h3>The certification procedure</h3>
                <p>Clear, efficient processes from application to certificate decision for the needs of our clients.</p>
            </article>
            <article class="photo-card">
                <img src="<?php echo $baseUrl; ?>/images/jobs-card.jpg" alt="How a certification procedure runs">
                <h3>How a procedure runs</h3>
                <p>From pre-audit through stage audits to surveillance and recertification.</p>
            </article>
        </div>
        <div class="page-cta-row">
            <a class="btn-outline-dark" href="<?php echo $baseUrl; ?>/certification-processes.php">Certification processes</a>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">System certification</p>
            <h2>Recognized certification services</h2>
        </div>
        <div class="iso-chip-grid">
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/iso-9001.php">ISO 9001</a>
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/iso-14001.php">ISO 14001</a>
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/iso-22000.php">ISO 22000 / FSSC 22000</a>
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/iso-50001.php">ISO 50001</a>
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/znu.php">ZNU</a>
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/qs.php">QS</a>
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/itw.php">ITW</a>
            <a class="iso-chip" href="<?php echo $baseUrl; ?>/system-certification.php">All systems</a>
        </div>
    </div>
</section>

<section class="inner-section" id="contact">
    <div class="container contact-layout">
        <figure class="media-figure">
            <img src="<?php echo $baseUrl; ?>/images/careers-culture.jpg" alt="Contact the IFTA AG team in Berlin">
        </figure>
        <div>
            <p class="section-kicker">Contact</p>
            <h2>Contact us</h2>
            <p>Your questions and plans are important to us. Complete the fields and describe your request so we can assist you quickly.</p>
            <div class="contact-details" style="margin-top:28px;">
                <div class="contact-detail">
                    <h3>Office</h3>
                    <p>Neukirchstraße 26<br>13089 Berlin</p>
                </div>
                <div class="contact-detail">
                    <h3>Phone</h3>
                    <p><a href="tel:+49304788030">+49 30 47 88 03 0</a></p>
                </div>
                <div class="contact-detail">
                    <h3>Email</h3>
                    <p><a href="mailto:info@ifta-ag.de">info@ifta-ag.de</a></p>
                </div>
            </div>
            <div class="page-cta-row">
                <a class="btn-olive" href="<?php echo $contactHref; ?>">Open contact form</a>
                <a class="btn-outline-dark" href="<?php echo $careersHref; ?>">Career application</a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
