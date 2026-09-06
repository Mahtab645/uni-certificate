<?php
require_once __DIR__ . '/includes/certificates.php';

$number = ifta_normalize_certificate_number($_GET['number'] ?? '');
$cert = ifta_find_certificate($number);

if ($cert) {
    $path = __DIR__ . '/' . $cert['file'];
    if (is_file($path)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($cert['file']) . '"');
        header('Content-Length: ' . (string) filesize($path));
        header('X-Content-Type-Options: nosniff');
        readfile($path);
        exit;
    }
}

$pageTitle = 'Certificate not found | IFTA AG';
$pageDescription = 'The certificate number you entered could not be found in the IFTA AG register.';
include __DIR__ . '/header.php';
?>

<section class="inner-hero">
    <div class="container">
        <h1>Certificate not found</h1>
        <p>We could not match that number to a published IFTA certificate.</p>
    </div>
</section>

<section class="inner-section">
    <div class="container inner-narrow">
        <?php if ($number !== ''): ?>
            <p>The number <strong><?php echo htmlspecialchars($number, ENT_QUOTES, 'UTF-8'); ?></strong> is not in our public register.</p>
        <?php else: ?>
            <p>Please enter a certificate number to view the corresponding PDF.</p>
        <?php endif; ?>
        <p>Try one of these sample numbers: <code>IFTA-9001-2024</code>, <code>IFTA-14001-2024</code>, <code>IFTA-50001-2024</code>, or <code>DEMO-2026</code>.</p>
        <p><a class="btn-olive" href="<?php echo $baseUrl; ?>/index.php">Back to homepage</a></p>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
