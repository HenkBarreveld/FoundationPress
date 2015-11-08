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
$(document).ready(function () {
    "use strict";
    $('nav.top-bar li.no-load>a').on('click', function () {
        return false;
    });
});
//
// Scroll to top of page, using the scroll-to-top button added to header.php
//
$(document).ready(function () {
    "use strict";
    $('a.scroll-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 'slow', 'linear');
    });
});
//
// Sticky Sidebar for FoundationPress
// Inspired by: http://zurb.com/building-blocks/sticky-sidebar
//
// Expected html structure (corresponding with FoundationPress 1.5.0):
//
//    <div class="top-bar-container sticky" ... >
//       ...
//    </div>
//    ...
//    <section role="document" ... >
//       <div class="row" ... >
//          <div ... >                  // div contains main page content
//             ...
//          </div>
//          <aside ... >                // aside contains sidebar
//             ...
//          </aside>
//       </div>
//    </section>
//    <div id="footer-container" ... >
//       ...
//    </div>
//
// The sticky sidebar is positioned relative to the topbar. Therefore, in order to work correctly,
// the topbar <div class="top-bar-container ..." sticky feature must be used as well.
//
// The sidebar <aside> may be missing on pages without sidebar.
// The sidebar <aside> may come before or after the main page content <div>.
//
// To use Sticky Sidebars, just add this file to
//    assets/javascript/custom
// in your FounDationPress theme folder.
// That's all! No changes in html or scss/css files needed
//
// Once the file has been instaalled. all (single) sidebars are treated as sticky.
// The behaviour affects the sidebar as a whole; no widgets (<articles>) are excluded.
//
// If you do not want to use a sticky sidebar on certain pages, use a separate template, as follows:
//
// - duplicate the right template file in the FoundationPress folder "templates"
// - change the template name in the header of the new template file (e.g. "Left Sidebar" to "Left Flex Sidebar")
// - add the class "nostick" to the main <div class="row"> element in the template file
// - assign the template to the pages for which you do not want sticky sidebars
//
//
$(document).ready(function () {
    "use strict";
    var row = $('section[role="document"]>.row'),
        rowTop,
        content,
        contentHeight,
        sidebar,
        sidebarTop,
        sidebarLeft,
        sidebarHeight,
        sidebarWidth,
        sidebarSticky,
        sidebarFixed;

    function setPosition() {                // function called on window scroll and by SidebarInf()
        if (!sidebarSticky) {               // case: no sidebar or aside with class="nostick"
            return;
        }
        sidebarHeight = sidebar.outerHeight(true);
        if (!sidebarFixed) {               // case: sidebar below/above content or sidebar longer than content
            sidebar.removeAttr('style');
            return;
        }
        var topbarBottom = $('.top-bar-container').scrollTop() + $('.top-bar-container').outerHeight(true);
        rowTop = row.offset().top - $(window).scrollTop();
        if (rowTop > topbarBottom) {         // case: "natural" top of sidebar below topbar, not to be repositioned
            sidebar.removeAttr('style');
            return;
        }
        var footerDistance = $('#footer-container').offset().top - $(window).scrollTop() - topbarBottom - sidebarHeight;
        sidebarTop = topbarBottom + ((footerDistance < 0) ? footerDistance : 0);
               // avoid sidebar overlapping footer, if viewport height is maller than sidebar height
        sidebar.css({'position': 'fixed', 'top': sidebarTop, 'left': sidebarLeft, 'width': sidebarWidth});
    }

    function getInfo() {                    // function called on window load and window resize
        if (!sidebarSticky) {               // case: no sidebar
            return;
        }
        contentHeight = content.outerHeight(true);
        sidebarHeight = sidebar.outerHeight(true);
        sidebar.removeAttr('style');
        sidebarWidth = sidebar.css('width');
        sidebarTop = sidebar.offset().top;
        sidebarLeft = sidebar.offset().left;
        sidebarFixed = (sidebarTop == content.offset().top) &&      // sidebar next to content (not above or below)
            (contentHeight > sidebarHeight);                        // sidebar shorer than content
        sidebar.setPosition();
    }

    sidebarSticky = (row.children('aside').length > 0) &&           // exlude pages with no sidebar
        !(row.hasClass('nostick'));                                 // exclude pages with <div class="row nostick">
    
    if (sidebarSticky) {
        content = row.children('div').first();
        sidebar = row.children('aside').first();
    }

    sidebar.getInfo();
    
    // on window scroll, reposition the sidebar
    $(window).scroll(sidebar.setPosition);
    
    // on window resize, reposition the sidebar
    $(window).resize(sidebar.getInfo);
    
    // on sidebar click, possibly changing the sidebar height, reposition the sidebar
    // Repositioning is delayed, to deal with any animation in the sidebar height change
    sidebar.click($(this).delay('slow').setPosition);
});
