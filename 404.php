<?php
/**
 * Theme: Pure Bootstrap
 * The 404 page.
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="container main-content default-page">
    <div id="content" class="col-sm-9 col-md-9">
      <div class="jumbotron" style="min-height: 400px;">
        <h1 class="text-center padding-bottom-20">
          <i class="fa fa-cogs"></i> 404 Not Found
        </h1>
        <p class="lead text-center padding-top-20" style="max-width: 400px; margin: 0 auto;">
          It looks like you've requested a page that doesn't exist on this website.
        </p>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>