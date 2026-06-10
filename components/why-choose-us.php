<?php
/** @var array<string, mixed> $t */

$why_icons = [
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
];
?>
<section id="why-us" class="section-padding why-section relative overflow-hidden" aria-labelledby="why-title">
    <div class="why-bg-pattern absolute inset-0 opacity-5" aria-hidden="true"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 reveal-up">
            <span class="section-label text-accent"><?= e($t['why']['label']) ?></span>
            <h2 id="why-title" class="section-title text-white mt-4 mb-4"><?= e($t['why']['title']) ?></h2>
            <p class="text-white/55 text-base lg:text-lg max-w-2xl mx-auto"><?= e($t['why']['subtitle']) ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <?php foreach ($t['why']['items'] as $i => $item): ?>
            <article class="why-card reveal-up group" style="transition-delay: <?= e((string)($i * 0.08)) ?>s">
                <div class="why-icon-wrap group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <?= $why_icons[$i] ?? $why_icons[0] ?>
                    </svg>
                </div>
                <h3 class="font-display font-bold text-lg text-white mb-3"><?= e($item['title']) ?></h3>
                <p class="text-white/50 text-sm leading-relaxed"><?= e($item['desc']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
