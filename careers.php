<?php
$pageTitle = 'Career | IFTA AG';
$pageDescription = 'Apply for a role at IFTA AG in Berlin. Auditing, administration and internships in certification and sustainability.';

function career_clean($value)
{
    return trim((string) $value);
}

$careerErrors = [];
$careerSuccess = false;
$careerOld = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'position' => '',
    'message' => '',
];

$formType = career_clean($_POST['form'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $formType === 'career') {
    foreach ($careerOld as $key => $unused) {
        $careerOld[$key] = career_clean($_POST[$key] ?? '');
    }

    $honeypot = career_clean($_POST['website'] ?? '');

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
        $body = "A new application was submitted from the IFTA AG Career page.\n\n"
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
    <img class="hero-media" src="<?php echo $baseUrl; ?>/images/hero-career.jpg" alt="Careers at IFTA AG">
    <div class="hero-overlay"></div>
    <div class="container">
        <p class="hero-kicker">Career</p>
        <h1>Work with purpose.</h1>
        <p>Join IFTA AG in Berlin for meaningful work with a long-term perspective — in auditing, administration and internships.</p>
    </div>
</section>

<section class="inner-section" id="career">
    <div class="container career-contact-grid">
        <div>
            <p class="section-kicker">Careers</p>
            <h2>Open applications</h2>
            <p>At IFTA AG you will find work that supports independent certification of management systems, products and processes — nationally and internationally.</p>
            <p>We welcome applications for auditing, administration and internships. Please complete the form and attach your CV if available. Our team will be in touch shortly.</p>
            <div class="contact-details" style="margin-top:28px;">
                <div class="contact-detail">
                    <h3>Applications</h3>
                    <p><a href="mailto:bewerbung@ifta-ag.de">bewerbung@ifta-ag.de</a></p>
                </div>
                <div class="contact-detail">
                    <h3>Office</h3>
                    <p>Neukirchstraße 26<br>13089 Berlin</p>
                </div>
            </div>
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

            <form class="career-form" method="post" action="<?php echo htmlspecialchars($baseUrl . '/careers.php#career', ENT_QUOTES, 'UTF-8'); ?>" enctype="multipart/form-data">
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

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
