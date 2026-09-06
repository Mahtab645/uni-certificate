<?php
if (!isset($pageTitle)) {
    $pageTitle = 'IFTA AG | Certification, one-stop competence';
}
$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/'));
$siteRoot = str_replace('\\', '/', realpath(__DIR__) ?: __DIR__);
if ($docRoot && $siteRoot && strpos($siteRoot, $docRoot) === 0) {
    $baseUrl = substr($siteRoot, strlen($docRoot));
} else {
    $baseUrl = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
}
$baseUrl = rtrim(str_replace('\\', '/', (string) $baseUrl), '/');
if ($baseUrl === '.' || $baseUrl === '\\') {
    $baseUrl = '';
}
$currentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$contactHref = $baseUrl . '/contact.php';
$careersHref = $baseUrl . '/careers.php';
$isHome = $currentPage === 'index.php';
if (!isset($isCertificationNav)) {
    $isCertificationNav = false;
}
$isCertificationNav = $isCertificationNav || in_array($currentPage, ['certifications.php', 'system-certification.php'], true);
if (!isset($pageDescription)) {
    $pageDescription = 'IFTA AG is a state-recognized certification body accredited to DIN EN ISO 17021 and DIN EN ISO 17065. Naturally. For the future.';
}
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    $scheme = explode(',', (string) $_SERVER['HTTP_X_FORWARDED_PROTO'])[0];
}
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$siteAbs = $scheme . '://' . $host . $baseUrl;
$canonicalUrl = $scheme . '://' . $host . strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$ogImage = isset($ogImage) ? $ogImage : ($siteAbs . '/images/hero.jpg');
$ogLogo = $siteAbs . '/images/logo.png';

$navItems = [
    ['label' => 'Home', 'href' => $baseUrl . '/index.php', 'file' => 'index.php'],
    ['label' => 'About us', 'href' => $baseUrl . '/about.php', 'file' => 'about.php'],
    ['label' => 'Certification processes', 'href' => $baseUrl . '/certification-processes.php', 'file' => 'certification-processes.php'],
    ['label' => 'System certification', 'href' => $baseUrl . '/system-certification.php', 'file' => 'system-certification.php'],
    ['label' => 'Contact', 'href' => $contactHref, 'file' => 'contact.php'],
    ['label' => 'Career', 'href' => $careersHref, 'file' => 'careers.php'],
];
$navLeft = array_slice($navItems, 0, 3);
$navRight = array_slice($navItems, 3);

if (!function_exists('ifta_nav_active')) {
    function ifta_nav_active($item, $currentPage, $isCertificationNav)
    {
        return $currentPage === $item['file']
            || ($item['file'] === 'system-certification.php' && $isCertificationNav);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($ogLogo, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="apple-touch-icon" href="<?php echo htmlspecialchars($ogLogo, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="IFTA AG">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <script type="application/ld+json">
    <?php echo json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'IFTA AG',
        'url' => $siteAbs . '/index.php',
        'logo' => $ogLogo,
        'image' => $ogImage,
        'telephone' => '+49 30 4788030',
        'email' => 'info@ifta-ag.de',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Neukirchstraße 26',
            'postalCode' => '13089',
            'addressLocality' => 'Berlin',
            'addressCountry' => 'DE',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/style.css?v=white9">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<body class="<?php echo $isHome ? 'is-home' : 'is-inner'; ?>">
<header class="site-header">
    <div class="header-top">
        <div class="container header-top-inner">
            <div class="header-top-links">
                <a href="tel:+49304788030">+49 30 47 88 03 0</a>
                <a href="mailto:info@ifta-ag.de">info@ifta-ag.de</a>
            </div>
            <div class="lang-switch notranslate" role="group" aria-label="Language">
                <button type="button" class="lang-btn" data-lang="de" lang="de" title="Deutsch">DE</button>
                <button type="button" class="lang-btn is-active" data-lang="en" lang="en" title="English">EN</button>
            </div>
        </div>
    </div>
    <div class="container header-inner">
        <nav class="header-nav header-nav-left" aria-label="Primary left">
            <ul class="header-menu">
                <?php foreach ($navLeft as $item): ?>
                <li class="nav-item">
                    <a class="nav-link<?php echo ifta_nav_active($item, $currentPage, $isCertificationNav) ? ' active' : ''; ?>" href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <a class="header-logo notranslate" href="<?php echo $baseUrl; ?>/index.php">
            <img src="<?php echo $baseUrl; ?>/images/logo.png" alt="IFTA AG — Naturally. For the future.">
        </a>

        <nav class="header-nav header-nav-right" aria-label="Primary right">
            <ul class="header-menu">
                <?php foreach ($navRight as $item): ?>
                <li class="nav-item">
                    <a class="nav-link<?php echo ifta_nav_active($item, $currentPage, $isCertificationNav) ? ' active' : ''; ?>" href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <button class="navbar-toggler" type="button" id="navToggle" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>
<div class="navbar-collapse" id="mainNav">
    <div class="mobile-nav-head">
        <p class="mobile-nav-title">Menu</p>
        <div class="lang-switch notranslate" role="group" aria-label="Language">
            <button type="button" class="lang-btn" data-lang="de" lang="de" title="Deutsch">DE</button>
            <button type="button" class="lang-btn is-active" data-lang="en" lang="en" title="English">EN</button>
        </div>
        <button class="nav-close" type="button" id="navClose" aria-label="Close menu">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </button>
    </div>
    <ul class="header-menu navbar-nav">
        <?php foreach ($navItems as $item): ?>
        <li class="nav-item">
            <a class="nav-link<?php echo ifta_nav_active($item, $currentPage, $isCertificationNav) ? ' active' : ''; ?>" href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="nav-backdrop" id="navBackdrop" hidden></div>
