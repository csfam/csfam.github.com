<?php get_header(); ?>

				<h2 class="pagetitle"><?php
					printf( __( 'Tag Archives: %s', 'lrdpz' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h2>

<?php get_template_part( 'loop', 'tag' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
