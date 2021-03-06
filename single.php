<?php
/**
 * The template for displaying all single posts.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

    <div id="primary">
      <div class="row-fluid">
        <?php do_action( 'alienship_content_before' ); ?>
        <div id="content" role="main" class="<?php echo apply_filters( 'alienship_content_container_class', 'span9' ); ?>">

          <?php while ( have_posts() ) : the_post(); ?>

          <?php if ( of_get_option('alienship_content_nav_above') ) { alienship_content_nav( 'nav-above' ); } // display content nav above posts? ?>

          <?php do_action( 'alienship_loop_before' ); ?>
          <?php $format = get_post_format();
            if ( false === $format )
            $format = 'standard';
            get_template_part( '/inc/parts/content', $format ); ?>
          <?php do_action( 'alienship_loop_after' ); ?>
          <?php if ( of_get_option('alienship_content_nav_below',1) ) { alienship_content_nav( 'nav-below' ); } // display content nav below posts? ?>

          <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || '0' != get_comments_number() )
            comments_template( '', true );
          ?>

          <?php endwhile; // end of the loop. ?>

        <?php do_action( 'alienship_content_after' ); ?>
        </div><!-- #content -->
        <?php get_sidebar(); ?>
      </div><!-- .row-fluid -->
    </div><!-- #primary -->
<?php get_footer(); ?>