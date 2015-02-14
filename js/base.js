/**
  Theme Name: Pure Bootstrap
  Description: Base script
*/

(function($) {
  $(document).ready(function() {

    // Touchscreen variable
    $touchscreen = (typeof window.ontouchstart !== 'undefined');

    // add bootstrap classes if they are not added
    $('input').addClass('form-control');
    $(':submit').removeClass('form-control');
    $(':submit').addClass('btn');
    $(':submit').addClass('btn-primary');
    $(':submit').addClass('btn-rounded');
    $('textarea').addClass('form-control');


    if ($('.search-btn').length) {
      $('.search-btn').removeClass('btn-rounded');
      $('.search-btn').css('margin-left', '-5px');
    }

    // Remove header and navbar
    if ($('.no-nav').length) {

      // Remove elements for no-nav full page
      $elements = [$('header'), $('nav'), $('footer')];
      for (var $div in $elements) $elements[$div].remove();

      if ($('.scrollsections').length) {
        $('.menu-item').addClass('nav-menu-item');

        // Only show the word "Menu" if not a touch screen
        if ($touchscreen) {
          $('.nav-menu').css('font-size', '24px');
          $('.btn-x').css('font-size', '35px');
        }

        // bind to the #show-nav click function to show fullscreen nav
        // for full-no-nav template
        $('#show-nav').click(function() {
          $('#navpage').css('z-index', '1100');
          $('#navpage').addClass('bg-primary');
          $('#navpage').addClass('animated bounceInDown');
          window.setTimeout(function() {
            $('section').css('display', 'none');
            $('#navpage').removeClass('animated fadeOutUpBig');
          }, 500);
        });

        function closeNav() {
          $('section').css('display', 'block');
          $('#navpage').addClass('animated fadeOutUpBig');
          window.setTimeout(function() {
            $('#navpage').css('z-index', '-1');
            $('#navpage').removeClass('bg-primary animated bounceInDown fadeOutUpBig');
          }, 500);
        }

        $('#close-nav').click(function() {
          closeNav();
        });
        $('.nav-menu-item').click(function() {
          closeNav();
        });

        if (!$touchscreen) {
          // Non-touchscreen settings
          // https://github.com/guins/jQuery.scrollSections
          $('section.scrollsections').scrollSections({
            speed: 500,
            touch: false,
            keyboard: true
          });
        }
      }
    }


    // Add form-control class to ID comment
    if ($('#comment').length)
      $('#comment').addClass('form-control');

    // Add .btn class to ID submit
    if ($('#submit').length)
      $('#submit').addClass('btn btn-primary');

    // Add tooltips to facebook photos
    if ($('.fb-thumbnail').length)
      $(function($) {
        $('.fb-thumbnail').tooltip();
      });

    // This is used on the custom contact form. After displaying the
    //  success modal, and the user hits "Okay", it will take them back
    //  to the previous page
    $('.confirmClose').click(function() {
      window.history.back(-1, 500);
      return true
    })

    function section_resize($w, $h) {
      $('section').css('min-height', $h);
    }

    function header_resize($w, $h) {
      if ($w <= 768) {
        $('.navbar').addClass('navbar-fixed-top');
        $('.navbar').css('opacity', '0.96');
        $('.navbar-brand').css('display', 'block');
        $('header').css('display', 'none');
        $('body').css('margin-top', '39px');
      } else {
        $('.navbar').removeClass('navbar-fixed-top');
        $('.navbar').css('opacity', '1');
        $('.navbar-brand').css('display', 'none');
        $('header').css('display', 'block');
        $('body').css('margin-top', '0');
      }
    }

    function navbar_position($w, $h) {
      if ($w <= 768) {
        $('.navbar').addClass('navbar-fixed-top');
        $('.navbar').css('opacity', '0.96');
        $('body').css('margin-top', '50px');
      } else {
        $('.navbar').removeClass('navbar-fixed-top');
        $('.navbar').css('opacity', '1');
        $('body').css('margin-top', '0');
      }
    }

    $(window).resize(function() {
      $h = $(window).height();
      $w = $(window).width();

      if ($('.no-nav').length) section_resize($w, $h);
      else navbar_position($w, $h);
      if ($('header').length) header_resize($w, $h);

    });
    $(window).resize();

  });
}(jQuery));
