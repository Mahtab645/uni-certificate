<?php
$pageTitle = 'Contact | IFTA AG';
$pageDescription = 'Contact IFTA AG in Berlin: Neukirchstraße 26, 13089 Berlin. Phone +49 30 47 88 03 0, fax +49 30 47 88 03 20, email info@ifta-ag.de.';

$errors = [];
$success = false;
$old = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'company' => '',
    'country' => '',
    'interest' => '',
    'message' => '',
];

function contact_clean($value)
{
    return trim((string) $value);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $key => $unused) {
        $old[$key] = contact_clean($_POST[$key] ?? '');
    }

    $honeypot = contact_clean($_POST['website'] ?? '');

    if ($old['name'] === '') {
        $errors[] = 'Please enter your name.';
    }
    if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($old['message'] === '') {
        $errors[] = 'Please enter a message.';
    }
    if (empty($_POST['captcha'])) {
        $errors[] = 'Please confirm you are not a robot.';
    }

    if ($honeypot !== '') {
        $success = true;
        $old = array_map(static function () {
            return '';
        }, $old);
    } elseif (!$errors) {
        $to = 'info@ifta-ag.de';
        $subject = 'Website contact: ' . $old['name'];
        $body = "A new message was submitted from the IFTA AG website.\n\n"
            . 'Name: ' . $old['name'] . "\n"
            . 'Email: ' . $old['email'] . "\n"
            . 'Phone: ' . ($old['phone'] !== '' ? $old['phone'] : '(not provided)') . "\n"
            . 'Company: ' . ($old['company'] !== '' ? $old['company'] : '(not provided)') . "\n"
            . 'Country: ' . ($old['country'] !== '' ? $old['country'] : '(not provided)') . "\n"
            . 'Topic: ' . ($old['interest'] !== '' ? $old['interest'] : '(not provided)') . "\n\n"
            . "Message:\n" . $old['message'] . "\n";

        $fromEmail = filter_var($old['email'], FILTER_SANITIZE_EMAIL);
        $headers = [
            'From: IFTA AG Website <noreply@ifta-ag.de>',
            'Reply-To: ' . $fromEmail,
            'Content-Type: text/plain; charset=UTF-8',
            'X-Mailer: PHP/' . PHP_VERSION,
        ];

        $sent = @mail($to, $subject, $body, implode("\r\n", $headers));
        if ($sent) {
            $success = true;
            $old = array_map(static function () {
                return '';
            }, $old);
        } else {
            $errors[] = 'Your message could not be sent right now. Please call us or email info@ifta-ag.de.';
        }
    }
}

include __DIR__ . '/header.php';
?>

<section class="inner-hero about-page-hero">
    <div class="container">
        <p class="hero-kicker">Contact</p>
        <h1>We look forward<br>to hearing from you.</h1>
        <p>Reach IFTA AG in Berlin by phone, fax or email — or send a message using the form.</p>
    </div>
</section>

<section class="inner-section">
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
            <?php if ($success): ?>
                <p class="contact-form-success">Thank you. Your message has been sent, and our team will be in touch shortly.</p>
            <?php endif; ?>

            <?php if ($errors): ?>
                <div class="contact-form-errors" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form class="contact-form" method="post" action="<?php echo htmlspecialchars($baseUrl . '/contact.php', ENT_QUOTES, 'UTF-8'); ?>">
                <div class="visually-hidden" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>
                <div class="contact-form-grid">
                    <div class="contact-field">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($old['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="email">Email <span>*</span></label>
                        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($old['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($old['company'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($old['country'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field">
                        <label for="interest">Topic</label>
                        <input type="text" id="interest" name="interest" value="<?php echo htmlspecialchars($old['interest'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="contact-field contact-field-full">
                        <label for="message">Message <span>*</span></label>
                        <textarea id="message" name="message" rows="6" required><?php echo htmlspecialchars($old['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
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
