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

function selectLitter(litterId){
    fetch(`/available-kittens/${litterId}`, {
        method: 'GET',
        headers: {
            'X-Reauested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById('litter-block').innerHTML = `
                <div class="title">
                    <h2>LITTER ${data.litter.name}</h2>
                    <p>${new Date(data.litter.date).toLocaleDateString()}</p>
                </div>
                <div class="section-inner">
                    <div class="cat-parent">
                        <img src="/img/cats/${data.mother.imageLink}" alt="Mother Cat">
                        <h4>${data.mother.name}</h4>
                    </div>
                    <div class="cat-parent">
                        <img src="/img/cats/${data.father.imageLink}" alt="Father Cat">
                        <h4>${data.father.name}</h4>
                    </div>
                </div>
                <div class="kittens">
                    ${data.kittens.map(kitten => `
                        <div class="kitten">
                            <img src="/img/kittens/${kitten.imageLink}" alt="${kitten.name}">
                            <h4>${kitten.name}</h4>
                            <span class="status ${kitten.kittenStatus.toLowerCase()}">${kitten.kittenStatus}</span>
                        </div>
                    `).join('')}
                </div>
            `;
        })
    .catch(error => console.error('Error: ', error));    
}