<?php
declare(strict_types=1);

const SITE_NAME = 'Volum Trans Logistic';
const SITE_URL = 'https://volumtranslogistic.ro';
const SITE_EMAIL = 'contact@volumtranslogistic.ro';
const SITE_PHONE = '+40 700 000 000';

$available_langs = ['ro', 'en'];
$current_lang = 'ro';

if (isset($_GET['lang']) && in_array($_GET['lang'], $available_langs, true)) {
    $current_lang = $_GET['lang'];
    setcookie('vtl_lang', $current_lang, time() + 86400 * 365, '/');
} elseif (isset($_COOKIE['vtl_lang']) && in_array($_COOKIE['vtl_lang'], $available_langs, true)) {
    $current_lang = $_COOKIE['vtl_lang'];
}

$lang_file = __DIR__ . '/lang/' . $current_lang . '.php';
if (!is_file($lang_file)) {
    $current_lang = 'ro';
    $lang_file = __DIR__ . '/lang/ro.php';
}

/** @var array<string, mixed> $t */
$t = require $lang_file;

$assets = [
    'logo' => 'https://cojocaristorage.blob.core.windows.net/volumtrans/video/Logo%20real.png',
    'hero_video' => 'https://cojocaristorage.blob.core.windows.net/volumtrans/video/1-web.mp4',
    'about_image' => 'https://cojocaristorage.blob.core.windows.net/volumtrans/foto/portrait-middle-aged-bearded-trucker-standing-front-truck-trailer-against-grey-shiny-tarpaulin.jpg',
    'fleet_image' => 'https://cojocaristorage.blob.core.windows.net/volumtrans/foto/large-white-freight-truck-driving-winter-highway-through-snowy-countryside-transport-logistics.jpg',
    'video_truck' => 'https://cojocaristorage.blob.core.windows.net/volumtrans/video/0_Truck_Semi_trailer-web.mp4',
    'video_business' => 'https://cojocaristorage.blob.core.windows.net/volumtrans/video/1164890_Man_Business_3840x2160-web.mp4',
    'gallery' => [
        'https://cojocaristorage.blob.core.windows.net/volumtrans/foto/large-white-freight-truck-driving-winter-highway-through-snowy-countryside-transport-logistics.jpg',
        'https://cojocaristorage.blob.core.windows.net/volumtrans/foto/truck-driver-inspecting-truck-long-vehicle-before-driving.jpg',
        'https://cojocaristorage.blob.core.windows.net/volumtrans/foto/truck-forest-road-moving-lorry-freight-transport-scene.jpg',
        'https://cojocaristorage.blob.core.windows.net/volumtrans/foto/portrait-middle-aged-bearded-trucker-standing-front-truck-trailer-against-grey-shiny-tarpaulin.jpg',
    ],
];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function lang_url(string $lang): string
{
    $uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?: '/';
    return $uri . '?lang=' . $lang;
}
