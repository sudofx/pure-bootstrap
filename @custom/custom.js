/**
Theme Name: Pure Bootstrap
Description: Custom script - will NOT be overwritten on updates.
*/

(function($) {
  $(document).ready(function() {
    
    /** custom scripting */
    console.log('User edits in theme @custom folder');
    
    /** $touchscreen var */
    if ($touchscreen) {
      console.log('this is a touch screen');
    }

  });
}(jQuery));

            