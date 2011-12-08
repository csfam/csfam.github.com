<?php get_header(); ?>

<?php if ( have_posts() ) the_post(); ?>

				<h2 class="pagetitle"><?php printf( __( 'Author Archives: %s', 'lrdpz' ), "" . get_the_author() . "" ); ?></h2>

<?php
if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'lrdpz_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- author-avatar -->
						<div id="author-description">
							<h2><?php printf( __( 'About %s', 'lrdpz' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
						</div><!-- author-description	-->
					</div><!-- entry-author-info -->
<?php endif; ?>

<?php rewind_posts(); get_template_part( 'loop', 'author' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
