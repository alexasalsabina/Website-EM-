import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Import JS
import './header.js';
import './back-to-top.js';
import './components-init.js';
import './berita-tabs.js';
import './hero.js';
import './statistik.js';

window.addEventListener('DOMContentLoaded', () => {
  const loader = document.getElementById('globalLoader');
  const appContent = document.getElementById('appContent');

  if (!loader || !appContent) return;

  window.setTimeout(() => {
    loader.classList.add('hidden');
    appContent.classList.add('visible');
  }, 500);
});