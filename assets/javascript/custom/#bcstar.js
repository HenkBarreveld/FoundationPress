//
// Make main navigation dropdown menus right instead of left aligned with the calling topbar menu item,
// if the dropdown would otherwise not be shown completely within the viewport 
//
function setDropdownPosition() {
    "use strict";
    var maxWidth = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth) - 20;
    // subtract 20 to deal with some width used by a vertical scroll bar
    var listUl = document.getElementById("bc-star-menu").getElementsByTagName("ul");
    var i;
    for (i = 0; i < listUl.length; i++) {
        listUl[i].style.left = "0";
        listUl[i].style.right = "auto";
        if (listUl[i].getBoundingClientRect().right > maxWidth) {
            listUl[i].style.left = "auto";
            listUl[i].style.right = "0";
        }
    }
    // alert("maxWidth = " + maxWidth); // example debug message
}
// Add Event Listener for mouseover on topbar-menu
window.onresize = function() {
    "use strict";
    document.getElementById("bc-star-menu").addEventListener("mouseover", setDropdownPosition);
};
//
// Parse URL Queries
// From http://www.kevinleary.net/get-url-parameters-javascript-jquery
// Used by Javascript on the Uitslagen and Star Magazine pages
//
// Examples:
//     http://www.bcstar.nl/<uitslagen>-page/?klik=anchor
//         opens page, clicks anchor
//     http://www.bcstar.nl/<star magazine>-page/?ff=yes
//         opens page, then opens and moves to first document in the list
//
function url_query(query) {
    "use strict";
    query = query.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var expr = "[\\?&]" + query + "=([^&#]*)";
    var regex = new RegExp(expr);
    var results = regex.exec(window.location.href);
    if (results !== null) {
        return results[1];
    } else {
        return false;
    }
}
//
// Allow multiple file attachments in Contact Form 7
// From http://kg69design.com/multiple-files-uploading-cf7.html
//
jQuery(document).ready(function($) {

    //hide all inputs except the first one
    $('p.hide').not(':eq(0)').hide();

    //hide all inputs
    $('p.hide').hide();

    //functionality for add-file link
    $('a.add_file').on('click', function(e) {
        //show by click the first one from hidden inputs
        $('p.hide:not(:visible):first').show('slow');
        e.preventDefault();
    });

    //functionality for del-file link
    $('a.del_file').on('click', function(e) {
        //var init
        var input_parent = $(this).parent();
        var input_wrap = input_parent.find('span');
        //reset field value
        input_wrap.html(input_wrap.html());
        //hide by click
        input_parent.hide('slow');
        e.preventDefault();
    });
});
//
// Disable menu items with class="no-load" (header pages that are only used for the page hierarchy)
//
$(document).ready(function(){
    $('nav.top-bar li.no-load>a').on('click', function(){
        return false;
    });
});
//
// Scroll to top of page, using the scroll-to-top button added to header.php
//
$(document).ready(function(){
    $('a.scroll-to-top').click(function(){
        $('html, body').animate({scrollTop: 0}, 'slow', 'linear');
    });
});
