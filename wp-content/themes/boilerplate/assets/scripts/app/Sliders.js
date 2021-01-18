import $ from 'jquery';
import Swiper, {Navigation, Pagination, EffectFade, Autoplay} from "swiper";
import resizeEvent from "../utilities/triggerResizeEvent";

Swiper.use([Navigation, Pagination, EffectFade, Autoplay]);

function Sliders() {

    let intervals = [];


    const initSwiper = (selector, options) => {

        $(selector).each((index, el) => {

            const $elem = $(el);

            const carousel = new Swiper($elem.get(0), options);

            window.dispatchEvent(resizeEvent);
        });
    }

    $('.carousel').each((index, elem) => {

        initSwiper(elem, {
            slidesPerView: 1,
            loop: true,
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


};

export default Sliders;
