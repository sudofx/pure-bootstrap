/**
  Theme Name: Pure Bootstrap
  Description: Base script
*/

(function($) {
  $(document).ready(function() {

    // Touchscreen variable
    $touchscreen = (typeof window.ontouchstart !== 'undefined');

    // Remove header and navbar
    if ($('.no-nav').length) {

      // Remove elements for no-nav full page
      $elements = [$('header'), $('nav'), $('footer')];
      for (var $div in $elements) $elements[$div].remove();

      if ($('.scrollsections').length) {
        $('.menu-item').addClass('nav-menu-item');

        // Only show the word "Menu" if not a touch screen
        if (!$touchscreen) {
            html = '<i id="show-nav" class="fa fa-bars"><span class="menu-text">&nbsp;Menu</span></i>';
            $('.nav-menu').html(html);
        }

        // Bind to the #show-nav click function to show fullscreen nav
        $('#show-nav').click(function() {
            $('#navpage').css('z-index', '1100');
            $('#navpage').removeClass('animated fadeOutUpBig');
            $('#navpage').addClass('bg-primary');
            $('#navpage').addClass('animated bounceInDown');
            window.setTimeout(function() {
                $('section').css('display', 'none');
            }, 500);
        });

        function closeNav() {
          $('section').css('display', 'block');
          $('#navpage').removeClass('animated bounceInDown');
          $('#navpage').addClass('animated fadeOutUpBig');
          window.setTimeout(function() {
              $('#navpage').css('z-index', '-1');
          }, 500);
        }

        $('#close-nav').click(function() { closeNav(); });
        $('.nav-menu-item').click(function() { closeNav(); });

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
      // Set info content container element sizes
      $(window).resize(function() {
        $h = $(window).height();
        $('section').css('min-height', $h);
      });
      // Set the initial size
      $(window).resize();
    }

    // Add form-control class to ID comment
    if ($('#comment').length)
      $('#comment').addClass('form-control');

    // Add .btn class to ID submit
    if ($('#submit').length)
      $('#submit').addClass('btn btn-primary');

    // Add tooltips to facebook photos
    if ($('.fb-thumbnail').length)
      $(function($) { $('.fb-thumbnail').tooltip(); });

    // This is used on the custom contact form. After displaying the
    //  success modal, and the user hits "Okay", it will take them back
    //  to the previous page
    $('.confirmClose').click(function() {
      window.history.back(-1, 500);
      return true
    })

  });
}(jQuery));
