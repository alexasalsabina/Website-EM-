document.addEventListener('DOMContentLoaded', function () {
    const content = document.querySelector('.lpm-hero__content');
    if (content) {
        requestAnimationFrame(() => content.classList.add('is-visible'));
    }
});