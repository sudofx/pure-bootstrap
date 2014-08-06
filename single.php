<?php
/**
 * Theme: Pure Bootstrap
 * The single post template.
 * This is the template that displays all pages by default.
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="container main-content default-page">
    <div id="content" class="col-sm-9 col-md-9">
      <?php while(have_posts()): the_post() ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if ( has_post_thumbnail()): ?>
          <div class="img-thumbnail">
            <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
          </div>
        <?php endif; ?>
          <article>
            <h2 ><?php the_title(); ?></h2>
            <?php the_content(); ?>
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
          </article>
        </div>
      <?php endwhile; ?>
      <?php if (comments_open($post_id) ): ?>
      <div class="post-comments">
        <?php comments_template('', true); ?>
      </div>
    <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>