<?php get_header() ?>

<main id="primaryx" class="ssite-main">

	<section>
		<div class="container">

				<?php
				if ( have_posts() ) :
					echo "<div class='row'>";
					/* Start the Loop */
					while ( have_posts() ) :
						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();
					echo "</div>";
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

		</div>
	</section>

</main><!-- #main -->

<?php get_footer() ?>
