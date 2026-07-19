document.addEventListener('DOMContentLoaded', function () {
    const title = document.querySelector('.pkk-hero__title-wrap');
    const content = document.querySelector('.pkk-hero__content');

    if (title) requestAnimationFrame(() => title.classList.add('is-visible'));
    if (content) requestAnimationFrame(() => content.classList.add('is-visible'));
});