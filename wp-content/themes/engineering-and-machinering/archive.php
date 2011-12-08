<?php get_header(); ?>

<?php if ( have_posts() ) the_post(); ?>

			<h2 class="pagetitle">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'lrdpz' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'lrdpz' ), get_the_date( 'F Y' ) ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'lrdpz' ), get_the_date( 'Y' ) ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'lrdpz' ); ?>
<?php endif; ?>
			</h2>

<?php rewind_posts(); get_template_part( 'loop', 'archive' );?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
