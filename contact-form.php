<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/includes/config.php';

if (isset($_POST['lang']) && in_array($_POST['lang'], $available_langs, true)) {
    $current_lang = $_POST['lang'];
    $t = require __DIR__ . '/lang/' . $current_lang . '.php';
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

$errors = [];
$data = [
    'name' => trim($_POST['name'] ?? ''),
    'company' => trim($_POST['company'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'phone' => trim($_POST['phone'] ?? ''),
    'cargo_type' => trim($_POST['cargo_type'] ?? ''),
    'origin' => trim($_POST['origin'] ?? ''),
    'destination' => trim($_POST['destination'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
];

// Honeypot spam protection
if (!empty($_POST['website'])) {
    $errors['_general'] = $t['form']['spam'];
}

// CSRF validation
$csrf = $_POST['csrf_token'] ?? '';
if (empty($errors) && (!hash_equals($_SESSION['csrf_token'] ?? '', $csrf))) {
    $errors['_general'] = $t['form']['spam'];
}

// Server-side validation
if (empty($errors)) {
    if ($data['name'] === '') {
        $errors['name'] = $t['form']['required'];
    }

    if ($data['email'] === '') {
        $errors['email'] = $t['form']['required'];
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = $t['form']['invalid_email'];
    }

    if ($data['phone'] === '') {
        $errors['phone'] = $t['form']['required'];
    } elseif (!preg_match('/^[+\d\s\-().]{7,20}$/', $data['phone'])) {
        $errors['phone'] = $t['form']['invalid_phone'];
    }
}

if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_data'] = $data;
    header('Location: index.php?lang=' . urlencode($current_lang) . '#contact');
    exit;
}

// Process submission — send email notification
$subject = 'New Quote Request — ' . SITE_NAME;
$body = "New contact form submission\n\n"
    . "Name: {$data['name']}\n"
    . "Company: {$data['company']}\n"
    . "Email: {$data['email']}\n"
    . "Phone: {$data['phone']}\n"
    . "Cargo Type: {$data['cargo_type']}\n"
    . "Origin: {$data['origin']}\n"
    . "Destination: {$data['destination']}\n"
    . "Message:\n{$data['message']}\n"
    . "\nSubmitted: " . date('Y-m-d H:i:s') . "\n"
    . "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

$headers = [
    'From: ' . SITE_NAME . ' <noreply@volumtranslogistic.ro>',
    'Reply-To: ' . $data['email'],
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . PHP_VERSION,
];

@mail(SITE_EMAIL, $subject, $body, implode("\r\n", $headers));

// Log submission to file as backup
$log_dir = __DIR__ . '/storage';
if (!is_dir($log_dir)) {
    @mkdir($log_dir, 0755, true);
}
$log_entry = json_encode([
    'timestamp' => date('c'),
    'data' => $data,
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
]) . "\n";
@file_put_contents($log_dir . '/submissions.log', $log_entry, FILE_APPEND | LOCK_EX);

$_SESSION['form_success'] = true;
$_SESSION['form_message'] = $t['form']['success'];

// Regenerate CSRF token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

header('Location: index.php?lang=' . urlencode($current_lang) . '#contact');
exit;
