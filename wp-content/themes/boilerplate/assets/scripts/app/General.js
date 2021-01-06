import $ from 'jquery';
import 'jquery-match-height/dist/jquery.matchHeight';
import AOS from "aos";

function General() {
    $('.mh').matchHeight();

    $.fn.matchHeight._afterUpdate = function(event, groups) {
        AOS.refresh();
    }
}

export default General;
