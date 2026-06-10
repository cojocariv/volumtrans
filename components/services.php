<?php
/** @var array<string, mixed> $t */

$service_icons = [
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>',
    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>',
];
?>
<section id="services" class="section-padding bg-surface-soft border-y border-line" aria-labelledby="services-title">
    <div class="max-w-content mx-auto px-6 lg:px-10">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16 reveal-up">
            <div class="max-w-2xl">
                <span class="section-label"><?= e($t['services']['label']) ?></span>
                <h2 id="services-title" class="section-title mt-2"><?= e($t['services']['title']) ?></h2>
            </div>
            <p class="section-subtitle max-w-md lg:text-right"><?= e($t['services']['subtitle']) ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($t['services']['items'] as $i => $service): ?>
            <article class="service-card reveal-up group" style="transition-delay: <?= e((string)($i * 0.08)) ?>s">
                <div class="service-card-inner">
                    <span class="service-number" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                    <div class="service-icon-wrap">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <?= $service_icons[$i] ?? $service_icons[0] ?>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-primary mb-3"><?= e($service['title']) ?></h3>
                    <p class="text-muted text-sm leading-relaxed mb-6 flex-grow"><?= e($service['desc']) ?></p>
                    <a href="#contact" class="service-cta group-hover:gap-3 transition-all">
                        <?= e($t['services']['cta']) ?> →
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
