<?php
/** @var array<string, mixed> $t */
/** @var string $current_lang */
?>
<!DOCTYPE html>
<html lang="<?= e($current_lang) ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= e($t['meta']['title']) ?></title>
    <meta name="description" content="<?= e($t['meta']['description']) ?>">
    <meta name="keywords" content="<?= e($t['meta']['keywords']) ?>">
    <meta name="author" content="<?= e(SITE_NAME) ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= e(SITE_URL) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e(SITE_URL) ?>">
    <meta property="og:title" content="<?= e($t['meta']['og_title']) ?>">
    <meta property="og:description" content="<?= e($t['meta']['og_description']) ?>">
    <meta property="og:image" content="<?= e($assets['logo']) ?>">
    <meta property="og:locale" content="<?= $current_lang === 'ro' ? 'ro_RO' : 'en_US' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"LogisticsService","name":"<?= e(SITE_NAME) ?>","description":"<?= e($t['meta']['description']) ?>","url":"<?= e(SITE_URL) ?>","areaServed":{"@type":"Place","name":"European Union"}}
    </script>
</head>
<body class="font-sans text-primary bg-surface antialiased overflow-x-hidden">

<div id="page-loader" class="page-loader" role="status" aria-live="polite">
    <div class="loader-inner text-center">
        <img src="<?= e($assets['logo']) ?>" alt="<?= e(SITE_NAME) ?>" class="site-logo site-logo-loader mx-auto" width="200" height="64">
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
        <p class="loader-text"><?= e($t['loader']) ?>...</p>
    </div>
</div>

<header id="site-header" class="site-header fixed top-0 left-0 right-0 z-50 transition-all duration-500">
    <nav aria-label="Main navigation">
        <?php
        $nav_items = [
            ['href' => '#about', 'label' => $t['nav']['about']],
            ['href' => '#services', 'label' => $t['nav']['services']],
            ['href' => '#fleet', 'label' => $t['nav']['fleet']],
            ['href' => '#network', 'label' => $t['nav']['network']],
            ['href' => '#gallery', 'label' => $t['nav']['gallery']],
            ['href' => '#contact', 'label' => $t['nav']['contact']],
        ];
        ?>
        <div class="max-w-content mx-auto px-6 lg:px-10">
            <div class="flex items-center justify-between h-16 lg:h-[4.5rem]">
                <a href="#hero" class="flex items-center" aria-label="<?= e(SITE_NAME) ?>">
                    <img src="<?= e($assets['logo']) ?>" alt="<?= e(SITE_NAME) ?>" class="site-logo site-logo-header" width="160" height="48">
                </a>
                <div class="hidden lg:flex items-center gap-8">
                    <ul class="flex items-center gap-7" role="list">
                        <?php foreach ($nav_items as $item): ?>
                        <li><a href="<?= e($item['href']) ?>" class="nav-link"><?= e($item['label']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="flex items-center gap-2 border-l border-line pl-6">
                        <a href="<?= e(lang_url('ro')) ?>" class="lang-btn <?= $current_lang === 'ro' ? 'lang-btn-active' : '' ?>" lang="ro">RO</a>
                        <span class="text-line">|</span>
                        <a href="<?= e(lang_url('en')) ?>" class="lang-btn <?= $current_lang === 'en' ? 'lang-btn-active' : '' ?>" lang="en">EN</a>
                    </div>
                    <a href="#contact" class="btn-primary"><?= e($t['nav']['quote']) ?></a>
                </div>
                <button id="mobile-menu-btn" class="mobile-menu-btn lg:hidden p-2 text-primary" aria-expanded="false" aria-controls="mobile-menu" aria-label="Menu">
                    <svg class="w-6 h-6 menu-icon-open" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg class="w-6 h-6 menu-icon-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="mobile-menu lg:hidden hidden fixed inset-x-0 top-16 z-40" aria-hidden="true">
            <div class="mobile-menu-panel">
                <?php foreach ($nav_items as $item): ?>
                <a href="<?= e($item['href']) ?>" class="mobile-nav-link"><?= e($item['label']) ?></a>
                <?php endforeach; ?>
                <div class="flex gap-3 pt-4 mt-4 border-t border-line">
                    <a href="<?= e(lang_url('ro')) ?>" class="lang-btn <?= $current_lang === 'ro' ? 'lang-btn-active' : '' ?>">RO</a>
                    <a href="<?= e(lang_url('en')) ?>" class="lang-btn <?= $current_lang === 'en' ? 'lang-btn-active' : '' ?>">EN</a>
                </div>
                <a href="#contact" class="btn-primary w-full justify-center mt-6"><?= e($t['nav']['quote']) ?></a>
            </div>
        </div>
    </nav>
</header>

<main id="main-content">
