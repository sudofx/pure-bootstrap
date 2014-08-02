<?php
/**
 * Theme: Pure Bootstrap
 * Navpage for no-navbar page (sections)
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
?>

<div id="navpage">
  <div id="close-nav" class="btn-x">×</div>
  <div class="nav-menu-box">
    <div class="col-sm-12 col-md-12">
      <?php
        wp_nav_menu( array(
          'menu'              => 'fullscreen-nav',
          'theme_location'    => 'fullscreen-nav',
          'depth'             => 1,
          'container'         => 'div',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
      ?>
    </div>
  </div>
  <div class="text-center">
      <div class="copyright">
        &copy;<?=date('Y')?> Copyright <?php bloginfo('name'); ?>
      </div>
  </div>
</div>