<?php /** @var array<string, mixed> $t */ ?>
<section class="eu-bar border-y border-line bg-surface" aria-label="European coverage">
    <div class="max-w-content mx-auto px-6 lg:px-10 py-5">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-3 reveal-up">
                <span class="eu-stars animate-pulse-soft" aria-hidden="true">★★★★★</span>
                <p class="text-sm text-muted"><?= e($t['eu']['trust']) ?></p>
            </div>
            <div class="flex flex-wrap gap-2 stagger-children" data-stagger="0.06">
                <?php
                $eu_flags = ['RO', 'DE', 'FR', 'IT', 'ES', 'NL', 'BE', 'AT', 'PL', 'CZ'];
                foreach ($eu_flags as $code):
                ?>
                <span class="eu-chip"><?= e($code) ?></span>
                <?php endforeach; ?>
                <span class="eu-chip eu-chip-more">+17</span>
            </div>
        </div>
    </div>
</section>
