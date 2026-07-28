window.addEventListener('DOMContentLoaded', () => {
  const listItems = Array.from(document.querySelectorAll('[data-berita-list-item]'));
  const preview = document.querySelector('[data-berita-preview]');
  const previewCard = document.querySelector('[data-berita-preview-card]');
  const previewImage = document.querySelector('[data-berita-preview-image]');
  const previewDate = document.querySelector('[data-berita-preview-date]');
  const previewTitle = document.querySelector('[data-berita-preview-title]');
  const previewExcerpt = document.querySelector('[data-berita-preview-excerpt]');

  if (!preview || !previewCard || !previewImage || !previewDate || !previewTitle || !previewExcerpt || !listItems.length) {
    return;
  }

  const setActiveItem = (item) => {
    listItems.forEach((entry) => entry.classList.toggle('is-active', entry === item));
  };

  const showPreview = (item) => {
    const image = item.dataset.beritaImage;
    const date = item.dataset.beritaDate;
    const title = item.dataset.beritaTitle;
    const excerpt = item.dataset.beritaExcerpt;

    previewImage.src = image;
    previewImage.alt = title;
    previewDate.textContent = date;
    previewTitle.textContent = title;
    previewExcerpt.textContent = excerpt;

    previewCard.classList.remove('is-visible');
    window.requestAnimationFrame(() => previewCard.classList.add('is-visible'));
    setActiveItem(item);
  };

  listItems.forEach((item) => {
    item.addEventListener('mouseenter', () => showPreview(item));
    item.addEventListener('focus', () => showPreview(item));
  });

  document.querySelectorAll('a[href="#"]').forEach((link) => {
    link.addEventListener('click', (event) => event.preventDefault());
  });

  showPreview(listItems[0]);
});
