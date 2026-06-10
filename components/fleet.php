<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="fleet" class="section-padding bg-cream overflow-hidden" aria-labelledby="fleet-title">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center mb-20">
            <div class="reveal-left order-2 lg:order-1">
                <span class="section-label"><?= e($t['fleet']['label']) ?></span>
                <h2 id="fleet-title" class="section-title mt-4 mb-4"><?= e($t['fleet']['title']) ?></h2>
                <p class="section-subtitle mb-8"><?= e($t['fleet']['subtitle']) ?></p>

                <ul class="space-y-4" role="list">
                    <?php foreach ($t['fleet']['features'] as $i => $feature): ?>
                    <li class="fleet-feature flex items-center gap-4 reveal-up" style="transition-delay: <?= e((string)($i * 0.1)) ?>s">
                        <span class="fleet-feature-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="font-medium text-primary"><?= e($feature) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="reveal-right order-1 lg:order-2 relative" data-parallax="0.15">
                <div class="overflow-hidden border border-cream-dark">
                    <img
                        src="<?= e($assets['fleet_image']) ?>"
                        alt="Modern freight truck fleet"
                        class="w-full h-[400px] lg:h-[500px] object-cover"
                        loading="lazy"
                        width="800"
                        height="500"
                    >
                </div>
                <div class="absolute -z-10 -bottom-6 -left-6 w-full h-full bg-accent/10"></div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="reveal-up">
            <div class="timeline relative">
                <div class="timeline-line hidden lg:block" aria-hidden="true"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($t['fleet']['timeline'] as $i => $step): ?>
                    <div class="timeline-step reveal-up" style="transition-delay: <?= e((string)($i * 0.12)) ?>s">
                        <div class="timeline-dot">
                            <span class="timeline-number"><?= e($step['step']) ?></span>
                        </div>
                        <h3 class="font-display font-bold text-lg text-primary mb-2 mt-4"><?= e($step['title']) ?></h3>
                        <p class="text-primary/60 text-sm leading-relaxed"><?= e($step['desc']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
