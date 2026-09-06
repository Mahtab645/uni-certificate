<?php
$pageTitle = 'Career and contact | IFTA AG';
$pageDescription = 'Contact IFTA AG in Berlin or apply for a role. Neukirchstraße 26, 13089 Berlin. Phone +49 30 47 88 03 0, email info@ifta-ag.de.';

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

$careerErrors = [];
$careerSuccess = false;
$careerOld = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'position' => '',
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $formType === 'career') {
    foreach ($careerOld as $key => $unused) {
        $careerOld[$key] = page_clean($_POST[$key] ?? '');
    }

    $honeypot = page_clean($_POST['website'] ?? '');

    if ($careerOld['name'] === '') {
        $careerErrors[] = 'Please enter your name.';
    }
    if ($careerOld['email'] === '' || !filter_var($careerOld['email'], FILTER_VALIDATE_EMAIL)) {
        $careerErrors[] = 'Please enter a valid email address.';
    }
    if ($careerOld['position'] === '') {
        $careerErrors[] = 'Please enter the position you are applying for.';
    }
    if ($careerOld['message'] === '') {
        $careerErrors[] = 'Please enter a short message.';
    }
    if (empty($_POST['captcha'])) {
        $careerErrors[] = 'Please confirm you are not a robot.';
    }

    $fileName = '';
    $fileTmp = '';
    $fileType = '';
    if (!empty($_FILES['cv']['name']) && (int) ($_FILES['cv']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        if ((int) $_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
            $careerErrors[] = 'The CV file could not be uploaded. Please try again.';
        } elseif ((int) $_FILES['cv']['size'] > 15 * 1024 * 1024) {
            $careerErrors[] = 'The CV must be 15 MB or smaller.';
        } else {
            $fileName = basename((string) $_FILES['cv']['name']);
            $fileTmp = (string) $_FILES['cv']['tmp_name'];
            $fileType = (string) ($_FILES['cv']['type'] ?? 'application/octet-stream');
        }
    }

    if ($honeypot !== '') {
        $careerSuccess = true;
        $careerOld = array_map(static function () {
            return '';
        }, $careerOld);
    } elseif (!$careerErrors) {
        $to = 'bewerbung@ifta-ag.de';
        $subject = 'Career application: ' . $careerOld['name'];
        $body = "A new application was submitted from the IFTA AG Career and contact page.\n\n"
            . 'Name: ' . $careerOld['name'] . "\n"
            . 'Email: ' . $careerOld['email'] . "\n"
            . 'Phone: ' . ($careerOld['phone'] !== '' ? $careerOld['phone'] : '(not provided)') . "\n"
            . 'Position: ' . $careerOld['position'] . "\n\n"
            . "Message:\n" . $careerOld['message'] . "\n";

        $fromEmail = filter_var($careerOld['email'], FILTER_SANITIZE_EMAIL);
        $encodedName = '=?UTF-8?B?' . base64_encode($fileName) . '?=';
        $headers = [
            'From: IFTA AG Careers <noreply@ifta-ag.de>',
            'Reply-To: ' . $fromEmail,
            'X-Mailer: PHP/' . PHP_VERSION,
        ];

        $sent = false;
        if ($fileTmp !== '' && is_readable($fileTmp)) {
            $boundary = 'bnd_' . md5(uniqid((string) mt_rand(), true));
            $fileData = chunk_split(base64_encode((string) file_get_contents($fileTmp)));
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: multipart/mixed; boundary="' . $boundary . '"';
            $message = '--' . $boundary . "\r\n"
                . "Content-Type: text/plain; charset=UTF-8\r\n"
                . "Content-Transfer-Encoding: 8bit\r\n\r\n"
                . $body . "\r\n"
                . '--' . $boundary . "\r\n"
                . 'Content-Type: ' . $fileType . '; name="' . $encodedName . '"' . "\r\n"
                . "Content-Transfer-Encoding: base64\r\n"
                . 'Content-Disposition: attachment; filename="' . $encodedName . '"' . "\r\n\r\n"
                . $fileData . "\r\n"
                . '--' . $boundary . "--\r\n";
            $sent = @mail($to, $subject, $message, implode("\r\n", $headers));
        } else {
            $headers[] = 'Content-Type: text/plain; charset=UTF-8';
            $sent = @mail($to, $subject, $body, implode("\r\n", $headers));
        }

        if ($sent) {
            $careerSuccess = true;
            $careerOld = array_map(static function () {
                return '';
            }, $careerOld);
        } else {
            $careerErrors[] = 'Your application could not be sent right now. Please email bewerbung@ifta-ag.de.';
        }
    }
}

include __DIR__ . '/header.php';
?>

<section class="inner-hero">
    <div class="container">
        <p class="hero-kicker">Career and contact</p>
        <h1>Get in touch with us.</h1>
        <p>Your questions and wishes are important to us. Reach us by phone, email or the form. Applications are welcome below.</p>
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

<section class="inner-section" id="career">
    <div class="container career-contact-grid">
        <div>
            <p class="section-kicker">Careers</p>
            <h2>Work with purpose</h2>
            <p>At IFTA AG you will find meaningful work with a long-term perspective — in auditing, administration and internships across certification and sustainability.</p>
            <p>Please complete the application form and attach your CV if available. Our team will be in touch shortly.</p>
        </div>
        <div class="career-card">
            <h2>Career application</h2>

            <?php if ($careerSuccess): ?>
                <p class="contact-form-success">Thank you. Your application has been sent, and our team will be in touch shortly.</p>
            <?php endif; ?>

            <?php if ($careerErrors): ?>
                <div class="contact-form-errors" role="alert">
                    <?php foreach ($careerErrors as $error): ?>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form class="career-form" method="post" action="<?php echo htmlspecialchars($baseUrl . '/contact.php#career', ENT_QUOTES, 'UTF-8'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="form" value="career">
                <div class="visually-hidden" aria-hidden="true">
                    <label for="career-website">Website</label>
                    <input type="text" id="career-website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="career-form-grid">
                    <div class="career-field">
                        <label for="career-name">Full name <span>*</span></label>
                        <input type="text" id="career-name" name="name" required placeholder="Your name" value="<?php echo htmlspecialchars($careerOld['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="career-field">
                        <label for="career-email">Email <span>*</span></label>
                        <input type="email" id="career-email" name="email" required placeholder="you@example.com" value="<?php echo htmlspecialchars($careerOld['email'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="career-field">
                        <label for="career-phone">Phone</label>
                        <input type="tel" id="career-phone" name="phone" placeholder="+49 …" value="<?php echo htmlspecialchars($careerOld['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="career-field">
                        <label for="position">Position <span>*</span></label>
                        <input type="text" id="position" name="position" required placeholder="Role you are applying for" value="<?php echo htmlspecialchars($careerOld['position'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="career-field career-field-full">
                        <span class="career-label">CV / résumé</span>
                        <label class="career-file" for="cv">
                            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx,.odt">
                            <span class="career-file-box">
                                <strong id="cvTitle">Choose a file</strong>
                                <em id="cvHint">PDF, Word or ODT · max 15 MB</em>
                            </span>
                        </label>
                    </div>
                    <div class="career-field career-field-full">
                        <label for="career-message">Message <span>*</span></label>
                        <textarea id="career-message" name="message" rows="6" required placeholder="A short introduction and why you would like to join IFTA AG"><?php echo htmlspecialchars($careerOld['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>

                <div class="career-form-footer">
                    <label class="contact-captcha-inline">
                        <input type="checkbox" name="captcha" value="1" required>
                        <span>I'm not a robot</span>
                    </label>
                    <button class="career-submit" type="submit">Submit application</button>
                </div>
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
