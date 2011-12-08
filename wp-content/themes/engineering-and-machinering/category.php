<?php get_header(); ?>

				<h2 class="pagetitle"><?php
					printf( __( 'Category Archives: %s', 'lrdpz' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h2>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';
				get_template_part( 'loop', 'category' );
				?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
