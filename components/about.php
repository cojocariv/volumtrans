<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="about" class="section-padding bg-surface" aria-labelledby="about-title">
    <div class="max-w-content mx-auto px-6 lg:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="reveal-left relative">
                <div class="about-image-wrap relative overflow-hidden rounded-2xl border border-line">
                    <img
                        src="<?= e($assets['about_image']) ?>"
                        alt="<?= e(SITE_NAME) ?> — Professional truck driver"
                        class="w-full h-[480px] lg:h-[560px] object-cover"
                        loading="lazy"
                        width="800"
                        height="600"
                    >
                </div>
                <div class="about-badge absolute -bottom-5 right-6 lg:right-8 reveal-scale z-10 animate-float" style="transition-delay:0.3s">
                    <div class="font-semibold text-3xl text-primary" data-counter="15" data-suffix="+">15+</div>
                    <div class="text-xs text-muted mt-1"><?= e($t['about']['years']) ?></div>
                </div>
            </div>

            <div class="reveal-right">
                <span class="section-label"><?= e($t['about']['label']) ?></span>
                <h2 id="about-title" class="section-title mt-4 mb-6"><?= e($t['about']['title']) ?></h2>
                <p class="section-subtitle mb-4"><?= e($t['about']['text']) ?></p>
                <p class="section-subtitle mb-10"><?= e($t['about']['text_2']) ?></p>

                <div class="grid grid-cols-2 gap-4 stagger-children" data-stagger="0.08">
                    <div class="counter-box">
                        <div class="counter-value" data-counter="15" data-suffix="+">0</div>
                        <div class="counter-label"><?= e($t['about']['years']) ?></div>
                    </div>
                    <div class="counter-box">
                        <div class="counter-value" data-counter="12500" data-suffix="+">0</div>
                        <div class="counter-label"><?= e($t['about']['deliveries']) ?></div>
                    </div>
                    <div class="counter-box">
                        <div class="counter-value" data-counter="27">0</div>
                        <div class="counter-label"><?= e($t['about']['destinations']) ?></div>
                    </div>
                    <div class="counter-box">
                        <div class="counter-value" data-counter="350" data-suffix="+">0</div>
                        <div class="counter-label"><?= e($t['about']['clients']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
