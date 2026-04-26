import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

window.initHomeSlider = function() {
    new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 7000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 0,
    });
}
