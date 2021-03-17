// Polyfills
import "core-js/stable/promise";
import "core-js/stable/number";
import "core-js/stable/array";
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



window.onload = () => {

    // Load Imports
    General();
    Menu();
    ScrollTo();
    Sliders();

    AOS.init({
        once: true
    });

};
