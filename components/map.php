<?php /** @var array<string, mixed> $t */ ?>
<section id="network" class="section-padding bg-cream-light overflow-hidden" aria-labelledby="network-title">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12 reveal-up">
            <span class="section-label"><?= e($t['map']['label']) ?></span>
            <h2 id="network-title" class="section-title mt-4 mb-4"><?= e($t['map']['title']) ?></h2>
            <p class="section-subtitle"><?= e($t['map']['subtitle']) ?></p>
        </div>

        <div class="reveal-up">
            <div class="europe-map-container relative p-4 sm:p-8">
                <svg id="europe-map" viewBox="0 0 800 600" class="w-full h-auto" role="img" aria-label="European logistics network map">
                    <defs>
                        <linearGradient id="route-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#1A2B44" stop-opacity="0.3"/>
                            <stop offset="50%" stop-color="#F59E0B" stop-opacity="0.8"/>
                            <stop offset="100%" stop-color="#1A2B44" stop-opacity="0.3"/>
                        </linearGradient>
                        <filter id="glow">
                            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                            <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
                        </filter>
                    </defs>

                    <!-- Simplified Europe outline -->
                    <path class="map-land" d="M120,180 L200,120 L280,100 L360,90 L420,100 L480,80 L540,90 L600,110 L650,140 L680,180 L700,220 L720,280 L710,340 L680,400 L640,450 L580,480 L520,500 L460,510 L400,500 L340,490 L280,470 L220,440 L180,400 L150,350 L130,300 L120,250 Z" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="1"/>

                    <!-- Animated routes from Romania (hub) -->
                    <g id="map-routes" class="map-routes">
                        <path class="route-line" data-route="de" d="M480,320 Q420,280 380,240" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="fr" d="M480,320 Q400,350 340,380" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="it" d="M480,320 Q460,380 440,420" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="es" d="M480,320 Q380,400 300,430" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="nl" d="M480,320 Q440,260 400,220" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="be" d="M480,320 Q430,270 390,250" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="at" d="M480,320 Q470,300 460,290" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="pl" d="M480,320 Q500,280 520,240" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                        <path class="route-line" data-route="cz" d="M480,320 Q490,290 500,270" fill="none" stroke="url(#route-gradient)" stroke-width="2" stroke-dasharray="8 4"/>
                    </g>

                    <!-- Country markers -->
                    <?php
                    $countries = [
                        ['id' => 'ro', 'cx' => 480, 'cy' => 320, 'label' => 'RO', 'hub' => true],
                        ['id' => 'de', 'cx' => 380, 'cy' => 240, 'label' => 'DE', 'hub' => false],
                        ['id' => 'fr', 'cx' => 340, 'cy' => 380, 'label' => 'FR', 'hub' => false],
                        ['id' => 'it', 'cx' => 440, 'cy' => 420, 'label' => 'IT', 'hub' => false],
                        ['id' => 'es', 'cx' => 300, 'cy' => 430, 'label' => 'ES', 'hub' => false],
                        ['id' => 'nl', 'cx' => 400, 'cy' => 220, 'label' => 'NL', 'hub' => false],
                        ['id' => 'be', 'cx' => 390, 'cy' => 250, 'label' => 'BE', 'hub' => false],
                        ['id' => 'at', 'cx' => 460, 'cy' => 290, 'label' => 'AT', 'hub' => false],
                        ['id' => 'pl', 'cx' => 520, 'cy' => 240, 'label' => 'PL', 'hub' => false],
                        ['id' => 'cz', 'cx' => 500, 'cy' => 270, 'label' => 'CZ', 'hub' => false],
                    ];
                    foreach ($countries as $country):
                    ?>
                    <g class="map-marker <?= $country['hub'] ? 'map-marker-hub' : '' ?>" data-country="<?= e($country['id']) ?>" tabindex="0" role="button" aria-label="<?= e(strtoupper($country['id'])) ?>">
                        <?php if ($country['hub']): ?>
                        <circle cx="<?= $country['cx'] ?>" cy="<?= $country['cy'] ?>" r="24" class="map-pulse" fill="#F59E0B" opacity="0.2"/>
                        <circle cx="<?= $country['cx'] ?>" cy="<?= $country['cy'] ?>" r="16" class="map-pulse-delay" fill="#F59E0B" opacity="0.15"/>
                        <?php endif; ?>
                        <circle cx="<?= $country['cx'] ?>" cy="<?= $country['cy'] ?>" r="<?= $country['hub'] ? '10' : '7' ?>" class="<?= $country['hub'] ? 'fill-accent' : 'fill-primary' ?>" filter="url(#glow)"/>
                        <text x="<?= $country['cx'] ?>" y="<?= $country['cy'] + 28 ?>" text-anchor="middle" class="map-label fill-slate-600 text-xs font-semibold" font-size="11"><?= e($country['label']) ?></text>
                    </g>
                    <?php endforeach; ?>

                    <!-- Moving dots on routes -->
                    <circle class="route-dot" r="4" fill="#F59E0B" filter="url(#glow)">
                        <animateMotion dur="4s" repeatCount="indefinite" path="M480,320 Q420,280 380,240"/>
                    </circle>
                    <circle class="route-dot" r="4" fill="#F59E0B" filter="url(#glow)">
                        <animateMotion dur="5s" repeatCount="indefinite" path="M480,320 Q400,350 340,380"/>
                    </circle>
                    <circle class="route-dot" r="4" fill="#F59E0B" filter="url(#glow)">
                        <animateMotion dur="4.5s" repeatCount="indefinite" path="M480,320 Q460,380 440,420"/>
                    </circle>
                </svg>

                <div class="map-legend mt-6 flex flex-wrap items-center justify-center gap-6 text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-accent"></span>
                        <span class="text-primary/60 text-sm"><?= e($t['map']['romania']) ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-0.5 bg-gradient-to-r from-primary to-accent"></span>
                        <span class="text-primary/60 text-sm"><?= e($t['map']['routes']) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
