import './bootstrap';

import Alpine from 'alpinejs';
import PhotoSwipeLightbox from 'photoswipe/lightbox';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('#my-gallery a').forEach(link => {
        const img = new Image();
        img.src = link.href; // Carga la imagen real
        img.onload = function () {
            link.setAttribute('data-pswp-width', img.naturalWidth);
            link.setAttribute('data-pswp-height', img.naturalHeight);
        };
    });

    const lightbox = new PhotoSwipeLightbox({
        gallery: '#my-gallery',
        children: 'a',
        pswpModule: () => import('photoswipe')
    });

    lightbox.init();
});
