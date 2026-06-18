/* jarred-re: main.js */
(function () {
  'use strict';

  /* ── Header scroll behaviour ──────────────────────────── */
  const header = document.getElementById('site-header');
  if (header) {
    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Mobile menu toggle ───────────────────────────────── */
  const toggle = document.getElementById('menu-toggle');
  const nav    = document.getElementById('site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', String(open));
      document.body.style.overflow = open ? 'hidden' : '';

      // Animate hamburger → ✕
      const spans = toggle.querySelectorAll('span');
      if (open) {
        spans[0].style.transform = 'translateY(7px) rotate(45deg)';
        spans[1].style.opacity   = '0';
        spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
      } else {
        spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
      }
    });

    // Close on nav link click
    nav.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        const spans = toggle.querySelectorAll('span');
        spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
      });
    });

    // Close on Escape
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && nav.classList.contains('open')) {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        toggle.focus();
      }
    });
  }

  /* ── Scroll-reveal (Intersection Observer) ────────────── */
  const revealEls = document.querySelectorAll(
    '.card, .neighborhood-card, .stat-item, .resource-item, .about-split__image, .about-split__body'
  );

  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    revealEls.forEach(el => {
      el.style.opacity   = '0';
      el.style.transform = 'translateY(24px)';
      el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });

    const io = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity   = '1';
          entry.target.style.transform = 'none';
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    revealEls.forEach(el => io.observe(el));
  }

  /* ── Stat counter animation ───────────────────────────── */
  function animateCounter(el, target, suffix) {
    const duration = 1400;
    const start    = performance.now();
    const isFloat  = String(target).includes('.');

    const tick = now => {
      const progress = Math.min((now - start) / duration, 1);
      const eased    = 1 - Math.pow(1 - progress, 3);
      const current  = isFloat
        ? (eased * target).toFixed(1)
        : Math.round(eased * target);
      el.textContent = current + suffix;
      if (progress < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  }

  const statEls = document.querySelectorAll('.stat-item__number');
  if ('IntersectionObserver' in window) {
    const statIO = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el   = entry.target;
        const raw  = el.textContent.trim();
        const num  = parseFloat(raw.replace(/[^0-9.]/g, ''));
        const suffix = raw.replace(/[0-9.]/g, '');
        if (!isNaN(num) && num > 0) animateCounter(el, num, suffix);
        statIO.unobserve(el);
      });
    }, { threshold: 0.5 });
    statEls.forEach(el => statIO.observe(el));
  }

})();
