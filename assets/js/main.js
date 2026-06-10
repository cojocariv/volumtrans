/**
 * Volum Trans Logistic — Main JavaScript
 * Handles loader, navigation, animations, parallax, counters, gallery, and form validation.
 */
(function () {
  'use strict';

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ── Page Loader ── */
  function initLoader() {
    const loader = document.getElementById('page-loader');
    if (!loader) return;

    const hide = () => {
      loader.classList.add('loaded');
      setTimeout(() => loader.remove(), 700);
    };

    if (document.readyState === 'complete') {
      setTimeout(hide, 800);
    } else {
      window.addEventListener('load', () => setTimeout(hide, 800));
    }
  }

  /* ── Header Scroll ── */
  function initHeader() {
    const header = document.getElementById('site-header');
    if (!header) return;

    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 60);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Mobile Menu ── */
  function initMobileMenu() {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (!btn || !menu) return;

    const openIcon = btn.querySelector('.menu-icon-open');
    const closeIcon = btn.querySelector('.menu-icon-close');

    const toggle = () => {
      const isOpen = !menu.classList.contains('hidden');
      menu.classList.toggle('hidden', isOpen);
      menu.setAttribute('aria-hidden', String(isOpen));
      btn.setAttribute('aria-expanded', String(!isOpen));
      openIcon?.classList.toggle('hidden', !isOpen);
      closeIcon?.classList.toggle('hidden', isOpen);
    };

    btn.addEventListener('click', toggle);

    menu.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        menu.classList.add('hidden');
        menu.setAttribute('aria-hidden', 'true');
        btn.setAttribute('aria-expanded', 'false');
        openIcon?.classList.remove('hidden');
        closeIcon?.classList.add('hidden');
      });
    });
  }

  /* ── Reveal on Scroll ── */
  function initReveal() {
    const elements = document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right');
    if (!elements.length) return;

    if (prefersReducedMotion) {
      elements.forEach((el) => el.classList.add('revealed'));
      return;
    }

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );

    elements.forEach((el) => observer.observe(el));
  }

  /* ── Counter Animation ── */
  function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    if (!counters.length) return;

    const animate = (el) => {
      const target = parseInt(el.dataset.counter, 10);
      const suffix = el.dataset.suffix || '';
      const duration = 2000;
      const start = performance.now();

      const step = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const value = Math.floor(eased * target);
        el.textContent = value.toLocaleString() + suffix;

        if (progress < 1) {
          requestAnimationFrame(step);
        } else {
          el.textContent = target.toLocaleString() + suffix;
        }
      };

      requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animate(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );

    counters.forEach((el) => {
      if (el.textContent.trim() === '0' || el.textContent.trim() === '0+') {
        observer.observe(el);
      }
    });
  }

  /* ── Parallax ── */
  function initParallax() {
    if (prefersReducedMotion) return;

    const elements = document.querySelectorAll('[data-parallax]:not(.hero-video-wrap)');
    if (!elements.length) return;

    const onScroll = () => {
      const scrollY = window.scrollY;
      elements.forEach((el) => {
        const speed = parseFloat(el.dataset.parallax) || 0.3;
        const rect = el.getBoundingClientRect();
        if (rect.bottom > 0 && rect.top < window.innerHeight) {
          el.style.transform = `translateY(${scrollY * speed * 0.1}px)`;
        }
      });
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Hero Video Autoplay ── */
  function initHeroVideo() {
    const video = document.querySelector('.hero-video');
    if (!video) return;
    video.play().catch(() => {});
  }

  /* ── Video Hover Play ── */
  function initVideoHover() {
    document.querySelectorAll('[data-video-hover]').forEach((video) => {
      const card = video.closest('.video-card');
      if (!card) return;

      card.addEventListener('mouseenter', () => {
        video.play().catch(() => {});
      });

      card.addEventListener('mouseleave', () => {
        video.pause();
        video.currentTime = 0;
      });

      // Autoplay on mobile when in view
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              video.play().catch(() => {});
            } else {
              video.pause();
            }
          });
        },
        { threshold: 0.5 }
      );
      observer.observe(video);
    });
  }

  /* ── Map Interactions ── */
  function initMap() {
    const markers = document.querySelectorAll('.map-marker');
    const routes = document.querySelectorAll('.route-line');

    markers.forEach((marker) => {
      const country = marker.dataset.country;

      marker.addEventListener('mouseenter', () => {
        routes.forEach((route) => {
          route.style.opacity = route.dataset.route === country || country === 'ro' ? '1' : '0.2';
        });
      });

      marker.addEventListener('mouseleave', () => {
        routes.forEach((route) => {
          route.style.opacity = '1';
        });
      });

      marker.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          marker.dispatchEvent(new Event('mouseenter'));
        }
      });
    });
  }

  /* ── Gallery Lightbox ── */
  function initGallery() {
    const items = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.getElementById('lightbox-close');
    const prevBtn = document.getElementById('lightbox-prev');
    const nextBtn = document.getElementById('lightbox-next');

    if (!items.length || !lightbox || !lightboxImg) return;

    const images = Array.from(items).map((item) => item.dataset.gallerySrc);
    let currentIndex = 0;

    const show = (index) => {
      currentIndex = (index + images.length) % images.length;
      lightboxImg.src = images[currentIndex];
      lightboxImg.alt = `Gallery image ${currentIndex + 1}`;
      lightbox.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    };

    const hide = () => {
      lightbox.classList.add('hidden');
      document.body.style.overflow = '';
    };

    items.forEach((item, i) => {
      item.addEventListener('click', () => show(i));
    });

    closeBtn?.addEventListener('click', hide);
    prevBtn?.addEventListener('click', () => show(currentIndex - 1));
    nextBtn?.addEventListener('click', () => show(currentIndex + 1));

    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) hide();
    });

    document.addEventListener('keydown', (e) => {
      if (lightbox.classList.contains('hidden')) return;
      if (e.key === 'Escape') hide();
      if (e.key === 'ArrowLeft') show(currentIndex - 1);
      if (e.key === 'ArrowRight') show(currentIndex + 1);
    });
  }

  /* ── Form Validation ── */
  function initFormValidation() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[+\d\s\-().]{7,20}$/;

    const showError = (input, message) => {
      input.classList.add('form-input-error');
      let errorEl = input.parentElement.querySelector('.form-error');
      if (!errorEl) {
        errorEl = document.createElement('p');
        errorEl.className = 'form-error';
        input.parentElement.appendChild(errorEl);
      }
      errorEl.textContent = message;
    };

    const clearError = (input) => {
      input.classList.remove('form-input-error');
      const errorEl = input.parentElement.querySelector('.form-error');
      if (errorEl) errorEl.remove();
    };

    form.addEventListener('submit', (e) => {
      let valid = true;

      const name = form.querySelector('#name');
      const email = form.querySelector('#email');
      const phone = form.querySelector('#phone');

      [name, email, phone].forEach((input) => {
        if (input) clearError(input);
      });

      if (name && !name.value.trim()) {
        showError(name, name.dataset.required || 'Required');
        valid = false;
      }

      if (email) {
        if (!email.value.trim()) {
          showError(email, email.dataset.required || 'Required');
          valid = false;
        } else if (!emailRegex.test(email.value.trim())) {
          showError(email, 'Invalid email');
          valid = false;
        }
      }

      if (phone) {
        if (!phone.value.trim()) {
          showError(phone, phone.dataset.required || 'Required');
          valid = false;
        } else if (!phoneRegex.test(phone.value.trim())) {
          showError(phone, 'Invalid phone');
          valid = false;
        }
      }

      if (!valid) {
        e.preventDefault();
      }
    });

    form.querySelectorAll('.form-input').forEach((input) => {
      input.addEventListener('input', () => clearError(input));
    });
  }

  /* ── Smooth Anchor Scroll ── */
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener('click', (e) => {
        const id = anchor.getAttribute('href');
        if (!id || id === '#') return;

        const target = document.querySelector(id);
        if (!target) return;

        e.preventDefault();
        const headerOffset = 80;
        const top = target.getBoundingClientRect().top + window.scrollY - headerOffset;

        window.scrollTo({
          top,
          behavior: prefersReducedMotion ? 'auto' : 'smooth',
        });
      });
    });
  }

  /* ── Init ── */
  document.addEventListener('DOMContentLoaded', () => {
    initLoader();
    initHeader();
    initMobileMenu();
    initReveal();
    initCounters();
    initParallax();
    initHeroVideo();
    initVideoHover();
    initMap();
    initGallery();
    initFormValidation();
    initSmoothScroll();
  });
})();
