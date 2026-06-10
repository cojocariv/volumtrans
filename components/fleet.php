<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="fleet" class="section-padding bg-surface overflow-hidden" aria-labelledby="fleet-title">
    <div class="max-w-content mx-auto px-6 lg:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center mb-20">
            <div class="reveal-left order-2 lg:order-1">
                <span class="section-label"><?= e($t['fleet']['label']) ?></span>
                <h2 id="fleet-title" class="section-title mt-4 mb-4"><?= e($t['fleet']['title']) ?></h2>
                <p class="section-subtitle mb-8"><?= e($t['fleet']['subtitle']) ?></p>

                <ul class="space-y-0" role="list">
                    <?php foreach ($t['fleet']['features'] as $i => $feature): ?>
                    <li class="feature-item reveal-up" style="transition-delay: <?= e((string)($i * 0.1)) ?>s">
                        <span class="feature-dot" aria-hidden="true"></span>
                        <span><?= e($feature) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="reveal-right order-1 lg:order-2 relative" data-parallax="0.12">
                <div class="overflow-hidden rounded-2xl border border-line">
                    <img
                        src="<?= e($assets['fleet_image']) ?>"
                        alt="Modern freight truck fleet"
                        class="w-full h-[400px] lg:h-[480px] object-cover"
                        loading="lazy"
                        width="800"
                        height="500"
                    >
                </div>
            </div>
        </div>

        <div class="reveal-up">
            <div class="timeline relative">
                <div class="timeline-line hidden lg:block" aria-hidden="true"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($t['fleet']['timeline'] as $i => $step): ?>
                    <div class="timeline-step reveal-scale text-center lg:text-left" style="transition-delay: <?= e((string)($i * 0.12)) ?>s">
                        <div class="timeline-dot mx-auto lg:mx-0">
                            <span class="timeline-number"><?= e($step['step']) ?></span>
                        </div>
                        <h3 class="font-semibold text-lg text-primary mb-2 mt-4"><?= e($step['title']) ?></h3>
                        <p class="text-muted text-sm leading-relaxed"><?= e($step['desc']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
