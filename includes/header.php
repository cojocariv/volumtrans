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

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e(SITE_URL) ?>">
    <meta property="og:title" content="<?= e($t['meta']['og_title']) ?>">
    <meta property="og:description" content="<?= e($t['meta']['og_description']) ?>">
    <meta property="og:image" content="<?= e($assets['logo']) ?>">
    <meta property="og:locale" content="<?= $current_lang === 'ro' ? 'ro_RO' : 'en_US' ?>">
    <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($t['meta']['og_title']) ?>">
    <meta name="twitter:description" content="<?= e($t['meta']['og_description']) ?>">
    <meta name="twitter:image" content="<?= e($assets['logo']) ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LogisticsService",
        "name": "<?= e(SITE_NAME) ?>",
        "description": "<?= e($t['meta']['description']) ?>",
        "url": "<?= e(SITE_URL) ?>",
        "telephone": "<?= e(SITE_PHONE) ?>",
        "email": "<?= e(SITE_EMAIL) ?>",
        "areaServed": {
            "@type": "Place",
            "name": "European Union"
        },
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Bucharest",
            "addressCountry": "RO"
        },
        "sameAs": []
    }
    </script>
</head>
<body class="font-sans text-primary bg-cream antialiased overflow-x-hidden">

<!-- Page Loader -->
<div id="page-loader" class="page-loader" role="status" aria-live="polite" aria-label="<?= e($t['loader']) ?>">
    <div class="loader-inner">
        <div class="loader-logo">
            <img src="<?= e($assets['logo']) ?>" alt="<?= e(SITE_NAME) ?>" class="site-logo site-logo-loader" width="220" height="80">
        </div>
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
        <p class="loader-text"><?= e($t['loader']) ?>...</p>
    </div>
</div>

<!-- Navigation -->
<header id="site-header" class="site-header fixed top-0 left-0 right-0 z-50 transition-all duration-500">
    <nav class="nav-container" aria-label="Main navigation">
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 lg:h-24">
                <!-- Logo -->
                <a href="#hero" class="flex items-center group" aria-label="<?= e(SITE_NAME) ?> — <?= e($t['nav']['home']) ?>">
                    <img
                        src="<?= e($assets['logo']) ?>"
                        alt="<?= e(SITE_NAME) ?>"
                        class="site-logo site-logo-header group-hover:opacity-90 transition-opacity duration-300"
                        width="180"
                        height="56"
                    >
                </a>

                <!-- Desktop Nav -->
                <div class="hidden lg:flex items-center gap-8">
                    <ul class="flex items-center gap-6" role="list">
                        <?php foreach ($nav_items as $item): ?>
                        <li>
                            <a href="<?= e($item['href']) ?>" class="nav-link text-sm font-medium text-white/90 hover:text-accent transition-colors duration-300 relative">
                                <?= e($item['label']) ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Language Switcher -->
                    <div class="flex items-center gap-2 border-l border-white/15 pl-6" role="group" aria-label="Language">
                        <a href="<?= e(lang_url('ro')) ?>" class="lang-btn <?= $current_lang === 'ro' ? 'lang-btn-active' : '' ?>" lang="ro">RO</a>
                        <a href="<?= e(lang_url('en')) ?>" class="lang-btn <?= $current_lang === 'en' ? 'lang-btn-active' : '' ?>" lang="en">EN</a>
                    </div>

                    <a href="#contact" class="btn-primary text-sm"><?= e($t['nav']['quote']) ?></a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-2 text-white" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle menu">
                    <svg class="w-6 h-6 menu-icon-open" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-6 h-6 menu-icon-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu lg:hidden hidden" aria-hidden="true">
            <div class="px-4 py-6 space-y-4 bg-primary-dark/98 backdrop-blur-xl border-t border-white/10">
                <?php foreach ($nav_items as $item): ?>
                <a href="<?= e($item['href']) ?>" class="mobile-nav-link block text-lg font-medium text-white py-2"><?= e($item['label']) ?></a>
                <?php endforeach; ?>
                <div class="flex items-center gap-2 pt-4 border-t border-white/10">
                    <a href="<?= e(lang_url('ro')) ?>" class="lang-btn <?= $current_lang === 'ro' ? 'lang-btn-active' : '' ?>">RO</a>
                    <a href="<?= e(lang_url('en')) ?>" class="lang-btn <?= $current_lang === 'en' ? 'lang-btn-active' : '' ?>">EN</a>
                </div>
                <a href="#contact" class="btn-primary w-full text-center mt-4"><?= e($t['nav']['quote']) ?></a>
            </div>
        </div>
    </nav>
</header>

<main id="main-content">
