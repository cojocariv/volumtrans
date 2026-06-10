<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="hero" class="hero-section relative min-h-screen flex items-center overflow-hidden" aria-label="Hero">
    <div class="hero-video-wrap absolute inset-0 z-0" data-parallax="0.3">
        <video class="hero-video w-full h-full object-cover" autoplay muted loop playsinline preload="metadata" poster="<?= e($assets['fleet_image']) ?>">
            <source src="<?= e($assets['hero_video']) ?>" type="video/mp4">
        </video>
        <div class="hero-overlay absolute inset-0"></div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-20">
        <div class="max-w-4xl">
            <div class="reveal-up hero-brand">
                Volum Trans — trans-logistic
            </div>

            <h1 class="reveal-up hero-headline mb-8" style="transition-delay: 0.1s">
                <?= e($t['hero']['headline']) ?>
            </h1>

            <p class="reveal-up text-base sm:text-lg text-white/65 max-w-xl leading-relaxed mb-12" style="transition-delay: 0.2s">
                <?= e($t['hero']['subheadline']) ?>
            </p>

            <div class="reveal-up flex flex-col sm:flex-row gap-4 mb-20" style="transition-delay: 0.3s">
                <a href="#contact" class="btn-primary btn-lg group">
                    <?= e($t['hero']['cta_quote']) ?>
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#contact" class="btn-outline btn-lg"><?= e($t['hero']['cta_contact']) ?></a>
            </div>

            <div class="reveal-up grid grid-cols-1 sm:grid-cols-3 gap-4" style="transition-delay: 0.4s">
                <div class="stat-card">
                    <div class="stat-number font-display font-bold text-3xl sm:text-4xl text-accent" data-counter="27" data-suffix="">27</div>
                    <div class="stat-label text-white/50 text-xs uppercase tracking-wide mt-2"><?= e($t['hero']['stat_countries']) ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number font-display font-bold text-3xl sm:text-4xl text-accent">24/7</div>
                    <div class="stat-label text-white/50 text-xs uppercase tracking-wide mt-2"><?= e($t['hero']['stat_support']) ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number font-display font-bold text-3xl sm:text-4xl text-accent">
                        <svg class="w-7 h-7 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div class="stat-label text-white/50 text-xs uppercase tracking-wide mt-2"><?= e($t['hero']['stat_deliveries']) ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 scroll-indicator" aria-hidden="true">
        <div class="scroll-mouse">
            <div class="scroll-wheel"></div>
        </div>
    </div>
</section>
