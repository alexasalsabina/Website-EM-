window.addEventListener('DOMContentLoaded', () => {
  const tabs = Array.from(document.querySelectorAll('[data-berita-tab]'));
  const panels = Array.from(document.querySelectorAll('[data-berita-panel]'));
  const indicator = document.querySelector('.berita__tab-indicator');

  if (!tabs.length || !panels.length || !indicator) return;

  const activateTab = (tab) => {
    const target = tab.dataset.beritaTab;

    tabs.forEach((button) => {
      const isActive = button === tab;
      button.classList.toggle('is-active', isActive);
      button.setAttribute('aria-selected', isActive ? 'true' : 'false');
      button.tabIndex = isActive ? 0 : -1;
    });

    panels.forEach((panel) => {
      const shouldShow = panel.dataset.beritaPanel === target;
      panel.classList.toggle('is-active', shouldShow);
      panel.hidden = !shouldShow;
    });

    const buttonRect = tab.getBoundingClientRect();
    const parentRect = tab.parentElement.getBoundingClientRect();
    indicator.style.left = `${buttonRect.left - parentRect.left}px`;
    indicator.style.width = `${buttonRect.width}px`;
  };

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => activateTab(tab));
    tab.addEventListener('keydown', (event) => {
      if (event.key !== 'ArrowRight' && event.key !== 'ArrowLeft') return;
      event.preventDefault();

      const currentIndex = tabs.indexOf(tab);
      const nextIndex = event.key === 'ArrowRight'
        ? (currentIndex + 1) % tabs.length
        : (currentIndex - 1 + tabs.length) % tabs.length;

      activateTab(tabs[nextIndex]);
      tabs[nextIndex].focus();
    });
  });

  activateTab(tabs[0]);
  window.addEventListener('resize', () => {
    const active = document.querySelector('[data-berita-tab].is-active');
    if (active) activateTab(active);
  });
});