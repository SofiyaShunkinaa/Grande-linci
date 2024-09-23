const swiper = new Swiper('.swiper-home', {
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

const swiperKittens = new Swiper('.swiper-kittens', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 5,
    spaceBetween: 20,
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });    

const input = document.querySelector("#request_phone");
window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/js/utils.js",
});    