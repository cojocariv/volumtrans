<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="videos" class="section-padding bg-surface" aria-labelledby="videos-title">
    <div class="max-w-content mx-auto px-6 lg:px-10">
        <div class="text-center max-w-3xl mx-auto mb-16 reveal-up">
            <span class="section-label"><?= e($t['videos']['label']) ?></span>
            <h2 id="videos-title" class="section-title mt-4 mb-4"><?= e($t['videos']['title']) ?></h2>
            <p class="section-subtitle mx-auto"><?= e($t['videos']['subtitle']) ?></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <article class="video-card reveal-left group">
                <div class="video-card-inner">
                    <video class="video-card-media" muted loop playsinline preload="metadata" data-video-hover poster="<?= e($assets['fleet_image']) ?>">
                        <source src="<?= e($assets['video_truck']) ?>" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/60 via-transparent to-transparent flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <h3 class="font-semibold text-xl text-white mb-2"><?= e($t['videos']['truck_title']) ?></h3>
                        <p class="text-white/80 text-sm"><?= e($t['videos']['truck_desc']) ?></p>
                    </div>
                </div>
            </article>

            <article class="video-card reveal-right group">
                <div class="video-card-inner">
                    <video class="video-card-media" muted loop playsinline preload="metadata" data-video-hover poster="<?= e($assets['about_image']) ?>">
                        <source src="<?= e($assets['video_business']) ?>" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/60 via-transparent to-transparent flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <h3 class="font-semibold text-xl text-white mb-2"><?= e($t['videos']['business_title']) ?></h3>
                        <p class="text-white/80 text-sm"><?= e($t['videos']['business_desc']) ?></p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
