<?php
$pageTitle = 'Projects | IFTA AG';
$pageDescription = 'IFTA AG research and development projects including ProtecTier, farm4.net, EMITI and DigiOekoRegio, linking research and practice.';
include __DIR__ . '/header.php';
?>

<section class="inner-hero about-page-hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/hero-about.jpg" alt="">
    <div class="hero-overlay"></div>
    <div class="container">
        <p class="hero-kicker">Projects</p>
        <h1>Research that<br>shapes progress.</h1>
        <p>We act as a link between research and practice — independently and with partners from industry and science.</p>
    </div>
</section>

<section class="home-intro">
    <div class="container home-intro-grid">
        <div class="home-intro-title">
            <p class="section-kicker">Research &amp; development</p>
            <h2>Practical solutions,<br>from real problems.</h2>
        </div>
        <div class="home-intro-copy">
            <p>Without research and development, progress comes to a standstill. We want to actively shape progress. Market observation and analysis of problems in our areas of activity are the starting point for a series of research projects.</p>
            <p>The main objective of IFTA AG is to offer practical solutions. In our expert work, we act as a link between research and practice. Our cross-industry expertise has resulted in IFTA AG having a high level of technical knowledge and a wealth of experience.</p>
            <p>We work on these topics independently or in cooperation with partners from industry and science. In implementing these projects, we can draw on the high academic competence of our employees.</p>
        </div>
    </div>
</section>

<section class="inner-section about-alt">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Current involvement</p>
            <h2>Networks and projects</h2>
        </div>
        <div class="project-grid">
            <article class="topic-card">
                <span class="topic-index">01</span>
                <h3>ProtecTier</h3>
                <p>A network of companies and research institutions working to improve animal welfare in modern livestock farming. Partners develop practical housing and production systems that meet economic, ecological and ethical requirements.</p>
            </article>
            <article class="topic-card">
                <span class="topic-index">02</span>
                <h3>farm4.net</h3>
                <p>A collaborative network in which IFTA AG works with partners from industry and science. The aim is to translate observed market and practice problems into workable solutions for farms and the food chain.</p>
            </article>
            <article class="topic-card">
                <span class="topic-index">03</span>
                <h3>EMITI</h3>
                <p>One of the research networks in which IFTA AG is currently active. Cross-industry expertise and academic competence in our team support the development of practice-oriented results.</p>
            </article>
            <article class="topic-card">
                <span class="topic-index">04</span>
                <h3>DigiOekoRegio</h3>
                <p>A project funded under the German federal program “Organic Farming and Other Forms of Sustainable Agriculture” (BÖLN). It addresses networking, logistics and demand in regional organic beef marketing. IFTA AG develops a quality-management approach for a transparent regional value chain.</p>
            </article>
        </div>
    </div>
</section>

<section class="split-band">
    <div class="container split-band-inner">
        <div class="split-band-media">
            <img src="<?php echo $baseUrl; ?>/images/hero.jpg" alt="IFTA AG research and practice in Berlin">
        </div>
        <div class="split-band-copy">
            <p class="section-kicker">Collaborate</p>
            <h2>Partner with IFTA AG</h2>
            <p>If you would like to discuss research cooperation, certification in a project context, or a practical problem in your sector, we would be glad to hear from you.</p>
            <a class="btn-olive" href="<?php echo $baseUrl; ?>/contact.php">Talk to our team</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
