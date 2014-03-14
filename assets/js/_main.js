/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var SMG = {
  // All pages
  common: {
    init: function() {

      // add Bootsrap's table classes
      $('table')
        .addClass('table table-responsive');

      // Mobile navs
      SMG._navMobileTarget = $('.nav-mobile-container');
      SMG._sidebarMobileTarget = $('.sidebar-mobile-container');
      SMG._navTop = $('#top-nav');
      SMG._navMain = $('#primary-nav');
      SMG._sidebar = $('.sidebar');

      var mobileNavMain = SMG._navMain.clone();
      mobileNavMain
        .removeClass('list-inline')
        .addClass('nav nav-pills nav-stacked')
        .appendTo(SMG._navMobileTarget);

      var mobileNavTopItems = SMG._navTop.clone().contents();
      mobileNavTopItems.appendTo(mobileNavMain);



      // Mobile Sidebar
      var mobileSidebar = SMG._sidebar.clone().contents();
      mobileSidebar.appendTo(SMG._sidebarMobileTarget);
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  },
  single_rental: {
    init: function() {

      /**
       * Repaint the masonry gallery when:
       *  - window is resized
       *  - any tab is clicked/shown
       *
       * @link see http://stackoverflow.com/questions/14549826/bootstrap-tabs-jquery-masonry
       */
      var galleries = $('.photo-gallery');
      $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $(window).trigger('resize');
      });
      $(window).resize(function() {
        $this = $('.photo-gallery');
        $column = ($this.width() / 3) - 2;
        $this.masonry({
          columnWidth: $column,
          gutter: 1,
          itemSelector: '.photo-gallery-image'
        });
      });
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = SMG;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
