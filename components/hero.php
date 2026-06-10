<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="hero" class="hero-split min-h-screen lg:min-h-[92vh] flex flex-col lg:flex-row bg-surface" aria-label="Hero">
    <div class="hero-content flex-1 flex flex-col justify-center px-6 lg:px-10 xl:px-16 py-28 lg:py-0 order-2 lg:order-1">
        <span class="hero-badge reveal-blur"><?= e($t['hero']['badge']) ?></span>
        <h1 class="hero-title reveal-up mt-6"><?= e($t['hero']['headline']) ?></h1>
        <p class="hero-text reveal-up mt-6" style="transition-delay:0.1s"><?= e($t['hero']['subheadline']) ?></p>

        <div class="hero-actions reveal-up mt-10 flex flex-wrap gap-4" style="transition-delay:0.2s">
            <a href="#contact" class="btn-primary"><?= e($t['hero']['cta_quote']) ?></a>
            <a href="#services" class="btn-ghost"><?= e($t['hero']['cta_contact']) ?> →</a>
        </div>

        <div class="hero-stats reveal-up mt-14 grid grid-cols-3 gap-6 border-t border-line pt-8" style="transition-delay:0.3s">
            <div class="stat-minimal">
                <div class="stat-minimal-value" data-counter="27">27</div>
                <div class="stat-minimal-label"><?= e($t['hero']['stat_countries']) ?></div>
            </div>
            <div class="stat-minimal">
                <div class="stat-minimal-value">24/7</div>
                <div class="stat-minimal-label"><?= e($t['hero']['stat_support']) ?></div>
            </div>
            <div class="stat-minimal">
                <div class="stat-minimal-value">EU</div>
                <div class="stat-minimal-label"><?= e($t['hero']['stat_deliveries']) ?></div>
            </div>
        </div>
    </div>

    <div class="hero-media flex-1 relative min-h-[45vh] lg:min-h-full order-1 lg:order-2 overflow-hidden">
        <video
            class="hero-video absolute inset-0 w-full h-full object-cover"
            src="<?= e($assets['hero_video']) ?>"
            autoplay
            muted
            loop
            playsinline
            preload="auto"
            poster="<?= e($assets['fleet_image']) ?>"
        ></video>
        <div class="hero-media-overlay absolute inset-0"></div>
        <div class="hero-media-caption reveal-up absolute bottom-8 left-8 right-8 lg:left-10 lg:right-10">
            <p class="text-white/90 text-sm font-medium"><?= e($t['eu']['badge']) ?></p>
        </div>
    </div>
</section>
