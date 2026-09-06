<?php
$pageTitle = 'Jobs | IFTA AG';
$pageDescription = 'Apply to IFTA AG in Berlin using the career application form.';

$errors = [];
$success = false;
$old = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'position' => '',
    'message' => '',
];

function career_clean($value)
{
    return trim((string) $value);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $key => $unused) {
        $old[$key] = career_clean($_POST[$key] ?? '');
    }

    $honeypot = career_clean($_POST['website'] ?? '');

    if ($old['name'] === '') {
        $errors[] = 'Please enter your name.';
    }
    if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($old['position'] === '') {
        $errors[] = 'Please enter the position you are applying for.';
    }
    if ($old['message'] === '') {
        $errors[] = 'Please enter a short message.';
    }
    if (empty($_POST['captcha'])) {
        $errors[] = 'Please confirm you are not a robot.';
    }

    $fileName = '';
    $fileTmp = '';
    $fileType = '';
    if (!empty($_FILES['cv']['name']) && (int) ($_FILES['cv']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        if ((int) $_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'The CV file could not be uploaded. Please try again.';
        } elseif ((int) $_FILES['cv']['size'] > 15 * 1024 * 1024) {
            $errors[] = 'The CV must be 15 MB or smaller.';
        } else {
            $fileName = basename((string) $_FILES['cv']['name']);
            $fileTmp = (string) $_FILES['cv']['tmp_name'];
            $fileType = (string) ($_FILES['cv']['type'] ?? 'application/octet-stream');
        }
    }

    if ($honeypot !== '') {
        $success = true;
        $old = array_map(static function () {
            return '';
        }, $old);
    } elseif (!$errors) {
        $to = 'bewerbung@ifta-ag.de';
        $subject = 'Career application: ' . $old['name'];
        $body = "A new application was submitted from the IFTA AG Jobs page.\n\n"
            . 'Name: ' . $old['name'] . "\n"
            . 'Email: ' . $old['email'] . "\n"
            . 'Phone: ' . ($old['phone'] !== '' ? $old['phone'] : '(not provided)') . "\n"
            . 'Position: ' . $old['position'] . "\n\n"
            . "Message:\n" . $old['message'] . "\n";

        $fromEmail = filter_var($old['email'], FILTER_SANITIZE_EMAIL);
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
            $success = true;
            $old = array_map(static function () {
                return '';
            }, $old);
        } else {
            $errors[] = 'Your application could not be sent right now. Please email bewerbung@ifta-ag.de.';
        }
    }
}

include __DIR__ . '/header.php';
?>

<section class="career-section">
    <div class="container career-wrap">
        <div class="career-card">
            <p class="section-kicker">Jobs</p>
            <h1>Career application</h1>

            <?php if ($success): ?>
                <p class="contact-form-success">Thank you. Your application has been sent, and our team will be in touch shortly.</p>
            <?php endif; ?>

            <?php if ($errors): ?>
                <div class="contact-form-errors" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form class="career-form" method="post" action="<?php echo htmlspecialchars($baseUrl . '/careers.php', ENT_QUOTES, 'UTF-8'); ?>" enctype="multipart/form-data">
                <div class="visually-hidden" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="career-form-grid">
                    <div class="career-field">
                        <label for="name">Full name <span>*</span></label>
                        <input type="text" id="name" name="name" required placeholder="Your name" value="<?php echo htmlspecialchars($old['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="career-field">
                        <label for="email">Email <span>*</span></label>
                        <input type="email" id="email" name="email" required placeholder="you@example.com" value="<?php echo htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="career-field">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" placeholder="+49 …" value="<?php echo htmlspecialchars($old['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="career-field">
                        <label for="position">Position <span>*</span></label>
                        <input type="text" id="position" name="position" required placeholder="Role you are applying for" value="<?php echo htmlspecialchars($old['position'], ENT_QUOTES, 'UTF-8'); ?>">
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
                        <label for="message">Message <span>*</span></label>
                        <textarea id="message" name="message" rows="6" required placeholder="A short introduction and why you would like to join IFTA AG"><?php echo htmlspecialchars($old['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
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
