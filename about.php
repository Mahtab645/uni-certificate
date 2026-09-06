<?php
$pageTitle = 'About us | IFTA AG';
$pageDescription = 'IFTA AG is an independent certification body. Independence, objectivity and confidentiality guide our audit and certification work.';
include __DIR__ . '/header.php';
?>

<section class="inner-hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/about-who-we-are.png" alt="About IFTA AG">
    <div class="hero-overlay"></div>
    <div class="container">
        <p class="hero-kicker">About us</p>
        <h1>IFTA AG introduces itself.</h1>
        <p>A certification body for management systems and related services — guided by independence, objectivity and confidentiality.</p>
    </div>
</section>

<section class="home-intro">
    <div class="container home-intro-grid">
        <figure class="media-figure">
            <img src="<?php echo $baseUrl; ?>/images/quality-forge.jpg" alt="Independent certification at IFTA AG">
        </figure>
        <div class="home-intro-copy">
            <p class="section-kicker">Who we are</p>
            <h2>Why IFTA AG</h2>
            <p>IFTA AG has grown from an inspection body for agricultural holdings into a cross-sector certification company. We audit and certify management systems, products and processes under internationally recognized standards.</p>
            <p>Every client is supported according to the principles of independence, objectivity and confidentiality. Our customers come from agriculture and food, healthcare, industry, trade, services, education and the public sector.</p>
            <p>A certificate is a quality mark. Used well, it strengthens market position and makes internal processes more efficient. We tailor our services so that products and services meet the relevant standard requirements.</p>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Our values</p>
            <h2>Quality. Objectivity. Trust.</h2>
        </div>
        <div class="feature-rows">
            <article class="feature-row">
                <span class="feature-num">01</span>
                <div>
                    <h3>Quality</h3>
                    <p>We help organizations use their resources more effectively. Certified quality of products and services, together with more efficient workflows, creates lasting competitive advantages.</p>
                </div>
            </article>
            <article class="feature-row">
                <span class="feature-num">02</span>
                <div>
                    <h3>Objectivity</h3>
                    <p>Our work is free from undue external influence. We identify possible conflicts of interest and handle them impartially. Staff competence is developed continuously and reviewed by external bodies.</p>
                </div>
            </article>
            <article class="feature-row">
                <span class="feature-num">03</span>
                <div>
                    <h3>Trust</h3>
                    <p>Transparency in our services and reliability in delivery build trust with clients, partners and colleagues. Openness is essential if products, services and processes are to improve over time.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container home-intro-grid">
        <div class="home-intro-title">
            <p class="section-kicker">Guiding principles</p>
            <h2>Competence and quality as a hallmark</h2>
        </div>
        <div class="home-intro-copy">
            <p>The interests of the organizations we certify come first. Individual needs are identified so that quality and impartiality are protected in every phase of the procedure.</p>
            <ul>
                <li>Integrity and objectivity in all activities, in line with legal requirements</li>
                <li>Qualified personnel whose knowledge is developed continuously</li>
                <li>Current methods, so that new requirements can also be applied in ongoing work</li>
                <li>Efficient, correct audits according to ISO/IEC 17021 and ISO 19011</li>
            </ul>
            <div class="page-cta-row">
                <a class="btn-olive" href="<?php echo $baseUrl; ?>/system-certification.php">System certification</a>
            </div>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Accreditation</p>
            <h2>Authorization you can check</h2>
        </div>
        <div class="home-intro-copy">
            <p>IFTA AG is accredited according to DIN EN ISO 17021-1 and DIN EN ISO 17065 by Deutsche Akkreditierungsstelle GmbH (DAkkS). Current certificates are listed in the <a href="https://www.dakks.de/" target="_blank" rel="noopener">DAkkS database</a>.</p>
            <p>IFTA AG is recognized by the Federal Office for Agriculture and Food (BLE) as a certification body (DE-B-BLE-BM-ZSt-109).</p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
