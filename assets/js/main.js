/* Enhancing Brain — Main JS v1.0.0 */

(function () {
  'use strict';

  /* ── Scroll reveal ── */
  if ('IntersectionObserver' in window) {
    const ro = new IntersectionObserver(function(entries) {
      entries.forEach(function(e) {
        if (e.isIntersecting) { e.target.classList.add('on'); ro.unobserve(e.target); }
      });
    }, { threshold: 0.06, rootMargin: '0px 0px -24px 0px' });
    document.querySelectorAll('.rev').forEach(function(el) { ro.observe(el); });
  } else {
    document.querySelectorAll('.rev').forEach(function(el) { el.classList.add('on'); });
  }

  /* ── Mobile nav ── */
  var burger   = document.getElementById('burger');
  var mobMenu  = document.getElementById('mobMenu');
  var mobClose = document.getElementById('mobClose');
  var focusableSelector = 'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])';
  if (mobMenu && ('inert' in mobMenu)) mobMenu.inert = true;

  function trapFocus(e) {
    if (!mobMenu || !mobMenu.classList.contains('open') || e.key !== 'Tab') return;
    var focusables = mobMenu.querySelectorAll(focusableSelector);
    if (!focusables.length) return;
    var first = focusables[0];
    var last = focusables[focusables.length - 1];

    if (e.shiftKey && document.activeElement === first) {
      e.preventDefault();
      last.focus();
    } else if (!e.shiftKey && document.activeElement === last) {
      e.preventDefault();
      first.focus();
    }
  }

  function openMob() {
    if (!burger || !mobMenu || !mobClose) return;
    mobMenu.classList.add('open');
    mobMenu.setAttribute('aria-hidden', 'false');
    if ('inert' in mobMenu) mobMenu.inert = false;
    burger.setAttribute('aria-expanded', 'true');
    burger.setAttribute('aria-label', 'Close navigation menu');
    document.body.style.overflow = 'hidden';
    mobClose.focus();
  }
  function closeMob() {
    if (!burger || !mobMenu) return;
    mobMenu.classList.remove('open');
    mobMenu.setAttribute('aria-hidden', 'true');
    if ('inert' in mobMenu) mobMenu.inert = true;
    burger.setAttribute('aria-expanded', 'false');
    burger.setAttribute('aria-label', 'Open navigation menu');
    document.body.style.overflow = '';
    burger.focus();
  }

  if (burger && mobMenu && mobClose) {
    burger.addEventListener('click', function() {
      mobMenu.classList.contains('open') ? closeMob() : openMob();
    });
    mobClose.addEventListener('click', closeMob);

    // ESC closes, TAB focus trap while open.
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && mobMenu.classList.contains('open')) closeMob();
      trapFocus(e);
    });
  }

  /* ── Topics band scroll ── */
  var wrap = document.getElementById('bandWrap');
  var tags = document.getElementById('bandTags');

  if (wrap && tags) {
    function checkEnd() {
      wrap.classList.toggle('at-end', tags.scrollLeft + tags.clientWidth >= tags.scrollWidth - 4);
    }
    tags.addEventListener('scroll', checkEnd, { passive: true });
    window.addEventListener('resize', checkEnd);
    setTimeout(checkEnd, 400);

    // Drag to scroll
    var down = false, sx = 0, sl = 0;
    tags.addEventListener('mousedown', function(e) {
      down = true; sx = e.pageX - tags.offsetLeft; sl = tags.scrollLeft;
      tags.classList.add('grabbing');
    });
    document.addEventListener('mouseup', function() {
      down = false; tags.classList.remove('grabbing');
    });
    tags.addEventListener('mousemove', function(e) {
      if (!down) return;
      e.preventDefault();
      tags.scrollLeft = sl - (e.pageX - tags.offsetLeft - sx);
    });
  }

  /* ── Whole card clickable ── */
  document.querySelectorAll('.card').forEach(function(card) {
    var primary = card.querySelector('.c-title a');
    if (!primary) return;
    card.addEventListener('click', function(e) {
      if (e.target.closest('a, button')) return;
      window.location.href = primary.href;
    });
  });

  /* ── Smooth scroll (anchor links only, not bare #) ── */
  document.querySelectorAll('a[href^="#"]').forEach(function(a) {
    a.addEventListener('click', function(e) {
      var href = a.getAttribute('href');
      if (!href || href === '#') return;
      var target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  /* ── Parent nav items with dropdown should not navigate ── */
  document.querySelectorAll('.nav-links > li.menu-item-has-children > a[href="#"], .mob-nav-list > li.menu-item-has-children > a[href="#"]').forEach(function(a) {
    a.addEventListener('click', function(e) {
      e.preventDefault();
    });
  });

})();
