const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 2,
    spaceBetween: 50,
    autoplay: {
        delay: 3000,
    },
    pagination: {
        el: '.swiper-pagination',
    },
    
    });