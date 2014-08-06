<?php
/**
 * Theme: Pure Bootstrap
 * The search page template.
 * This is the template that displays search results.
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="container main-content default-page">
    <div id="content" class="col-sm-9 col-md-9">
      <h2>Search results for: <span class="text-primary"><?php the_search_query() ?></span></h2>
      <?php while(have_posts()): the_post() ?>
        <div class="col-sm-6 col-md-6 card">
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="thumbnail">
              <div class="crop half-col">
                <a href="<?php the_permalink(); ?>">
                  <?php get_thumbnail_or_placeholder() ?>
                </a>
              </div>
              <div class="caption">
                <div class="the-excerpt">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <p><?php the_excerpt(); ?></p>
                </div>
              </div>
              <div class="post-bottom">
                <div class="post-meta">
                  <div class="entry-date">
                    By<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                      <?php printf( __( ' %s', 'pure-bootstrap' ), get_the_author() ); ?>
                    </a> on <?php echo get_the_date(); ?>
                  </div>
                  <div class="post-tags">
                    <?php
                      $posttags = get_the_tags();
                      if ($posttags) {
                        foreach($posttags as $tag) {
                          echo '<small><a href="'.get_tag_link($tag->term_id).'"> <i class="fa fa-tag"></i> '. $tag->name . '</a></small>'; 
                        }
                      }
                    ?>
                  </div>
                </div>
                <div>
                  <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary" role="button">read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>