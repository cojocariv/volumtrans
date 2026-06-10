<?php
/** @var array<string, mixed> $t */

$form_errors = $form_errors ?? [];
$form_data = $form_data ?? [];
$form_success = $form_success ?? false;
$form_message = $form_message ?? '';
?>
<section id="contact" class="contact-section section-padding bg-surface-soft border-t border-line" aria-labelledby="contact-title">
    <div class="max-w-content mx-auto px-6 lg:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <div class="reveal-left">
                <span class="section-label"><?= e($t['contact']['label']) ?></span>
                <h2 id="contact-title" class="section-title mt-4 mb-4"><?= e($t['contact']['title']) ?></h2>
                <p class="section-subtitle mb-10"><?= e($t['contact']['subtitle']) ?></p>

                <div class="space-y-0">
                    <h3 class="text-xs font-medium uppercase tracking-widest text-muted mb-4"><?= e($t['contact']['info_title']) ?></h3>

                    <div class="contact-info-item flex gap-4">
                        <div class="contact-info-icon shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="font-medium text-primary"><?= e($t['contact']['address']) ?></p>
                            <p class="text-sm text-muted mt-1"><?= e($t['contact']['hours']) ?></p>
                        </div>
                    </div>

                    <div class="contact-info-item flex gap-4 items-center">
                        <div class="contact-info-icon shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <a href="tel:<?= e(preg_replace('/\s+/', '', SITE_PHONE)) ?>" class="font-medium text-primary hover:text-primary-light transition-colors"><?= e(SITE_PHONE) ?></a>
                    </div>

                    <div class="contact-info-item flex gap-4 items-center">
                        <div class="contact-info-icon shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <a href="mailto:<?= e(SITE_EMAIL) ?>" class="font-medium text-primary hover:text-primary-light transition-colors"><?= e(SITE_EMAIL) ?></a>
                    </div>
                </div>
            </div>

            <div class="reveal-right contact-form-wrap bg-surface">
                <?php if ($form_success): ?>
                <div class="form-alert form-alert-success" role="alert">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p><?= e($form_message) ?></p>
                </div>
                <?php elseif (!empty($form_errors['_general'])): ?>
                <div class="form-alert form-alert-error mb-6" role="alert">
                    <p><?= e($form_errors['_general']) ?></p>
                </div>
                <?php endif; ?>

                <form id="contact-form" class="contact-form" action="contact-form.php" method="POST" novalidate>
                    <input type="hidden" name="lang" value="<?= e($current_lang) ?>">
                    <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token'] ?? '') ?>">

                    <div class="hp-field" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="form-group">
                            <label for="name" class="form-label"><?= e($t['contact']['name']) ?> *</label>
                            <input type="text" id="name" name="name" class="form-input <?= isset($form_errors['name']) ? 'form-input-error' : '' ?>" value="<?= e($form_data['name'] ?? '') ?>" required autocomplete="name">
                            <?php if (isset($form_errors['name'])): ?><p class="form-error"><?= e($form_errors['name']) ?></p><?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="company" class="form-label"><?= e($t['contact']['company']) ?></label>
                            <input type="text" id="company" name="company" class="form-input" value="<?= e($form_data['company'] ?? '') ?>" autocomplete="organization">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="form-group">
                            <label for="email" class="form-label"><?= e($t['contact']['email']) ?> *</label>
                            <input type="email" id="email" name="email" class="form-input <?= isset($form_errors['email']) ? 'form-input-error' : '' ?>" value="<?= e($form_data['email'] ?? '') ?>" required autocomplete="email">
                            <?php if (isset($form_errors['email'])): ?><p class="form-error"><?= e($form_errors['email']) ?></p><?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label"><?= e($t['contact']['phone']) ?> *</label>
                            <input type="tel" id="phone" name="phone" class="form-input <?= isset($form_errors['phone']) ? 'form-input-error' : '' ?>" value="<?= e($form_data['phone'] ?? '') ?>" required autocomplete="tel">
                            <?php if (isset($form_errors['phone'])): ?><p class="form-error"><?= e($form_errors['phone']) ?></p><?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cargo_type" class="form-label"><?= e($t['contact']['cargo']) ?></label>
                        <input type="text" id="cargo_type" name="cargo_type" class="form-input" value="<?= e($form_data['cargo_type'] ?? '') ?>">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="form-group">
                            <label for="origin" class="form-label"><?= e($t['contact']['origin']) ?></label>
                            <input type="text" id="origin" name="origin" class="form-input" value="<?= e($form_data['origin'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label for="destination" class="form-label"><?= e($t['contact']['destination']) ?></label>
                            <input type="text" id="destination" name="destination" class="form-input" value="<?= e($form_data['destination'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label"><?= e($t['contact']['message']) ?></label>
                        <textarea id="message" name="message" class="form-input form-textarea" rows="4"><?= e($form_data['message'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="btn-primary w-full justify-center group">
                        <?= e($t['contact']['submit']) ?>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
