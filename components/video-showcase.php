<?php /** @var array<string, mixed> $t */ /** @var array<string, mixed> $assets */ ?>
<section id="videos" class="section-padding bg-cream-light" aria-labelledby="videos-title">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 reveal-up">
            <span class="section-label"><?= e($t['videos']['label']) ?></span>
            <h2 id="videos-title" class="section-title mt-4 mb-4"><?= e($t['videos']['title']) ?></h2>
            <p class="section-subtitle"><?= e($t['videos']['subtitle']) ?></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Video Card 1 -->
            <article class="video-card reveal-left group">
                <div class="video-card-inner relative overflow-hidden aspect-video">
                    <video class="video-card-media w-full h-full object-cover" muted loop playsinline preload="metadata" data-video-hover>
                        <source src="<?= e($assets['video_truck']) ?>" type="video/mp4">
                    </video>
                    <div class="video-card-overlay absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent flex flex-col justify-end p-8">
                        <div class="video-play-btn mb-4" aria-hidden="true">
                            <svg class="w-12 h-12 text-white/80 group-hover:text-accent group-hover:scale-110 transition-all" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <h3 class="font-display font-semibold text-2xl text-white mb-2"><?= e($t['videos']['truck_title']) ?></h3>
                        <p class="text-white/70 text-sm"><?= e($t['videos']['truck_desc']) ?></p>
                    </div>
                </div>
            </article>

            <!-- Video Card 2 -->
            <article class="video-card reveal-right group">
                <div class="video-card-inner relative overflow-hidden aspect-video">
                    <video class="video-card-media w-full h-full object-cover" muted loop playsinline preload="metadata" data-video-hover>
                        <source src="<?= e($assets['video_business']) ?>" type="video/mp4">
                    </video>
                    <div class="video-card-overlay absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent flex flex-col justify-end p-8">
                        <div class="video-play-btn mb-4" aria-hidden="true">
                            <svg class="w-12 h-12 text-white/80 group-hover:text-accent group-hover:scale-110 transition-all" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <h3 class="font-display font-semibold text-2xl text-white mb-2"><?= e($t['videos']['business_title']) ?></h3>
                        <p class="text-white/70 text-sm"><?= e($t['videos']['business_desc']) ?></p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
