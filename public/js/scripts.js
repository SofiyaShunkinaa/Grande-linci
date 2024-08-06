const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 2,
    spaceBetween: 50,
    autoplay: {
        delay: 2000,
    },
    pagination: {
        el: '.swiper-pagination',
    },
    
    });

const input = document.querySelector("#request_phone");
window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/js/utils.js",
});    