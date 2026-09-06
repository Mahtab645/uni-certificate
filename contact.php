<?php
$pageTitle = 'Contact | IFTA AG';
$pageDescription = 'Contact IFTA AG in Berlin. Neukirchstraße 26, 13089 Berlin. Phone +49 30 47 88 03 0, email info@ifta-ag.de.';

function page_clean($value)
{
    return trim((string) $value);
}

$contactErrors = [];
$contactSuccess = false;
$contactOld = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'company' => '',
    'country' => '',
    'interest' => '',
    'message' => '',
];

$formType = page_clean($_POST['form'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $formType === 'contact') {
    foreach ($contactOld as $key => $unused) {
        $contactOld[$key] = page_clean($_POST[$key] ?? '');
    }

    $honeypot = page_clean($_POST['website'] ?? '');

    if ($contactOld['name'] === '') {
        $contactErrors[] = 'Please enter your name.';
    }
    if ($contactOld['email'] === '' || !filter_var($contactOld['email'], FILTER_VALIDATE_EMAIL)) {
        $contactErrors[] = 'Please enter a valid email address.';
    }
    if ($contactOld['message'] === '') {
        $contactErrors[] = 'Please enter a message.';
    }
    if (empty($_POST['captcha'])) {
        $contactErrors[] = 'Please confirm you are not a robot.';
    }

    if ($honeypot !== '') {
        $contactSuccess = true;
        $contactOld = array_map(static function () {
            return '';
        }, $contactOld);
    } elseif (!$contactErrors) {
        $to = 'info@ifta-ag.de';
        $subject = 'Website contact: ' . $contactOld['name'];
        $body = "A new message was submitted from the IFTA AG website.\n\n"
            . 'Name: ' . $contactOld['name'] . "\n"
            . 'Email: ' . $contactOld['email'] . "\n"
            . 'Phone: ' . ($contactOld['phone'] !== '' ? $contactOld['phone'] : '(not provided)') . "\n"
            . 'Company: ' . ($contactOld['company'] !== '' ? $contactOld['company'] : '(not provided)') . "\n"
            . 'Country: ' . ($contactOld['country'] !== '' ? $contactOld['country'] : '(not provided)') . "\n"
            . 'Topic: ' . ($contactOld['interest'] !== '' ? $contactOld['interest'] : '(not provided)') . "\n\n"
            . "Message:\n" . $contactOld['message'] . "\n";

        $fromEmail = filter_var($contactOld['email'], FILTER_SANITIZE_EMAIL);
        $headers = [
            'From: IFTA AG Website <noreply@ifta-ag.de>',
            'Reply-To: ' . $fromEmail,
            'Content-Type: text/plain; charset=UTF-8',
            'X-Mailer: PHP/' . PHP_VERSION,
        ];

        $sent = @mail($to, $subject, $body, implode("\r\n", $headers));
        if ($sent) {
            $contactSuccess = true;
            $contactOld = array_map(static function () {
                return '';
            }, $contactOld);
        } else {
            $contactErrors[] = 'Your message could not be sent right now. Please call us or email info@ifta-ag.de.';
        }
    }
}

include __DIR__ . '/header.php';
?>

<section class="inner-hero">
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/quality-testing.jpg" alt="Contact IFTA AG in Berlin">
    <div class="hero-overlay"></div>
    <div class="container">
        <p class="hero-kicker">Contact</p>
        <h1>Contact us.</h1>
        <p>Your questions and plans are important to us. Reach us by phone, email or the form below.</p>
    </div>
</section>

<section class="inner-section" id="contact">
    <div class="container contact-layout">
        <div>
            <p class="section-kicker">IFTA AG</p>
            <h2>Berlin office</h2>
            <div class="contact-details">
                <div class="contact-detail">
                    <h3>Address</h3>
                    <p>Neukirchstraße 26<br>13089 Berlin<br>Germany</p>
                </div>
                <div class="contact-detail">
                    <h3>Phone</h3>
                    <p>fon <a href="tel:+49304788030">+49 30 47 88 03 0</a></p>
                </div>
                <div class="contact-detail">
                    <h3>Fax</h3>
                    <p>+49 30 47 88 03 20</p>
                </div>
                <div class="contact-detail">
                    <h3>Email</h3>
                    <p>mail <a href="mailto:info@ifta-ag.de">info@ifta-ag.de</a></p>
                </div>
            </div>
        </div>

        <div class="contact-panel">
            <p class="section-kicker">Contact form</p>
            <h2>Send an enquiry</h2>
            <p>Please complete the fields and describe your request in detail so that we can assist you quickly.</p>

            <?php if ($contactSuccess): ?>
                <p class="contact-form-success">Thank you. Your message has been sent, and our team will be in touch shortly.</p>
            <?php endif; ?>

            <?php if ($contactErrors): ?>
                <div class="contact-form-errors" role="alert">
                    <?php foreach ($contactErrors as $error): ?>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form class="contact-form" method="post" action="<?php echo htmlspecialchars($baseUrl . '/contact.php#contact', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="form" value="contact">
                <div class="visually-hidden" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>
                <div class="contact-form-grid">
                    <div class="contact-field">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($contactOld['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="email">Email <span>*</span></label>
                        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($contactOld['email'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($contactOld['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($contactOld['company'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field contact-field-full">
                        <label for="message">Message <span>*</span></label>
                        <textarea id="message" name="message" rows="6" required><?php echo htmlspecialchars($contactOld['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>
                <label class="contact-captcha-inline">
                    <input type="checkbox" name="captcha" value="1" required>
                    <span>I'm not a robot</span>
                </label>
                <button class="contact-submit" type="submit">Send message</button>
            </form>
        </div>
    </div>
</section>

<section class="contact-map">
    <iframe
        src="https://maps.google.com/maps?q=Neukirchstra%C3%9Fe%2026%2C%2013089%20Berlin&t=&z=15&ie=UTF8&iwloc=&output=embed"
        title="IFTA AG — Neukirchstraße 26, 13089 Berlin"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen>
    </iframe>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
