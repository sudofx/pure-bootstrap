<?php
/**
 * Theme: Pure Bootstrap
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
?>
    </div>
    <footer>
      <div id="footer-sidebar" class="secondary container">
        <div id="footer-widget-section1" class="col-sm-3 col-md-3 footer-widget-area text-center">
          <?php dynamic_sidebar('footer-widget-section-1'); ?>
        </div>
        <div id="footer-widget-section2" class="col-sm-3 col-md-3 footer-widget-area text-center">
          <?php dynamic_sidebar('footer-widget-section-2'); ?>
        </div>
        <div id="footer-widget-section3" class="col-sm-3 col-md-3 footer-widget-area text-center">
          <?php dynamic_sidebar('footer-widget-section-3'); ?>
        </div>
        <div id="footer-widget-section4" class="col-sm-3 col-md-3 footer-widget-area text-center">
          <?php dynamic_sidebar('footer-widget-section-4'); ?>
        </div>
      </div>
      <div style="clear-both"></div>
      <div class="text-center">
      	<div class="copyright">
          &copy;<?=date('Y')?> <?php bloginfo('name'); ?>
        </div>
      </div>
    </footer>
    <?php wp_footer();?>
  </body>
</html>