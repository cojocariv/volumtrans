<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="about" class="section-padding bg-cream-light" aria-labelledby="about-title">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Image -->
            <div class="reveal-left relative">
                <div class="about-image-wrap relative overflow-hidden">
                    <img
                        src="<?= e($assets['about_image']) ?>"
                        alt="<?= e(SITE_NAME) ?> — Professional truck driver"
                        class="w-full h-[500px] lg:h-[600px] object-cover"
                        loading="lazy"
                        width="800"
                        height="600"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/40 to-transparent"></div>
                </div>
                <div class="about-badge absolute -bottom-6 -right-6 lg:right-8 p-6 reveal-up" style="transition-delay: 0.3s">
                    <div class="font-display font-bold text-4xl" data-counter="15" data-suffix="+">15+</div>
                    <div class="text-sm text-primary-dark/80 mt-1 uppercase text-xs tracking-wide"><?= e($t['about']['years']) ?></div>
                </div>
            </div>

            <!-- Content -->
            <div class="reveal-right">
                <span class="section-label"><?= e($t['about']['label']) ?></span>
                <h2 id="about-title" class="section-title mt-4 mb-6"><?= e($t['about']['title']) ?></h2>
                <p class="section-subtitle mb-4"><?= e($t['about']['text']) ?></p>
                <p class="section-subtitle mb-10"><?= e($t['about']['text_2']) ?></p>

                <!-- Counters -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="counter-box">
                        <div class="counter-value font-display font-bold text-3xl text-primary" data-counter="15" data-suffix="+">0</div>
                        <div class="counter-label text-xs uppercase tracking-wide text-primary/50 mt-1"><?= e($t['about']['years']) ?></div>
                    </div>
                    <div class="counter-box">
                        <div class="counter-value font-display font-bold text-3xl text-primary" data-counter="12500" data-suffix="+">0</div>
                        <div class="counter-label text-xs uppercase tracking-wide text-primary/50 mt-1"><?= e($t['about']['deliveries']) ?></div>
                    </div>
                    <div class="counter-box">
                        <div class="counter-value font-display font-bold text-3xl text-primary" data-counter="27" data-suffix="">0</div>
                        <div class="counter-label text-xs uppercase tracking-wide text-primary/50 mt-1"><?= e($t['about']['destinations']) ?></div>
                    </div>
                    <div class="counter-box">
                        <div class="counter-value font-display font-bold text-3xl text-primary" data-counter="350" data-suffix="+">0</div>
                        <div class="counter-label text-xs uppercase tracking-wide text-primary/50 mt-1"><?= e($t['about']['clients']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
