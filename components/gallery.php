<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="gallery" class="section-padding bg-surface-soft border-y border-line" aria-labelledby="gallery-title">
    <div class="max-w-content mx-auto px-6 lg:px-10">
        <div class="text-center max-w-3xl mx-auto mb-16 reveal-up">
            <span class="section-label"><?= e($t['gallery']['label']) ?></span>
            <h2 id="gallery-title" class="section-title mt-4 mb-4"><?= e($t['gallery']['title']) ?></h2>
            <p class="section-subtitle mx-auto"><?= e($t['gallery']['subtitle']) ?></p>
        </div>

        <div class="gallery-masonry reveal-up">
            <?php
            $sizes = ['tall', 'wide', '', ''];
            foreach ($assets['gallery'] as $i => $image):
            ?>
            <button
                type="button"
                class="gallery-item gallery-item-<?= e($sizes[$i] ?? '') ?> group"
                data-gallery-index="<?= $i ?>"
                data-gallery-src="<?= e($image) ?>"
                aria-label="View image <?= $i + 1 ?>"
            >
                <img
                    src="<?= e($image) ?>"
                    alt="<?= e(SITE_NAME) ?> logistics operations — image <?= $i + 1 ?>"
                    class="gallery-image"
                    loading="lazy"
                    width="600"
                    height="400"
                >
                <div class="gallery-overlay">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>
