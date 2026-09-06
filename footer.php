<footer class="site-footer">
    <div class="container footer-inner">
        <div class="footer-brand-block">
            <p class="footer-brand">IFTA AG</p>
            <p>Neukirchstraße 26<br>13089 Berlin<br>Germany</p>
            <p><a href="mailto:info@ifta-ag.de">info@ifta-ag.de</a></p>
        </div>
        <div class="footer-col">
            <h3>Contact</h3>
            <a href="<?php echo $contactHref; ?>">Contact form</a>
        </div>
        <div class="footer-col">
            <h3>Career</h3>
            <a href="<?php echo $contactHref; ?>#career">Application</a>
        </div>
        <div class="footer-col footer-links-col">
            <h3>Our services</h3>
            <a href="<?php echo $baseUrl; ?>/about.php">About us</a>
            <a href="<?php echo $baseUrl; ?>/certification-processes.php">Certification processes</a>
            <a href="<?php echo $baseUrl; ?>/system-certification.php">System certification</a>
        </div>
    </div>
    <div class="container footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> IFTA AG</p>
    </div>
</footer>

<div id="google_translate_element" class="notranslate" aria-hidden="true"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="<?php echo $baseUrl; ?>/js/custom.js"></script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<div class="cookie-banner" id="cookieBanner" hidden>
    <div class="cookie-banner-inner">
        <p>We use cookies to improve your browsing experience on the IFTA AG website.</p>
        <div class="cookie-banner-actions">
            <button type="button" class="cookie-banner-btn" id="cookieAccept">Accept</button>
            <button type="button" class="cookie-banner-btn cookie-banner-btn-cancel" id="cookieCancel">Decline</button>
        </div>
    </div>
</div>
