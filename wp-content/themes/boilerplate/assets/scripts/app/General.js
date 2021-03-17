import $ from 'jquery';
import 'jquery-match-height/dist/jquery.matchHeight';
import resizeEvent from "../utilities/triggerResizeEvent";

function General() {
    $('.mh').matchHeight();

    $.fn.matchHeight._afterUpdate = function(event, groups) {
        window.dispatchEvent(resizeEvent);
    };
}

export default General;
