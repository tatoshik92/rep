$(function(){


    if($('.videoSwiper').length){
        var swiper = new Swiper(".videoSwiper", {
            slidesPerView: "auto",
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
                navigation: {
                nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
            }
        });
    }


});