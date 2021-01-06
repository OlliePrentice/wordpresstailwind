import $ from 'jquery';
import Swiper, {Navigation, Pagination, EffectFade, Autoplay} from "swiper";
import AOS from 'aos';

Swiper.use([Navigation, Pagination, EffectFade, Autoplay]);

const Sliders = (() => {

    let intervals = [];


    const initSwiper = (selector, options) => {

        $(selector).each((index, el) => {

            const $elem = $(el);

            const carousel = new Swiper($elem.get(0), options);

            AOS.refresh();
        });
    }

    $('.carousel__items').each((index, elem) => {

        const dataSlides = parseInt($(elem).attr('data-slides'));

        const options = {
            slidesPerView: 1,
            pagination: {
                el: $(elem).find('.swiper-pagination').get(0),
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                prevEl: $(elem).find('.arrow-chevron--left').get(0),
                nextEl: $(elem).find('.arrow-chevron--right').get(0),
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: dataSlides,
                }
            }
        };

        if(dataSlides === 4) {
            options.breakpoints = {
                576: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1300: {
                    slidesPerView: dataSlides,
                }
            }
        }

        initSwiper(elem, options);

        $(elem).hide();

    });

    $('.feature__carousel').each((index, elem) => {


        initSwiper(elem, {
            // Optional parameters
            slidesPerView: 1,
            loop: true,
            effect: 'fade',
            navigation: {
                prevEl: '.arrow-left-' + $(elem).closest('section').attr('id'),
                nextEl: '.arrow-right-' + $(elem).closest('section').attr('id'),
            },
        });
    });

    $('.steps__carousel').each((index, elem) => {

        initSwiper(elem, {
            // Optional parameters
            slidesPerView: "auto",
            pagination: {
                el: $(elem).closest('section').find('.swiper-pagination').get(0),
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                prevEl: $(elem).closest('section').find('.arrow-chevron--left').get(0),
                nextEl: $(elem).closest('section').find('.arrow-chevron--right').get(0),
            },
        });

    });


    $('.image-carousel__slider').each((index, elem) => {

        const speed = 10000;

        initSwiper(elem, {
            // Optional parameters
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: speed,
                disableOnInteraction: false,
            },
            autoHeight: true,
            watchSlidesProgress: true,
            // onProgress: moveProgressBar(elem, speed),
            on: {
                progress: function (swiper, progress) {
                    moveProgressBar(elem, speed);
                }
            },
            effect: 'fade',
            navigation: {
                prevEl: '.arrow-left-' + $(elem).closest('section').attr('id'),
                nextEl: '.arrow-right-' + $(elem).closest('section').attr('id'),
            },
        });

    });

    $('.feature-sidebar__carousel-items').each((index, elem) => {

        const speed = 10000;

        initSwiper(elem, {
            // Optional parameters
            slidesPerView: 1,
            pagination: {
                el: $(elem).find('.swiper-pagination').get(0),
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                prevEl: $(elem).find('.arrow-chevron--left').get(0),
                nextEl: $(elem).find('.arrow-chevron--right').get(0),
            },
        });


    });


    function moveProgressBar(el, speed) {

        intervals.forEach(clearInterval);
        intervals = [];

        $(el).find(".progress-bar").each((index, elem) => {
            let width = 1;
            let autoplayTime = speed / 100;
            let id = setInterval(frame, autoplayTime);
            intervals.push(id);

            function frame() {

                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
            }
        });


    }


});

export default Sliders;
