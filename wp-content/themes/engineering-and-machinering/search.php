<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
				<h2 class="pagetitle"><?php printf( __( 'Search Results for: %s', 'lrdpz' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
					<h2 class="pagetitle"><?php _e( 'Nothing Found', 'lrdpz' ); ?></h2>
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'lrdpz' ); ?></p>
						<?php get_search_form(); ?>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
