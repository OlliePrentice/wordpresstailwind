function Menu() {
    const mainHeader = document.querySelector(".main-header"),
        $burger = $(".burger"),
        $mobileNav = $(".mobile-navigation");

    $('a[href="#"]').on('click', (e) => {
        e.preventDefault();
    });

    $burger.on("click", (e) => {
        const $this = $(e.currentTarget);

        $this.toggleClass("active");

        if ($this.hasClass("active")) {
            $mobileNav.addClass("active");
        } else {
            $mobileNav.removeClass('active');
            $mobileNav.removeClass('sub-open');
            $mobileNav.find('ul').removeClass('current active');
        }
    });

    $mobileNav.find('.menu-item-has-children').on('click', (e) => {
        e.stopPropagation();
        $mobileNav.addClass('sub-open');
        $mobileNav.scrollTop(0);
        $mobileNav.find('ul').scrollTop(0);
        $mobileNav.find('ul').removeClass('current');
        $(e.currentTarget).children('ul').addClass('active current');
    });


    $mobileNav.find('.menu-item-has-children > ul').prepend('<li class="menu-back"><a href="#">Back</a></li>');

    $mobileNav.find('.menu-back').on('click', (e) => {
        e.stopPropagation();

        const $this = $(e.currentTarget);

        if($this.parent().parent().parent().hasClass('menu')) {
            $mobileNav.removeClass('sub-open');
            $mobileNav.find('ul').removeClass('current');
            $this.parent().removeClass('active');
        } else {
            $this.parent().parent().parent().addClass('current');
            $this.parent().removeClass('active current');
        }
    });

    function menuItemStates($this, type) {

        if(type === 'leave') {
            $this.removeClass('active');
            $this.find('li').removeClass('active');
        } else {
            if (!$this.closest('li').hasClass('active')) {
                //$this.closest('li').addClass('active');
                $('.menu-item-has-children').removeClass('active');
                $this.parents('li').addClass('active');
                $this.addClass('active');
            } else {
                if (type === 'click') {
                    $this.removeClass('active');
                    $this.find('li').removeClass('active');
                }
            }
        }

        let activeItem = false;

        activeItem = document.querySelectorAll('.menu-item-has-children').some(el => el.classList.contains('active')); 

        if(activeItem) {
            mainHeader.classList.add('active-hovered');
        } else {
            mainHeader.classList.remove('active-hovered');
        }

    }


    mainHeader.querySelectorAll('.menu-item-has-children').forEach((el) => {
        el.addEventListener('mouseenter', e => {
            menuItemStates($(e.currentTarget), 'enter');
        });

        el.addEventListener('mouseleave', e => {
            menuItemStates($(e.currentTarget), 'leave');
        });
    });

}

export default Menu;
