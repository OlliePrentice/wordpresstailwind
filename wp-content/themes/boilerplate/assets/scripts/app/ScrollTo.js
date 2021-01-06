function scrollTo() {

    if (window.location.hash) {
        const $scrollToEl = $(window.location.hash);

        if ($scrollToEl.length) {
            $('html, body').animate({
                scrollTop: $scrollToEl.offset().top - 70
            }, 500);
        }

    }

    $(".scroll-anchor").on('click', (e) => {
        const $this = $(e.currentTarget);

        if($this.attr('href') !== '#') {
            $('html, body').animate({
               scrollTop: $($this.attr('href')).offset().top
            }, 600);
        }

    });

}

export default scrollTo;
