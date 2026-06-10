<?php
declare(strict_types=1);

session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once __DIR__ . '/includes/config.php';

$form_errors = $_SESSION['form_errors'] ?? [];
$form_data = $_SESSION['form_data'] ?? [];
$form_success = $_SESSION['form_success'] ?? false;
$form_message = $_SESSION['form_message'] ?? '';

unset($_SESSION['form_errors'], $_SESSION['form_data'], $_SESSION['form_success'], $_SESSION['form_message']);

require_once __DIR__ . '/includes/header.php';

$components = [
    'hero.php',
    'about.php',
    'services.php',
    'fleet.php',
    'why-choose-us.php',
    'video-showcase.php',
    'map.php',
    'gallery.php',
    'contact.php',
];

foreach ($components as $component) {
    require __DIR__ . '/components/' . $component;
}

require_once __DIR__ . '/includes/footer.php';
