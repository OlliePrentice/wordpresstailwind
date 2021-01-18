// Polyfills
import "core-js/stable/promise";
import "core-js/stable/number";
import "regenerator-runtime/runtime";

// Utilities
import "./utilities/forEachPolyfill";

// Load Vendor
import AOS from 'aos';
import '@fancyapps/fancybox/dist/jquery.fancybox';

// Load App
import Menu from './app/Menu';
import ScrollTo from './app/ScrollTo';
import Sliders from './app/Sliders';
import General from './app/General';


$(async () => {

    function windowHashChecked() {
        return new Promise(resolve => {
            setTimeout(() => {
                if (window.location.hash) {
                    window.scrollTo(0, 0);
                }
                resolve('resolved');
            }, 1);
        });
    }

    await windowHashChecked();


    Sliders();


});

$(window).on('load', function() {

    // Load Imports
    General();
    Menu();
    ScrollTo();

    AOS.init({
        once: true
    });

});
